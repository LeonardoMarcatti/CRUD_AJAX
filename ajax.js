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

//Envia as informações para o backend fazer a inclusão de novo item.
function Submit(dados) {
   $.ajax({
       type: "POST",
       data: dados.serialize(),
       url: "inserir_produto.php",
       beforeSend:  () => {console.log(dados.serialize())},   
       success: (e) => { let sucesso = $.parseJSON(e)["sucesso"];
                   let mensagem = $.parseJSON(e)["mensagem"];
                   if(!sucesso) {
                       alert(mensagem);
                   };
                   window.location.reload();
               },
       error:  (e) => { console.log("Erro no sistema.")},
       complete: (e) => $('#myform')[0].reset()
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
        success: (e) => { let sucesso = $.parseJSON(e)['sucesso'];
                        let mensagem = $.parseJSON(e)['mensagem'];
                        if (!sucesso){
                            console.log(mensagem);
                        } else{
                            alert(mensagem);
                        };
        },
        error: (e) =>{ alert("Erro no sistema!");}
    });
};

$(document).ready(function(param){ 
    $('#deletar').on('click', function(e){
        let id = $(this).attr('value');
        let el = $(this).parent().parent();
        let cl = $(this).attr('class');
        if (cl == 'btn btn-danger') {
            $.ajax({
            type: "post",
            url: "delete.php",
            data: "id=" + id,
            beforeSend: e => console.log(id),
            success: e => {
                            let sucesso2 = $.parseJSON(e)['sucesso'];
                            if (sucesso2){
                                $(el).hide(2000);
                            } else{
                                alert('Erro na exclusão!');
                            };
                            window.location.reload();
                        },
           error: e => alert('Erro de sistema!')
           });
        };
     });
 });

 //Função que pega a lista de itens já cadastrados. Essa função é chamada ao carregar a página
 $.ajax({
    type: "get",
    url: "https://192.168.1.160/programacao/testes/Projetos/AJAX/select_lista.php",
    //data: null,
    success: response => {
        let produtos
        $.each($.parseJSON(response), (key, value) => {
                produtos += "<tr><td class=\"text-center\">" + value.id + "</td><td>" + value.nome + "</td><td>" +value.categoria+"</td><td class=\"text-center\"><a href=\"edit_form.php?nome="+value.nome + '&idcategoria='+value.idcategoria +'&id='+value.id+ "\" class=\"edit\" title=\"Editar\"><i class=\"fas fa-pencil-alt\"></i></a></td><td class=\"text-center\"><a href=\"\" class=\"delete\" title=\"" + value.id + "\" data-toggle=\"modal\" data-target=\"#delmodal\"><i class=\"fas fa-trash-alt\"></i></a></td></tr>";
        })
        $('#mybody').html(produtos);
        },
    error: (e) => {alert(e)},
    complete: e => console.log()    
});

$('#mybody').click(e => {   let valor, nome;
                            valor = e.target.parentNode.title;
                            nome = e.target.parentNode.parentNode.parentNode.children[1].innerText;
                            $('#deletar').attr('value', valor);
                            $('.modal-body').html('Deseja mesmo deletar o item ' + valor + ': ' + nome);                       
                        });