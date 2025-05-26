document.addEventListener("DOMContentLoaded", function() {
  const arraypreguntas = [
    { pregunta: "¿Cuál es la capital de Francia?", imagen: "imagenes/Torre Eiffel.avif", respuestas: ["Madrid", "París", "Londres", "Roma"], correct: "París" },
    { pregunta: "¿En qué año se descubrió América?", imagen: "imagenes/america.jpg", respuestas: ["1492", "1776", "1812", "1519"], correct: "1492" },
    { pregunta: "¿Cuál es el océano más grande?", imagen: "imagenes/ocean.jpg", respuestas: ["Atlántico", "Índico", "Pacífico", "Ártico"], correct: "Pacífico" },
    { pregunta: "¿Quién escribió 'Don Quijote de la Mancha'?", imagen: "imagenes/donquijote.jfif", respuestas: ["Miguel de Cervantes", "Federico García Lorca", "Gabriel García Márquez", "Pablo Neruda"], correct: "Miguel de Cervantes" },
    { pregunta: "¿Cuál es el metal más abundante en la corteza terrestre?", imagen: "imagenes/cortezaterrestre.jpg", respuestas: ["Hierro", "Aluminio", "Cobre", "Oro"], correct: "Aluminio" },
    { pregunta: "¿Cuál es el río más largo del mundo?", imagen: "imagenes/rio.jpg", respuestas: ["Amazonas", "Nilo", "Misisipi", "Yangtsé"], correct: "Amazonas" },
    { pregunta: "¿Quién pintó la Mona Lisa?", imagen: "imagenes/monalisa.jpg", respuestas: ["Pablo Picasso", "Leonardo da Vinci", "Vincent van Gogh", "Michelangelo"], correct: "Leonardo da Vinci" },
    { pregunta: "¿Cuál es el planeta más grande del sistema solar?", imagen: "imagenes/planeta.jpg", respuestas: ["Tierra", "Marte", "Júpiter", "Saturno"], correct: "Júpiter" },
    { pregunta: "¿Cuál es el hueso más largo del cuerpo humano?", imagen: "imagenes/esqueleto.jpg", respuestas: ["Fémur", "Húmero", "Radio", "Tibia"], correct: "Fémur" },
    { pregunta: "¿Quién fue el primer presidente de Estados Unidos?", imagen: "imagenes/presidentes.avif", respuestas: ["Thomas Jefferson", "George Washington", "Abraham Lincoln", "John Adams"], correct: "George Washington" },
    { pregunta: "¿Cuál es la montaña más alta del mundo?", imagen: "imagenes/everest.jpeg", respuestas: ["Monte Everest", "K2", "Kangchenjunga", "Lhotse"], correct: "Monte Everest" },
    { pregunta: "¿Quién escribió 'El principito'?", imagen: "imagenes/principito.jpg", respuestas: ["Antoine de Saint-Exupéry", "J.K. Rowling", "Ernest Hemingway", "Mark Twain"], correct: "Antoine de Saint-Exupéry" },
    { pregunta: "¿Cuál es el metal más denso?", imagen: "imagenes/metal.jpg", respuestas: ["Plomo", "Oro", "Plata", "Uranio"], correct: "Oro" },
    { pregunta: "¿En qué año cayó el Muro de Berlín?", imagen: "imagenes/muroberlin.jpg", respuestas: ["1989", "1991", "1993", "1987"], correct: "1989" },
    { pregunta: "¿Cuál es el animal más rápido del mundo?", imagen: "imagenes/animalrapido.jpg", respuestas: ["Guepardo", "Leopardo", "León", "Tigre"], correct: "Guepardo" },
    { pregunta: "¿Quién fue el primer hombre en pisar la luna?", imagen: "imagenes/hombreluna.jpg", respuestas: ["Buzz Aldrin", "Neil Armstrong", "Yuri Gagarin", "Michael Collins"], correct: "Neil Armstrong" },
    { pregunta: "¿Cuál es el océano más pequeño del mundo?", imagen: "imagenes/oceano2.jpg", respuestas: ["Ártico", "Atlántico", "Pacífico", "Índico"], correct: "Índico" },
    { pregunta: "¿Quién fue el primer explorador en circunnavegar la Tierra?", imagen: "imagenes/circunnavegar.png", respuestas: ["Vasco da Gama", "Fernando de Magallanes", "Cristóbal Colón", "Juan Sebastián Elcano"], correct: "Fernando de Magallanes" },
    { pregunta: "¿Cuál es la flor más grande del mundo?", imagen: "imagenes/flores.png", respuestas: ["Rosa", "Lirio", "Orquídea", "Rafflesia"], correct: "Rafflesia" },
    { pregunta: "¿En qué año se firmó la Declaración de Independencia de Estados Unidos?", imagen: "imagenes/independenciaeu.jpg", respuestas: ["1776", "1789", "1792", "1804"], correct: "1776" },
    { pregunta: "¿Cuál es el país más grande del mundo por área terrestre?", imagen: "imagenes/paises.jpeg", respuestas: ["Canadá", "Estados Unidos", "Rusia", "China"], correct: "Rusia" },
    { pregunta: "¿Quién fue el fundador de Microsoft?", imagen: "imagenes/microsoft.jpg", respuestas: ["Bill Gates", "Steve Jobs", "Mark Zuckerberg", "Larry Page"], correct: "Bill Gates" },
    { pregunta: "¿Cuál es el nombre del satélite natural de la Tierra?", imagen: "imagenes/tierraluna.jpg", respuestas: ["Deimos", "Tritón", "Fobos", "Luna"], correct: "Luna" },
    { pregunta: "¿Quién escribió 'Romeo y Julieta'?", imagen: "imagenes/romeoyjulieta.jpg", respuestas: ["William Shakespeare", "Jane Austen", "Charles Dickens", "Emily Brontë"], correct: "William Shakespeare" },
    { pregunta: "¿En qué año comenzó la Primera Guerra Mundial?", imagen: "imagenes/ww1.jpg", respuestas: ["1914", "1916", "1918", "1920"], correct: "1914" },
    { pregunta: "¿Cuál es el país con la población más grande del mundo?", imagen: "imagenes/poblacionpaises.jpg", respuestas: ["India", "China", "Estados Unidos", "Rusia"], correct: "China" },
    { pregunta: "¿Quién escribió 'Orgullo y prejuicio'?", imagen: "imagenes/oyp.jpg", respuestas: ["Jane Austen", "Charles Dickens", "Emily Brontë", "William Shakespeare"], correct: "Jane Austen" },
    { pregunta: "¿Cuál es el metal más caro del mundo?", imagen: "imagenes/metalcaro.jpg", respuestas: ["Oro", "Platino", "Paladio", "Rodio"], correct: "Rodio" },
    { pregunta: "¿Quién pintó 'La noche estrellada'?", imagen: "imagenes/nocheestrellada.jfif", respuestas: ["Vincent van Gogh", "Leonardo da Vinci", "Pablo Picasso", "Salvador Dalí"], correct: "Vincent van Gogh" },
    { pregunta: "¿En qué año finalizó la Segunda Guerra Mundial?", imagen: "imagenes/ww2.jpg", respuestas: ["1945", "1943", "1947", "1950"], correct: "1945" },
    { pregunta: "¿Cuál es el instrumento musical más antiguo?", imagen: "imagenes/instrumentos.avif", respuestas: ["Flauta", "Lira", "Trompeta", "Arpa"], correct: "Flauta" },
    { pregunta: "¿Quién fue el primer emperador romano?", imagen: "imagenes/emperadorromano.jpg", respuestas: ["Julio César", "Augusto", "Nerón", "Trajano"], correct: "Augusto" },
    { pregunta: "¿Cuál es el animal más grande del mundo?", imagen: "imagenes/animalmasgrande.png", respuestas: ["Elefante", "Ballena azul", "Jirafa", "Dinosaurio"], correct: "Ballena azul" },
    { pregunta: "¿Quién fue el primer presidente de México?", imagen: "imagenes/mexico.jpg", respuestas: ["Benito Juárez", "Miguel Hidalgo", "Emiliano Zapata", "Porfirio Díaz"], correct: "Benito Juárez" },
    { pregunta: "¿Cuál es el nombre del inventor de la bombilla eléctrica?", imagen: "imagenes/bombilla.jpeg", respuestas: ["Nikola Tesla", "Alexander Graham Bell", "Thomas Edison", "Albert Einstein"], correct: "Thomas Edison" },
  ];

    let num_pregunta = 0;
    let puntuacion = { correct: 0, incorrect: 0 };
      
    const contenedor_juego=document.getElementById("juego");
    const imagen=document.getElementById("imagen");
    const texto_pregunta=document.getElementById("textojuego");
    const texto_respuesta=document.getElementById("respuestas");
    const puntuacion_correcto=document.getElementById("acierto");
    const puntuacion_incorrecto=document.getElementById("incorrecto");
    const boton_siguiente=document.getElementById("boton_siguiente");
    const boton_cerrar=document.getElementById("boton_cerrar");
    const contenedor_fin=document.getElementById("fin_juego");
    const texto_fin=document.getElementById("mensaje_fin");
    const boton_reiniciar=document.getElementById("boton_reiniciar");
    const boton_salir=document.getElementById("boton_salir");
    const imagen_fin=document.getElementById("mejor_puntuacion")
     
    boton_siguiente.addEventListener("click", siguientePregunta);
    boton_cerrar.addEventListener("click", cerrarJuego);
    boton_reiniciar.addEventListener("click", reiniciarJuego);
    boton_salir.addEventListener("click", cerrarJuego);
      
    function iniciarJuego() {
      num_pregunta = 0;
      puntuacion.correct = 0;
      puntuacion.incorrect = 0;
        barajarArray(arraypreguntas);
        escribirPregunta();
      }
      
      function escribirPregunta() {
        const pregunta = arraypreguntas[num_pregunta];
        imagen.src = pregunta.imagen;
        texto_pregunta.textContent=pregunta.pregunta;
        const arrayBarajada=barajarArray(pregunta.respuestas.slice());
        texto_respuesta.innerHTML = "";
        arrayBarajada.forEach(answer => {
        const button=document.createElement("button");
        button.textContent=answer;
        button.classList.add("botonRespuesta");
        button.addEventListener("click", () => comprobarRespuesta(answer));
        texto_respuesta.appendChild(button);
      });
    }
      
    function comprobarRespuesta(eleccionRespuesta) {
      const pregunta = arraypreguntas[num_pregunta];
      if (eleccionRespuesta == pregunta.correct) {
        puntuacion.correct++;
      } else {
        puntuacion.incorrect++;
      }
      actualizarPuntuacion();
      desactivarEleccionRespuesta();
      boton_siguiente.disabled = false;
    }
      
    function desactivarEleccionRespuesta() {
      const botonRespuesta = document.querySelectorAll(".botonRespuesta");
      botonRespuesta.forEach(button => {
        button.disabled = true;
      });
    }
     
    function siguientePregunta() {
      num_pregunta++;
      if (num_pregunta < 10) {
        escribirPregunta();
      } else {
        finJuego();
      }
    }
      
    function finJuego() {
      texto_fin.textContent = `¡Juego terminado! Aciertos: ${puntuacion.correct}, Errores: ${puntuacion.incorrect}`;
      contenedor_juego.style.display="none";
      contenedor_fin.style.display="block";
      mejor_puntuacion.style.display="none";
      if (puntuacion.correct == 0) {
        mejor_puntuacion.style.display="flex";
      }
    }
     
    function reiniciarJuego() {
      contenedor_juego.style.display="block";
      contenedor_fin.style.display="none";
      iniciarJuego();
    }
      
    function cerrarJuego() {
      window.close();
    }
      
    function actualizarPuntuacion() {
      puntuacion_correcto.textContent = `Aciertos: ${puntuacion.correct}`;
      puntuacion_incorrecto.textContent = `Errores: ${puntuacion.incorrect}`;
    }
      
    function barajarArray(array) {
      for (let i=array.length-1; i>0; i--) {
        const j=Math.floor(Math.random()*(i+1));
        [array[i], array[j]]=[array[j], array[i]];
      }
      return array;
    }
      
    iniciarJuego();
  });