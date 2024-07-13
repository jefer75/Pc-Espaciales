const abrir = document.getElementById('asignar');
const contenido = document.getElementById('asignar_cont');
const cerrar = document.getElementById('asignar_close');

abrir.addEventListener('click', function() {
    contenido.showModal();
});

cerrar.addEventListener('click', function(){
    cerrar.close();
});

const openModal = document.getElementById('añadir');
const modal = document.getElementById('añadir_cont');
const closeModal = document.getElementById('añadir_close');

openModal.addEventListener('click', function() {
    modal.showModal();
});

closeModal.addEventListener('click', function(){
    modal.close();
});