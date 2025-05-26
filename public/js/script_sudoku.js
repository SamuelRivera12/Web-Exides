document.addEventListener('DOMContentLoaded', function() {
    const tablero = document.getElementById('tablero');
    const boton_facil = document.getElementById('boton_facil');
    const boton_medio = document.getElementById('boton_medio');
    const boton_dificil = document.getElementById('boton_dificil');

    let casilla_seleccionada = null;

    let sud_facil = [
        [5, 3, 0, 0, 7, 0, 0, 0, 0],
        [6, 0, 0, 1, 9, 5, 0, 0, 0],
        [0, 9, 8, 0, 0, 0, 0, 6, 0],
        [8, 0, 0, 0, 6, 0, 0, 0, 3],
        [4, 0, 0, 8, 0, 3, 0, 0, 1],
        [7, 0, 0, 0, 2, 0, 0, 0, 6],
        [0, 6, 0, 0, 0, 0, 2, 8, 0],
        [0, 0, 0, 4, 1, 9, 0, 0, 5],
        [0, 0, 0, 0, 8, 0, 0, 7, 9]
    ];

    
    let sud_medio = [
        [0, 0, 0, 0, 0, 0, 2, 0, 0],
        [0, 8, 0, 0, 0, 7, 0, 9, 0],
        [6, 0, 2, 0, 0, 0, 5, 0, 0],
        [0, 7, 0, 0, 6, 0, 0, 0, 0],
        [0, 0, 0, 9, 0, 1, 0, 0, 0],
        [0, 0, 0, 0, 2, 0, 0, 4, 0],
        [0, 0, 5, 0, 0, 0, 6, 0, 3],
        [0, 9, 0, 4, 0, 0, 0, 7, 0],
        [0, 0, 6, 0, 0, 0, 0, 0, 0]
    ];

    let sud_dificil = [
        [0, 2, 0, 6, 0, 8, 0, 0, 0],
        [5, 8, 0, 0, 0, 9, 7, 0, 0],
        [0, 0, 0, 0, 4, 0, 0, 0, 0],
        [3, 7, 0, 0, 0, 0, 5, 0, 0],
        [6, 0, 0, 0, 0, 0, 0, 0, 4],
        [0, 0, 8, 0, 0, 0, 0, 1, 3],
        [0, 0, 0, 0, 2, 0, 0, 0, 0],
        [0, 0, 9, 8, 0, 0, 0, 3, 6],
        [0, 0, 0, 3, 0, 6, 0, 9, 0]
    ];

    function renderSudoku(sudoku) {
        tablero.innerHTML = '';
        for (let i = 0; i < sudoku.length; i++) {
            for (let j = 0; j < sudoku[i].length; j++) {
                const cell = document.createElement('div');
                cell.classList.add('cell');
                cell.setAttribute("id", "celda"+i+""+j);
                cell.textContent = sudoku[i][j] === 0 ? '' : sudoku[i][j];
                cell.setAttribute('data-fila', i);
                cell.setAttribute('data-columna', j);
                cell.addEventListener('click', seleccionar_celda);
                if (i % 3 === 0 && j % 3 === 0) {
                    cell.classList.add('block');
                }
                tablero.appendChild(cell);
            }
        }
    }

    function seleccionar_celda(event) {
        const celda_seleccionada = event.target;
        const fila = parseInt(celda_seleccionada.getAttribute('data-fila'));
        const columna = parseInt(celda_seleccionada.getAttribute('data-columna'));
        casilla_seleccionada = { fila, columna };
        console.log(`Selected cell: ${fila}, ${columna}`);
    }

    document.addEventListener('keydown', function(event) {
        if (casilla_seleccionada) {
                const value = keyCode - 48;
                sudoku[casilla_seleccionada.fila][casilla_seleccionada.columna] = value;
                renderSudoku(sudoku);
        }
    });

    boton_facil.addEventListener('click', function() {
        renderSudoku(sud_facil);
    });

    boton_medio.addEventListener('click', function() {
        renderSudoku(sud_medio);
    });

    boton_dificil.addEventListener('click', function() {
        renderSudoku(sud_dificil);
    });
    
    function seleccionar_celda(event) {
        const celda_seleccionada = event.target;
        const fila = parseInt(celda_seleccionada.getAttribute('data-fila'));
        const columna = parseInt(celda_seleccionada.getAttribute('data-columna'));
        casilla_seleccionada = { fila, columna };
        celda_seleccionada.contentEditable = true; 
        celda_seleccionada.focus(); 
    }
        
});
