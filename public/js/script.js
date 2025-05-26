const palabras = ["javascript", "ordenador", "clase", "mesa", "pantalla"];
let palabraOculta = "";
let palabraAdivinada = [];
let intentosRestantes = 10;

function iniciarJuego() {
    palabraOculta = seleccionarPalabraAleatoria();
    palabraAdivinada = Array(palabraOculta.length).fill("_");

    actualizarInterfaz();
}

function seleccionarPalabraAleatoria() {
    const indice = Math.floor(Math.random() * palabras.length);
    return palabras[indice];
}

function adivinarLetra() {
    const inputLetra = document.getElementById("inputLetra");
    const letra = inputLetra.value.toLowerCase();

    if (letra.length !== 1 || !/[a-z]/.test(letra)) {
        alert("Ingresa una letra válida.");
        return;
    }

    if (palabraOculta.includes(letra)) {
        actualizarPalabraAdivinada(letra);
    } else {
        intentosRestantes--;
    }

    actualizarInterfaz();

    if (intentosRestantes === 0 || palabraAdivinada.join("") === palabraOculta) {
        mostrarMensajeFinJuego();
    }

    inputLetra.value = "";
}

function actualizarPalabraAdivinada(letra) {
    for (let i = 0; i < palabraOculta.length; i++) {
        if (palabraOculta[i] === letra) {
            palabraAdivinada[i] = letra;
        }
    }
}

function actualizarInterfaz() {
    document.getElementById("palabraOculta").textContent = palabraAdivinada.join(" ");
    document.getElementById("intentosRestantes").textContent = `Intentos restantes: ${intentosRestantes}`;
}

function mostrarMensajeFinJuego() {
    if (intentosRestantes === 0) {
        alert("¡Has agotado todos los intentos! La palabra era: " + palabraOculta);
    } else {
        alert("¡Felicidades! Has adivinado la palabra.");
    }

    reiniciarJuego();
}

function reiniciarJuego() {
    palabraOculta = "";
    palabraAdivinada = [];
    intentosRestantes = 6;
    iniciarJuego();
}

iniciarJuego();

