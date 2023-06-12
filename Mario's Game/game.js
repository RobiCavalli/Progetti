//variabile per mario
let currMariotile;
// variabile per la pianta
let currPlantile;

//per rendere le tessere cliccabili 
let score = 0 ;
let gameOver = false;
// per far partire gioco
window.onload = function () {
  setGame();
};

function setGame() {
  //griglia per tabellone (9 pipe)
  for (let i = 0; i < 9; i++) {
    //crea nove div
    let tile = document.createElement("div");
    //viene impostato l'ID di ciascun div con il valore corrispondente dell'iteratore i ( da 0 a 8 )convertito in stringa utilizzando tile.id = i.toString().
    tile.id = i.toString();
    //controllo se c'è pianta o mario , aggiungo eventilistener che al click chiamerà selectTile()
    tile.addEventListener("click", selectTile);

    //inseriamo nel div board i nove div (tile)
    document.getElementById("board").appendChild(tile);
  }
  //viene richiamata la funzione per Mario
  setInterval(setMario, 1000); // ogni 1 sec viene chiamato setMario

  //viene richiamata la funzione per la pianta
  setInterval(setPlant, 2000); // ogni 2 sec viene chiamata setPlant
}

// viene generato un numero randomicamente fra 1 e 9
function getRandomTile() {
  let num = Math.floor(Math.random() * 9);
  return num.toString();
}

//funzione principale per il personaggio di Mario che dovrà apparire randomicamente sopra la tile

function setMario() {
//gameover si deve bloccare settaggio Mario
if (gameOver){
  return;
}

  //cancella i div all interno del tag
  if (currMariotile) {
    currMariotile.innerHTML = "";
  }

  // viene creato elemento img
  let mario = document.createElement("img");
  // src
  mario.src = "./img/mario4.png";

  // devo posizionare mario randomicamente su una tile
  let num = getRandomTile();
  //controllo id di Mario e se è presente, andrò su un'altra tile

  if (currMariotile && currMariotile.id == num) {
    return;
  }

  //currMariotile si prenderà id (numero randomicamente generato)
  currMariotile = document.getElementById(num);
  //alla tile apparità img
  currMariotile.appendChild(mario);
}

//function per la pianta

function setPlant() {

//gameover si deve bloccare settaggio pianta
if (gameOver){
  return;
}

  //cancella i div all interno del tag

  if (currPlantile) {
    currPlantile.innerHTML = "";
  }

  // viene creato elmento img
  let plant = document.createElement("img");
  // src
  plant.src = "./img/plant5.png";
  //plant posizionata randomicamente su tile
  let num = getRandomTile();

  //controllo se pianta presente

  if (currPlantile && currPlantile.id == num) {
    return;
  }

  // prende n randomicamente generato
  currPlantile = document.getElementById(num);
  //appare sulla tile
  currPlantile.appendChild(plant);
}

// per l'incremento punteggio o per il gameover 
function selectTile(){
// si deve bloccare gioco 
  if (gameOver){
    return;
  }
  
if ( this == currMariotile){
  score +=10;
  document.getElementById("score").innerText = score.toString(); //update score
}
 else if ( this == currPlantile) {
  document.getElementById("score").innerText = "GAME OVER: " + score.toString ();
  gameOver= true; // gioco finito impostato su true 
}


}