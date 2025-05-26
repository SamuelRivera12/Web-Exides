function confirmacion(event){
    if (confirm("¿Estás seguro de que quieres eliminar este mensaje?")){
        return true;
    }else{
        event.preventDefault();
    }
}

let linkdelete=document.querySelectorAll(".table__item__link");
for(var i=0; i<linkdelete.lenght;i++){
    linkdelete[i].addEventListener("click", confirmacion);
}
