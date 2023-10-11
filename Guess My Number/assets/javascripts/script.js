"use strict";
/*
console.log(document.querySelector(".message").textContent);
document.querySelector(".message").textContent = "Correct Number!";

document.querySelector(".number").textContent = 13;
document.querySelector(".score").textContent = 10;

document.querySelector(".guess").value = 23;
console.log(document.querySelector(".guess").value);
*/

// random number generation
let secretnumber = Math.trunc(Math.random() * 20) + 1;
let score = 20;
let highscore = 0;

const displayMessage = function (message) {
  document.querySelector(".message").textContent = message;
};

document.querySelector(".check").addEventListener("click", function () {
  const guess = Number(document.querySelector(".guess").value);
  console.log(guess, typeof guess);

  // when there is no input
  if (!guess) {
    displayMessage("No Number!");
  }
  // when player wins
  else if (guess === secretnumber) {
    displayMessage("Correct Number!");
    document.querySelector(".number").textContent = secretnumber;
    // inline CSS
    document.querySelector("body").style.backgroundColor = "#60b347";
    document.querySelector(".number").style.width = "30rem";

    // highscore
    if (score > highscore) {
      highscore = score;
      document.querySelector(".highscore").textContent = highscore;
    }
  }
  // when guess is wrong
  else if (guess !== secretnumber) {
    if (score > 1) {
      displayMessage(guess > secretnumber ? "Too High!" : "Too Low!");
      score--;
      document.querySelector(".score").textContent = score;
    } else {
      displayMessage("You Lost The Game ");
      document.querySelector(".score").textContent = 0;
      document.querySelector("body").style.backgroundColor = "#ff0000";
    }
  }
});

//       // when guess is too high
//   else if (guess > secretnumber) {
//     if (score > 1) {
//       document.querySelector(".message").textContent = "Too High!";
//       score--;
//       document.querySelector(".score").textContent = score;
//     } else {
//       document.querySelector(".message").textContent = "You Lost The Game ";
//       document.querySelector(".score").textContent = 0;
//       document.querySelector("body").style.backgroundColor = "#ff0000";
//     }
//   }
//   // when guess too low
//   else if (guess < secretnumber) {
//     if (score > 1) {
//       document.querySelector(".message").textContent = "Too Low!";
//       score--;
//       document.querySelector(".score").textContent = score;
//     } else {
//       document.querySelector(".message").textContent = "You Lost The Game ";
//       document.querySelector(".score").textContent = 0;
//       document.querySelector("body").style.backgroundColor = "#ff0000";
//     }
//   }
// });
// AGAIN BUTTON
document.querySelector(".again").addEventListener("click", function () {
  score = 20;
  secretnumber = Math.trunc(Math.random() * 20) + 1;

  displayMessage("Start Guessing...");
  document.querySelector(".score").textContent = score;
  document.querySelector(".number").textContent = "?";
  document.querySelector(".guess").value = "";

  document.querySelector("body").style.backgroundColor = "#2cb1e6";
  document.querySelector(".number").style.width = "15rem";
});
