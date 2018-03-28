// 2013041007 함성준 화요일 9시
// The array of words to be used in the hangman game
// hangman 게임에 사용되는 단어들의 array
var POSSIBLE_WORDS = ["obdurate", "verisimilitude", "defenestrate", "obsequious", "dissonant", "toady", "idempotent"];
var MAX_GUESSES = 6;           // number of total guesses per game //게임 당 총 추측 수

// Global Variables
var word = "?";                // variable to store random word user is trying to guess   // 사용자가 추측하려고하는 임의의 단어를 저장하는 변수
var guesses = "";              // variable to store letters the player has    // 사용자가 추측한 글자를 저장하는 변수 
var guessCount = MAX_GUESSES;  // variable to store number of guesses player has left   // 사용자가 남긴 추측 수를 저장하는 변수

// Chooses a new random word and displays its clue on the page.
// 새로운 임의의 단어를 선택하고 그 단서를 페이지에 표시
function newGame() {
  // Choose a random word from the 'POSSIBLE_WORDS' variable and store it in 'word' variable
  // 'POSSIBLE_WORDS'변수에서 무작위 단어를 선택하고 'word'변수에 저장
  var randomIndex = parseInt(Math.floor(Math.random()*POSSIBLE_WORDS.length));
  word = POSSIBLE_WORDS[randomIndex];
  // update necessary global variables   // 필요 전역 변수 업데이트  
  guessCount = MAX_GUESSES;
  guesses = "";
  // show initial word clue - all underscores   // 초기 단어 단서 표시 - 모두 밑줄로
  updatePage();   
}

// Guesses a letter.  Called when the user presses the Guess button.
// 알파벳 추측. 사용자가 추측 버튼을 누르면 호출됨
function guessLetter() {
  // Store what user has typed in 'guess' textbox into 'letter' variable
  // 사용자가 'guess' textbox에 입력 한 것을 'letter'변수에 저장
  var letter = $("guess").value;
  /* If user has used up all the number of guesses, or
   * if user guessed the complete word (if `clue' element does not contain '_'), or 
   * if user has already guessed this letter
   */
   /* 만약 사용자가 모든 추측 가능 횟수를 다 사용했다면, 또는
    * 사용자가 전체 단어를 추측 한 경우 ( 'clue' element에 '_'가 포함되지 않은 경우), 또는
    * 사용자가 이 알파벳을 이미 추측 한 경우
    */
  if (guessCount <= 0 || $("clue").innerHTML.indexOf("_") < 0 || word == $("clue").value) {
    return;   
  }
  // otherwise add guessed letter to the 'guesses' variable   
  // 그렇지 않으면 추측 된 알파벳을 'guesses'변수에 추가 
  guesses += letter;
  // If user has guessed incorrectlty decrement user's number of guesses (guessCount) by 1
  // 사용자가 틀린 추측을 한 경우 사용자의 추측 수 (guessCount)를 1씩 감소
  if (word.indexOf(letter) < 0) {
   guessCount--;      
  }
  updatePage();
}

// Updates the hangman image, word clue, etc. to the current game state.
// 행맨 이미지, 단어 단서 등을 현재 게임 상태로 업데이트
function updatePage() {
  var clueString = "";
  // Update clue string such as "h _ l l _ "
  // "h _ l l _"과 같은 단서 문자열 업데이트
  for (var i = 0; i < word.length; i++) {
  	/* If the letter has been guessed correctly append letter and a single white space to 'clueString' variable
  	 * otherwise append '_' and a single white space to 'clueString' variable
  	 */
     /* 문자가 올바르게 추측 된 경우 문자와 하나의 공백을 'clueString'변수에 추가
     * 그렇지 않으면 '_'을 추가하고 하나의 공백을 'clueString'변수에 추가
     */
    var letter = $("guess").value;
    if (letter==word[i]) {   // letter has been guessed
      clueString += letter+" ";
    } else {                              // not guessed
      clueString += "_"+" ";
    }
  }

  $("clue").innerHTML = clueString;
  
  /* If user used up the entire number of guesses, display "You lose." text in 'div' element with id "gueses". 
   * If user guessed the correct words, display "you win!!!." text in 'div' element with id "gueses".
   * Otherwise append the user guess to existing text in 'div' element with id "gueses". 
   */
  /* 사용자가 추측 횟수를 모두 사용하면 id가 "gueses"인 'div'요소의 텍스트에 "You lose."라고 표시 
   * 사용자가 올바른 단어를 추측 한 경우 id가 "gueses"인 'div'요소의 텍스트에 "you win !!!"을 표시
   * 그렇지 않으면 id가 "gueses"인 'div'요소의 기존 텍스트에 사용자 추측을 추가
   */
  if (guessCount <= 0) {
    $("guesses").update("you lose");    // game over (loss)
  } else if (word == clueString) {
    $("guesses").update("you win!!!");     // game over (win)
  } else {
    $("guesses").innerHTML = "Guesses: " + guesses;
  }

  // Update hangman image (use the 'guessCount' variable to make up an image file name)
  // hangman 이미지를 업데이트 ('guessCount'변수를 사용하여 이미지 파일 이름을 조합)
  $("hangmanpic").src = "./images/"+"hangman"+guessCount+".gif";
  
  // empty out the textbox for next input
  // 다음 입력을 위해 텍스트 상자 비움
  $("guess").value = "";
}
