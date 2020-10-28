//Preenche o formulário inicial com as categorias existentes no banco.
function GetCategorias(data) {
    let categorias;
    $.each(data, (key, value) => {
        categorias += '<option value="' + value.id + '">' + value.nome + '</option>';
    });
    $('#categoria').html(categorias);
 };

 $('#myform').submit(function(e) {
    e.preventDefault();
    Submit($(this));
});


/*$.getJSON("select.php").done((data)=>{
    data.forEach(element => {
        console.log(element.nome);
    });
})

$.ajax({
    type: "get",
    url: "select.php",
    success: function (response) {
        let a = $.parseJSON(response);
        a.forEach(element => {
            console.log(element.id);   
        });
    }
});*/

//Envia as informações para o backend fazer a inclusão de novo item.
function Submit(dados) {
   $.ajax({
       type: "POST",
       data: dados.serialize(),
       url: "inserir_produto.php",
       beforeSend:  () => {console.log(dados.serialize())},
       success: (e) => { let mensagem = $.parseJSON(e)["mensagem"];
                         loadList();
                         alert(mensagem);
                        },
       error:  (e) => { console.log("Erro no sistema.")},
       complete: () => document.querySelector('#myform').reset()
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
        success: (e) => {   let mensagem = $.parseJSON(e)['mensagem'];
                            alert(mensagem);
                            window.location.href = "https://192.168.1.160/programacao/testes/Projetos/AJAX/CRUD/inicio.php";
        },
        error: (e) =>{ alert("Erro no sistema!");}
    });
};


$('#deletar').on('click', function(e){
    let id = $(this).attr('value');
    let cl = $(this).attr('class');
    if (cl == 'btn btn-danger') {
        $.ajax({
        type: "post",
        url: "delete.php",
        data: "id=" + id,
        beforeSend: e => {},
        success: e => {loadList(); console.log('Deletado item: ' + id);},
        error: e => alert('Erro de sistema!')
        });
    };
});


 //Função que pega a lista de itens já cadastrados. Essa função é chamada ao carregar a página
 function loadList() {
    $.ajax({
        type: "get",
        url: "https://192.168.1.160/programacao/testes/Projetos/AJAX/CRUD/select_lista.php",
        //data: null,
        success: response => {
            let produtos
            $.each($.parseJSON(response), (key, value) => {
                produtos += "<tr><td class=\"text-center\">" + value.id + "</td><td>" + value.nome + "</td><td>" +value.categoria+"</td><td class=\"text-center\"><a href=\"edit_form.php?nome="+value.nome + '&idcategoria='+value.idcategoria +'&id='+value.id+ "\" class=\"edit\" title=\"Editar\"><i class=\"fas fa-pencil-alt\" id=\"edit\"></i></a></td><td class=\"text-center\"><a href=\"\" class=\"delete\" title=\"" + value.id + "\" data-toggle=\"modal\" data-target=\"#delmodal\"><i class=\"fas fa-trash-alt\" id=\"del\"></i></a></td></tr>";
            })
            $('#mybody').html(produtos);
            },
        error: (e) => {alert(e)},
        complete: e => {}
    });
 };

 loadList();

$('#mybody').click(e => {
    let valor, nome;
    valor = e.target.parentNode.title;
    nome = e.target.parentNode.parentNode.parentNode.children[1].innerText;
    $('#deletar').attr('value', valor);
    $('.modal-body p').html('Deseja mesmo deletar o item ' + valor + ': ' + nome);
});