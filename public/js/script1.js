
var _hamburguesa = document.getElementById('_hamburguesa');
var _items = document.getElementById('_items');

_hamburguesa.onclick = function() {
_items.classList.toggle("open");
_hamburguesa.classList.toggle("close");

}