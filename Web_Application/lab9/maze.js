/* CSE326 : Web Application Development
 * Lab 10 - Maze Assignment
 * 2013041007 / 함성준 
 */
"use strict";

var loser = false;  // whether the user has hit a wall

window.onload = function() {
    $("start").observe('click',startClick);
    $("start").observe('click',function () {
       
        var boundarys = $$(".boundary");
        for (var i = 0; i < boundarys.length; i++) {
         boundarys[i].observe('mouseover', overBoundary);
        }
       
        $("end").observe('mouseover',overEnd);
        
        var mazeout = document.getElementById("maze");
        mazeout.addEventListener("mouseleave",overBody);
        
    });
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
    var boundarys = $$(".boundary");
    for (var index = 0; index < boundarys.length; index++) {
        boundarys[index].addClassName('youlose');
    }
    $("status").update('You Lose :(');
    loser = true;


}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    var boundarys = $$(".boundary");
    for (var index = 0; index < boundarys.length; index++) {
        boundarys[index].removeClassName('youlose');
    }
    $("status").update('Game is Running');
    loser = false;
  
 
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    if(loser === false){
        $("status").update('You Win! :)');
        var boundarys = $$(".boundary");
        for (var i = 0; i < boundarys.length; i++) {
         boundarys[i].stopObserving('mouseover', overBoundary);
        }
       
        $("end").stopObserving('mouseover',overEnd);
        
        var mazeout = document.getElementById("maze");
        mazeout.removeEventListener("mouseleave",overBody);
    }
    else{
        $("status").update('The game already failed.');
    }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event){
 
    overBoundary();
    $("status").update('Cheating is not Allowed!');

}



