/* CSE326 : Web Application Development
 * Lab 10 - Maze Assignment
 * 
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {
    var Boundaries = $$(".boundary");
    for (var index = 0; index < Boundaries.length; index++) {
        Boundaries[index].observe("mouseover",overBoundary);
        
    }
    $("end").observe("mouseover",overEnd);
    $("start").observe("click",startClick);
    $("maze").observe("mouseleave",overBoundary);
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
    var Boundaries = $$(".boundary");
    for (var index = 0; index < Boundaries.length; index++) {
        Boundaries[index].addClassName("youlose");
    }
    overBody();
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    var Boundaries = $$(".boundary");
    for (var index = 0; index < Boundaries.length; index++) {
        Boundaries[index].removeClassName("youlose");
        Boundaries[index].observe("mouseover",overBoundary);
        
    }
    loser = false;
    $("status").update("Game Started");
    $("end").observe("mouseover",overEnd);
    $("maze").observe("mouseleave",overBoundary);
    


}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    if(loser != true){
        $("status").update("you win!");
        var Boundaries = $$(".boundary");
        for (var index = 0; index < Boundaries.length; index++) {
            Boundaries[index].stopObserving("mouseover",overBoundary);
        }
        $("end").stopObserving("mouseover",overEnd);
        $("maze").stopObserving("mouseleave",overBoundary);
    }
    
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    loser = true;
    $("status").update("you failed!");
}



