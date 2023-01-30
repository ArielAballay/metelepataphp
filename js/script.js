// nav mobile
document.getElementById("icon__menu").addEventListener("click", mostrar_menu);

function mostrar_menu(){

    document.querySelector(".menu").classList.toggle("mostrar_menu");
}

// slideshow seccion productos
addEventListener('load',function(){
    
    var imagenes = [];
    imagenes[0] = 'img/img1.jpg';
    imagenes[1] = 'img/img2.jpg';
    imagenes[2] = 'img/img3.jpg';
    imagenes[3] = 'img/img4.jpg';
    imagenes[4] = 'img/img5.jpg';
    imagenes[5] = 'img/img6.jpg';
    imagenes[6] = 'img/img7.jpg';

    var indiceImagenes = 0;
    function cambiarImagenes(){

        this.document.slider.src = imagenes[indiceImagenes];

        if (indiceImagenes < 2) {
            indiceImagenes++;
        }else{
            indiceImagenes = 0;
        }
    }
    setInterval(cambiarImagenes,4000)

});
function alerta() {
    
    alert("¡Lo sentimos... Pagina en desarrollo..!")
}
