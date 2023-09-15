document.addEventListener("keypress", function (evt) {
  creaSuono(evt.key);
});

for (i = 0; i < document.querySelectorAll(".batteria").length; i++) {
  document
    .querySelectorAll(".batteria")
    [i].addEventListener("click", function () {
      var buttonInnerHtml = this.innerHTML;
      creaSuono(buttonInnerHtml);
    });
}

function creaSuono(key) {
  switch (key) {
    case "w":
      var rullante = new Audio("suoni/rullante.mp3");
      rullante.play();
      break;
    case "a":
      var charleston = new Audio("suoni/charleston.wav");
      charleston.play();
      break;
    case "s":
      var grancassa = new Audio("suoni/grancassa.mp3");
      grancassa.play();
      break;
    case "d":
      var tom1 = new Audio("suoni/tom-1.mp3");
      tom1.play();
      break;
    case "j":
      var tom2 = new Audio("suoni/tom-2.mp3");
      tom2.play();
      break;
    case "k":
      var tom3 = new Audio("suoni/tom-3.mp3");
      tom3.play();
      break;
    case "l":
      var crash = new Audio("suoni/crash.mp3");
      crash.play();
      break;
  }
}
