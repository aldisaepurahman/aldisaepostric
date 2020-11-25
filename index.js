var buttonColours = ["red", "blue", "green", "yellow"];

var gamePattern = [];
var userClickedPattern = [];

var started = false;
var level = 0;

const leveltitle = document.querySelector('#level-title');
const button = document.querySelectorAll('.btn');

leveltitle.addEventListener('click', function () { 
  if (!started) {
    leveltitle.textContent = "Level " + level;
    nextSequence();
    started = true;
  }
});

for (let i = 0; i < button.length; i++) {
  button[i].addEventListener('click', function() {
    var userChosenColour = this.id;
    userClickedPattern.push(userChosenColour);
  
    playSound(userChosenColour);
    animatePress(userChosenColour);
  
    cekJawaban(userClickedPattern.length-1);
  });
}

function cekJawaban(currentLevel) {

    if (gamePattern[currentLevel] === userClickedPattern[currentLevel]) {
      if (userClickedPattern.length === gamePattern.length){
        setTimeout(function () {
          nextSequence();
        }, 1000);
      }

    } else {
      playSound("wrong");

      body = document.querySelector("body");
      body.classList.add("game-over");
      setTimeout(function () {
        body.classList.remove("game-over");
      }, 200);

      leveltitle.textContent = "Game Over, Press Any Key to Restart";

      gameOver();
    }

}

function nextSequence() {

  userClickedPattern = [];
  level++;
  leveltitle.textContent = "Level " + level;

  var randomNumber = Math.floor(Math.random() * 4);
  var randomChosenColour = buttonColours[randomNumber];
  gamePattern.push(randomChosenColour);
  
  gamePattern.forEach((color, index) => {
    setTimeout(() => {
      playSound(color);
      $("#" + color).fadeIn(100).fadeOut(100).fadeIn(100);
    }, (index + 1) * 600);
  });
}

function playSound(name) {
  var audio = new Audio("sounds/" + name + ".mp3");
  audio.play();
}

function animatePress(currentColor) {
  color = document.querySelector("#" + currentColor);
  color.classList.add("pressed");
  setTimeout(function () {
    color.classList.remove("pressed");
  }, 100);
}

function gameOver() {
  level = 0;
  gamePattern = [];
  started = false;
}