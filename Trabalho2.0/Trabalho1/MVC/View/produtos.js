$(document).ready(function(){
    const modal = document.getElementById("modal");
    const resposta = document.getElementById("resposta");

    // Intercepta o envio do formulário
    $('.addForm').submit(function(e){
        // Impede o envio padrão do formulário
        e.preventDefault();

        // Obtém os dados do formulário
        var formData = $(this).serialize();
        // Envia a requisição AJAX
        $.ajax({
            type:  $(this).attr("method"),
            url:  $(this).attr("action"),
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

function Click(id) {
    const modal = document.getElementById("modal");
    modal.style.visibility = "hidden"
    $.ajax({
        url: '../controller/carrinho/get_carrinho.php?id_venda=' + id,
        method: 'GET',
        dataType: 'json',
        success: function (resultados) {
            // Limpa o tbody da tabela
            $('#tabelaCompras tbody').empty();

            // Preenche o tbody com os novos dados
            $.each(resultados, function (index, item) {
                var row = '<tr>' +
                    '<td>' + item.id_produto + '</td>' +
                    '<td>' + item.desc_produto + '</td>' +
                    '<td>' + item.vlr_sugerido + '</td>' +
                    '<td>' + item.qtd_venda + '</td>' +
                    '<td> <a href="#" onclick="Delete(' + item.id_produto + ', ' + id + ')">Deletar</a></td>' +
                    '</tr>';
                $('#tabelaCompras tbody').append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Erro ao obter dados:', error);
        }
    });
}

function Delete(id_produto, id_venda) {
    const modal = document.getElementById("modal");
    const resposta = document.getElementById("resposta");
    $.ajax({
        type: 'GET',
        url: '../controller/carrinho/del_carrinho.php?id_produto=' + id_produto + '&id_venda=' + id_venda,
        success: function(response){
        // Manipula a resposta aqui
        modal.style.visibility = "visible"
        if(response.erro){
            resposta.innerText = response.erro;
        } else {
            resposta.innerText = response.mensagem;
        }}
    });
}

function Fechar(id_venda) {
    const modal = document.getElementById("modal");
    const resposta = document.getElementById("resposta");
    document.getElementById('button').setAttribute('onclick', "window.location.reload()");
console.log(id_venda);
    $.ajax({
        type: 'POST',
        url: '../controller/carrinho/comprar_carrinho.php?id_venda=' + id_venda,
        success: function(response){
        // Manipula a resposta aqui
        modal.style.visibility = "visible"
        if(response.erro){
            resposta.innerText = response.erro;
        } else {
            resposta.innerText = response.mensagem;
        }}
    });
}


