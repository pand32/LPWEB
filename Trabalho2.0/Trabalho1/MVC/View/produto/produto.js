$(document).ready(function(){
    const modal = document.getElementById("modal");
    const resposta = document.getElementById("resposta");
    var formulario = document.getElementById("addForm");
    //objeto.style.background-color =  "#000000";

    // Intercepta o envio do formulário
    $('#addForm').submit(function(e){
        // Impede o envio padrão do formulário
        e.preventDefault();

        // Obtém os dados do formulário
        var formData = $(this).serialize();
        // Envia a requisição AJAX
        $.ajax({
            type: formulario.getAttribute("method"),
            url: formulario.getAttribute("action"),
            data: formData,
            success: function(response){
            // Manipula a resposta aqui
            modal.style.visibility = "visible"
            if(response.erro){
                resposta.innerText = response.erro;
            } else {
                resposta.innerText = response.mensagem;
            }}
        });
    });
});


function Click() {
    const modal = document.getElementById("modal");
    modal.style.visibility = "hidden"
}

function ClickD() {
    window.location.reload();
}

function Delete(id) {
    $.ajax({
        type: 'GET',
        url: '../../controller/produto/del_produto.php?id_produto=' + id,
        success: function(response){
        // Manipula a resposta aqui
        modal.style.visibility = "visible"
        if(response.erro){
        console.log(id)

            resposta.innerText = response.erro;
        } else {
        console.log(id)

            resposta.innerText = response.mensagem;
        }}
    });
}
