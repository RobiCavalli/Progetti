// riferimenti barra strumenti e board
const canvas = document.getElementById("drawing-board");
const toolbar = document.getElementById("toolbar");
//contesto della tela con metodo getContext
const ctx = canvas.getContext("2d");

//offset (distanza fra bordi e tela e il bordo della finestra)
const canvasOffsetX = canvas.offsetLeft;//distanza in pixel tra il bordo sinistro dell'elemento canvas e il bordo sinistro 
const canvasOffsetY = canvas.offsetTop;
//calcolo altezza e la larghezza della tela sottraendo gli offset dalla larghezza e dall'altezza del viewport.
canvas.width = window.innerWidth - canvasOffsetX;
canvas.height = window.innerHeight - canvasOffsetY;

let isPainting = false; // se stiamo disegnando o meno
let lineWidth = 5;
//coordinate del punto da cui abbiamo iniziato a disegnare
let startX;
let startY;

const draw = (e) => {
    if(!isPainting) {
        return;
    }

    ctx.lineWidth = lineWidth; // imposta la larghezza della linea
    ctx.lineCap = 'round';//arrotonda estremità delle linee

    ctx.lineTo(e.clientX - canvasOffsetX, e.clientY);//dal punto corrente al punto specificato dalle coordinate 
    ctx.stroke();//traccia il percorso definito
};

//metodo clearRect cancella la tela in base a coordinate
toolbar.addEventListener("click", (e) => {
  if (e.target.id === "clear") {
    //è stato fatto click su clear
    ctx.clearRect(0, 0, canvas.width, canvas.height); //vengono fornite coordinate
  }
});

//spessore linea e colore del disegno
toolbar.addEventListener("change", (e) => {
//sarà attivato ogni volta che un campo di input nella barra degli strumenti cambia.
  if (e.target.id === "stroke") {
    ctx.strokeStyle = e.target.value; //cambia il colore dello stile di disegno in base al valore selezionato dall'utente nel campo di input.
  }

  if (e.target.id === "lineWidth") {
    lineWidth = e.target.value;
  }
});

//controllo
canvas.addEventListener("mousedown", (e) => {
  isPainting = true; //sta disegnando e vengono salvate coordinate
  startX = e.clientX;
  startY = e.clientY;
});

canvas.addEventListener("mouseup", (e) => {
  isPainting = false; //ha smesso di disegnare
  ctx.stroke(); //traccia il percorso del disegno
  ctx.beginPath(); //crea un nuovo percorso
});

canvas.addEventListener("mousemove", draw); //utente sposta mouse e viene chiamata funzione draw per disegnare in base a posizione del mouse

