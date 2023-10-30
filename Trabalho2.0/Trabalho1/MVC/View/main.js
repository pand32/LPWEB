function animationCenter(bool) {
    const objetos = document.getElementsByClassName("centroT")[0];
    const objeto = document.getElementById(objetos.id);
    console.log(bool);
    if(bool){
        objeto.style.animation = "girar3d 10s linear infinite";
    }
    else {
        objeto.style.animation = "parado3d";
    }
}

function trocar(num) {
    document.getElementById("microImg").src = "img/microondas/microondas"+num+".png";
}