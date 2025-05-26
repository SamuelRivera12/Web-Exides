function confirmacion(eliminar){
    if (confirm("¿Estas seguro que desea eliminar este mensaje?" )) {
        return true;
    } else {
        eliminar.preventDefault();
    }
}
function actualizacion(actualizar){
    if (confirm("¿Estas seguro que desea actualizar este mensaje?" )) {
        return true;
    } else {
        actualizar.preventDefault();
    }
}
let linkdelete=document.querySelectorAll(".table__item__link");
for(var i=0; i< linkdelete.length;i++){
    linkdelete[i].addEventListener("click", confirmacion);
}