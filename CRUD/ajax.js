//Preenche o formulário inicial com as categorias existentes no banco.
function GetCategorias(data) {
    let categorias;
    $.each(data, (key, value) => {
        categorias += '<option value="' + value.id + '">' + value.nome + '</option>';
    });
    $('#categoria').html(categorias);
 };

//Envia as informações para o backend fazer a inclusão de novo item.

$('#myform').submit(function(e) {
    e.preventDefault();
    Submit($(this));
});

function Submit(dados) {
   $.ajax({
       type: "POST",
       data: dados.serialize(),
       url: "inserir_produto.php",
       beforeSend:  () => {console.log(dados.serialize())},
       success: (e) => { let mensagem = JSON.parse(e);
                         loadList();
                         alert(mensagem.mensagem);
                        },
       error:  (e) => { console.log("Erro no sistema.")},
       complete: (e) => {$('#produto').val(''); document.querySelector('#myform').reset();}
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
                            window.location.href = "inicio.php";
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
        beforeSend: e => {console.log(id);},
        success: () => { loadList()},
        error: e => alert('Erro de sistema!'),
        complete: e => {}
        });
    };
});


 //Função que pega a lista de itens já cadastrados. Essa função é chamada ao carregar a página
 function loadList() {
    $.ajax({
        type: "get",
        url: "select_lista.php",
        data: null,
        success: response => {
            $('#mybody').html('');
            let produtos;
            $.each($.parseJSON(response), (key, value) => {
                produtos += "<tr><td class=\"text-center\">" + value.id + "</td><td>" + value.nome + "</td><td>" +value.categoria+"</td><td class=\"text-center\"><a href=\"edit_form.php?nome="+value.nome + '&idcategoria='+value.idcategoria +'&id='+value.id+ "\" class=\"edit\" title=\"Editar\"><i class=\"fas fa-pencil-alt\" id=\"edit\"></i></a></td><td class=\"text-center\"><a href=\"\" class=\"delete\" title=\"" + value.id + "\" data-toggle=\"modal\" data-target=\"#delmodal\"><i class=\"fas fa-trash-alt\" id=\"del\"></i></a></td></tr>";
            });

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
    console.log($(this)[0], e);
});