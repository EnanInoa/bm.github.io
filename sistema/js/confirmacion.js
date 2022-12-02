function confirmacion(evento) {

if(confirm("¿Seguro que desea eliminar este registro?")) {
    return true;
} else {
    evento.preventDefault(); 
 }
}

let linkDelete = document.querySelectorAll(".textoEliminar");

for(var i = 0; 1 < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', confirmacion);
}