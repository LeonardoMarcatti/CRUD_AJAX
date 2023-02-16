//Preenche o formulário inicial com as categorias existentes no banco.
function GetCategorias(data) {
    let categorias;
    $.each(data, (key, value) => {
        categorias += '<option value="' + value.id + '">' + value.nome + '</option>';
        }
    );


    $('#categoria').html(categorias);
 };

<<<<<<< HEAD
 $('#myform').submit(function(e) {
=======
$('#myform').submit(function(e) {
>>>>>>> 7e79bec58791ed49a42091f8f95156a271ebfee2
    e.preventDefault();
    Submit($(this));
});

//Envia as informações para o backend fazer a inclusão de novo item.
function Submit(dados) {
   $.ajax({
       type: "POST",
       data: dados.serialize(),
       url: "inserir_produto.php",
    //    beforeSend:  () => {console.log(dados.serialize())},
       success: (e) => { loadList();},
       error:  (e) => { console.log("Erro no sistema.")},
       complete: (e) => $('#produto').val('')
   });
};

//Função que altera dados.
$('#editform').submit(function(e) {
    e.preventDefault();
    Alterar($(this));
});

function Alterar(dados) {
    $.ajax({
        type: "post",
        url: "edit.php",
        data: dados.serialize(),
        beforeSend:  e => console.log(dados.serialize()),
        success: (e) => {   const mensagem = $.parseJSON(e)['mensagem'];
                            alert(mensagem);
                            window.location.href = "inicio.php";
        },
        error: (e) =>{ alert("Erro no sistema!");}
    });
};

$(document).ready(function(param){ 
    $('#deletar').on('click', function(e){
        const id = $(this).attr('value');
        const cl = $(this).attr('class');
        if (cl == 'btn btn-danger') {
            $.ajax({
            type: "post",
            url: "delete.php",
            data: "id=" + id,
            success: e => { loadList(); },
            error: e => alert('Erro de sistema!')
           });
        };
     });
 });

 //Função que pega a lista de itens já cadastrados. Essa função é chamada ao carregar a página
 //Quando usamos ajax para pegar um json, precisamos tratá-lo com JSON.parse(valor)
 function loadList() {
    $.ajax({
        type: "get",
        url: "select_lista.php",
        //data: null,
        success: response => {
            let produtos
            $.each(JSON.parse(response), (key, value) => {
                produtos += "<tr><td class=\"text-center\">" + value.id + "</td><td>" + value.nome + "</td><td class=\"text-center\">" +value.categoria+"</td><td class=\"text-center\"><a href=\"edit_form.php?nome="+value.nome + '&idcategoria='+value.idcategoria +'&id='+value.id+ "\" class=\"edit\" title=\"Editar\"><i class=\"fas fa-pencil-alt\" id=\"edit\"></i></a></td><td class=\"text-center\"><a href=\"\" class=\"delete\" title=\"" + value.id + "\" data-bs-toggle=\"modal\" data-bs-target=\"#delmodal\"><i class=\"fas fa-trash-alt\" id=\"del\"></i></a></td></tr>";
            })
            $('#mybody').html(produtos);
            },
        error: (e) => {alert(e)},
        complete: e => console.log()
    });
 };

 loadList();

$('#mybody').click(e => {
    let valor, nome;
    valor = e.target.parentNode.title;
    nome = e.target.closest('tr').children[1].innerText
    $('#deletar').attr('value', valor);
    $('.modal-body').html('Deseja mesmo deletar o item ' + valor + ': ' + nome);
});