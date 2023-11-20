var admin = 0;

function animationCenter(bool) {
    const objetos = document.getElementsByClassName("centroT")[0];
    const objeto = document.getElementById(objetos.id);
    console.log(bool);
    if(bool){
        if (admin == 15) {
            window.location.href = "phpcontrol.html";
        }
        objeto.style.animation = "girar3d 10s linear infinite";
    }
    else {
        admin = 0;
        objeto.style.animation = "parado3d";
    }
}

function trocar(num) {
    admin += num;
    document.getElementById("microImg").src = "img/microondas/microondas"+num+".png";
}