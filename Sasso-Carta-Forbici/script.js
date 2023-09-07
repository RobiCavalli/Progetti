//variabili necessarie 
var you;
var yourScore = 0 ;
var opponent = 0;
var opponentScore= 0;

window.onload = function() {
    // div con ID 'choices' dove ci sono le 3 scelte
    var choicesDiv = document.getElementById('choices');

    // Array delle scelte possibili
    var choicesArray = ['rock', 'paper', 'scissors'];

    // Ciclo for per inserire le 3 immagini
    for (let i = 0; i < choicesArray.length; i++) {
        //  nuovo elemento immagine
        var newImg = document.createElement('img');
        
        // assegna un file immagine diverso a ogni elemento dell array
        newImg.src = choicesArray[i] + '.jpg';

        //viene assegnato a "your-choice" img selezionata
        newImg.addEventListener('click', function() {
            document.getElementById('your-choice').src = this.src;
            you = choicesArray[i];
            opponentChoice();
            checkWinner();
        });

        // Aggiungi l'immagine al div 'choices'
        choicesDiv.appendChild(newImg);
    }
};


function opponentChoice() {
    var choicesArray = ['rock', 'paper', 'scissors'];
    opponent = choicesArray[Math.floor(Math.random() * 3)];
    document.getElementById('opponent-choice').src = opponent + '.jpg';
}

function checkWinner() {
    if (you === opponent) {
        // Pareggio
    } else if (
        (you === 'rock' && opponent === 'scissors') ||
        (you === 'scissors' && opponent === 'paper') ||
        (you === 'paper' && opponent === 'rock')
    ) {
        // Hai vinto
        yourScore++;
    } else {
        // Hai perso
        opponentScore++;
    }

    // Aggiorna i punteggi
    document.getElementById('your-score').innerText = yourScore;
    document.getElementById('opponent-score').innerText = opponentScore;
}







