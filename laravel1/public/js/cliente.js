var lit_produtos = document.querySelectorAll(".menu-derpatamento nav");
var departamentos = document.querySelectorAll(".menu-derpatamento h3");
var departamentosP = document.getElementById("drop");
var menuEntrada = document.querySelectorAll(".cabecalho");
var Entra = document.getElementById("Entra");
var Nloja = document.getElementById("Nloja");
var categoria = document.getElementById("categoria");





function ativoDepartamento(index){
    lit_produtos.forEach((nav)=>{
        nav.classList.remove("ativo");
    })
    lit_produtos[index].classList.add("ativo");
    lit_produtos[index].classList.add("aparecer");
}
departamentos.forEach((item, index, array)=>{
    item.addEventListener("mousemove",()=>{
        ativoDepartamento(index);
        
        categoriaP(index);
    })
    
});
menuEntrada.forEach((item,index)=>{
    item.addEventListener("click", () => {
        if(index==0){
            Nloja.classList.add("menuAparecer");
        }else{
            Entra.classList.add("menuAparecer");
        }
        
    })
})

function categoriaP(index){
    categoria.addEventListener("click", ()=>{
        lit_produtos[index].classList.remove("ativo");
        lit_produtos[index].classList.remove("aparecer");
        departamentosP.classList.add("menuAparecer");
    });
    
}
// Função de fazer login
// Data:05/05/2019
// Author:Jose Luis
$(document).ready(function () {
    //php -S localhost:8000

    function recarrega() {
        return location.reload()
    }

    $('#aviso_cadastro,#aviso_login,#alerta_ceta').hide()


    $("#login").on("submit", function (evento) {
        evento.preventDefault();
        // $('#erros').html('CARREGANDO....')
        var email = $("#exampleInputEmail1").val()
        var senha = $("#exampleInputPassword1").val()
        var url = "administrado/fronteEnd/login.php?"
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: {
                'email': email,
                'senha': senha
            }

        }).done(function (resposta) {
           
            if (resposta.resultado) {
                $('#aviso_login').css({ "position": "absolute", "z-index": "1000" }).text(resposta.mensagem).show().animate({ top: "410px" }, 1000).delay(3000).animate({ top: "-410px" }, 1000)
                cesta()
                setTimeout(recarrega,5000)
                
            }
        })
    })
   $('.sai').on('click',()=>{
       var desloga = $('.sai button').val();
       var url = "administrado/fronteEnd/login.php?"
       $.ajax({
           url: url,
           type: "POST",
           dataType: "json",
           data: {
               'desloga': desloga
           }

       }).done(function (resposta) {

           if (resposta.resultado) {
               recarrega();
               cesta()
               
           }
       })
   })


    $("#PreCadastra").on("submit",(evento)=>{
        evento.preventDefault();
        var formulario = document.getElementById('PreCadastra');
        var formData = new FormData(formulario);
        var url = "administrado/fronteEnd/dados.php";
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,

        }).done(function (resposta) {
            $('#erros').empty();
            if (!resposta.erros) {
                $('#aviso_cadastro').css({ "position": "absolute", "z-index": "1000" }).text(resposta.mensagem).show().animate({ top: "580px" }, 1000).delay(3000).animate({ top: "-580px" }, 1000)
                setTimeout(recarrega, 5000)
            } else {
                
               
            }
        })
        
    })

    function pro(dados) {
        var tabela = "gato";
        var id = dados;
        ajaxpro(tabela,id)
    }

    
        pro();
    function ajaxpro(tabela,id) {
        
        $.ajax({
            url: "administrado/fronteEnd/tabelaPri.php",
            type: "POST",
            dataType: "json",
            data:{
                'tabela':tabela,
                'id':id
    
            }

        }).done(function (resposta) {
        
            if (resposta.categoria) {
                for (let index = 0; index < resposta.categoria; index++) {
                    
                    categoria(resposta.dados);
                } 
                
            } else {
                // $('#cat').hide();
                
            }
        })
    }
    
    for (let index = 0; index < $("#list-remedios .list-medicamento").length; index++) {
        $("#list-remedios .list-medicamento").eq(index).on('click',()=>{
            var list_cat =  $("#list-remedios .list-medicamento:eq("+index+") button").val();
            var tabela = "gato";
            var id = "'%"+list_cat+"%'";
            
           pro(id)
        })
        
    }
    
    function Perfil() {
        
        const novoval = localStorage.getItem('chave');
        
        $.ajax({
            url: "administrado/fronteEnd/tabelaPri.php",
            type: "POST",
            dataType: "json",
            data: {
                'tabela': 'item',
                'id': novoval
            }

        }).done(function (resposta) {
            if (resposta.quant) {
                $("#foto").attr("src", "administrado/fronteEnd/" + resposta.perfil.C_foto)
                $("#nomePro").text(resposta.perfil.C_produtos);
                $('#de').text(resposta.perfil.N_desconto)
                $("#codigo").text(resposta.perfil.N_codigo);
                $("#preco,#total").text(resposta.perfil.N_valor);
                $("#linckper").html("<strong>Produto</strong>");
                $('#home').html('<table class="table"><tr><td>Nome: ' + resposta.perfil.C_produtos + '</td></tr>' + '<tr><td> Codigo do produto: ' + resposta.perfil.N_codigo + '</td></tr>' + '<tr><td>Composição: ' + resposta.perfil.C_ativo + '</td></tr>' + '<tr><td> Nessecita de receita: ' + resposta.perfil.C_receita + '</td></tr>' + '<tr><td>Registro da anvisa: ' + resposta.perfil.C_registro + '</td></tr>')
                $('#adicionaPerfil').attr('value', resposta.perfil.N_codigo);
            }else{
                $(".perfil").html('<div class="alert col-md-12 alert-danger alert-dismissible  " role="alert"> <p class="d-flex flex-row justify-content-start align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="mr-2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2" /></polygon><line x1="12" y1="8" x2="12" y2="12" /><line x1="12" y1="16" x2="12" y2="16" /></svg><strong>Não foi encontrado nem um registro </strong></p></div>')
            }
           
            var quantedade = 1
            $('#menos').on('click',()=>{
                quantedade -= 1
                quantidade(quantedade);
            })
            $('#mais').on('click', () => {
                quantedade += 1
                quantidade(quantedade)
                
            })
            function quantidade(numero) {
                
                if(numero>=1){
                    $('#quantidade_perfil').text(numero);
                    $('#total').text(resposta.perfil.N_valor * numero);
                }
            }
            $('#adicionaPerfil').on('click', () => {
                cesta();
                var quant = parseInt($('#quantidade_perfil').text());
                var total = parseFloat($('#total').text());
                var codigo = parseInt($('#codigo').text())
                var desconto = parseInt($('#de').text());
                var receita = resposta.perfil.C_receitas;
                $.ajax({
                    url: "administrado/fronteEnd/Atualiza.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                       'quantcesta':quant,
                       'totalcesta':total,
                       'codigocesta':codigo,
                       'descontocesta':desconto,
                       'receitacesta':receita
                    }

                }).done(function (resposta) {
                    if (resposta.erros) {
                        $('#cestaquatidade').css({"box-shadow":"0px 3px 10px"})
                    }else{
                        $('#Entra').addClass("show");
                        $("#alerta_ceta").css({ "position": "absolute", "z-index": "1000" }).show().animate({left:"-250px"}).text("Click a qui para entra na sua conta!")
                    }
                })
            })
           
        })
    }
Perfil()



    function cesta() {
        var tabela = "compra";
        var id = "";
    
        $.ajax({
            url: "administrado/fronteEnd/tabelaPri.php",
            type: "POST",
            dataType: "json",
            data:{
                'tabela':tabela,
                'id':id
            }
    
        }).done(function (resposta) {
        
            if(resposta.quant == 0){
                $('#cesta').html('<tr><td colspan="4"><div class="alert col-md-12 alert-danger alert-dismissible" role="alert"> <p><strong>Não foi encontrado nem um registro :(</strong></p></div></td></tr>')
            }else{
            
                if (resposta.condicao == "materias"){
                var preco = 0;
                for (let cesta = 0; cesta < resposta.quant; cesta++) {
                    preco += resposta.compras[cesta].N_valorc * resposta.compras[cesta].N_quantedade;
                    $('#cesta').append('<tr><td>' + resposta.compras[cesta].C_produtos + '</td>' + '<td>' + resposta.compras[cesta].C_receita + '</td>' + '<td> <button type="button" class="btn  btn-md pefboto">-</button><span class="btn btn-lg">'+resposta.compras[cesta].N_quantedade +'</span><button type="button" class="btn  btn-md pefboto">+</button> </td>' + '<td>' + resposta.compras[cesta].N_valorc+'</td></tr>')
                    $('#conteine_perfil').removeClass('d-none')
                    $('#conteine_perfil span').text(resposta.compras[cesta].C_nome)
                }
                $('#atualizar').removeClass('d-none')
                $('#conteine_login').addClass('d-none')
                $('#valor_total').text(preco)
                $('#valorpreco').text(preco);
                $('#cestaquatidade span').text(resposta.quant);
                $('#sai').removeClass('d-none')
                $('#sai span').html('<button class="bg-white border-0" value="desloga">Sai</button>');
                
            }
            }
            if (resposta.condicao == "pessoas") {
                $('#conteine_perfil').removeClass('d-none')
                $('#conteine_perfil span').text(resposta.compras.C_nome)
                $('#atualizar').removeClass('d-none')
                $('#conteine_login').addClass('d-none')
                $('#sai').removeClass('d-none')
                $('#sai span').html('<button class="bg-white border-0" value="desloga">Sai</button>');
                $('#inputEmail4').attr("placeholder", resposta.compras.C_cpf);
                $('#inputAddress01').attr("placeholder", resposta.compras.C_barrio);
                $('#inputAddress02').attr("placeholder", resposta.compras.C_rua);
                $('#inputAddress03').attr("placeholder", resposta.compras.N_numero);

                $('#inputCity').attr("placeholder", resposta.atualizar.C_cidade);
                $('#inputEstado01').attr("placeholder", resposta.atualizar.C_estado);
                $('#inputCEP').attr("placeholder", resposta.atualizar.C_cep);
            }
        })
        
    }
    cesta();
    function rastreio() {
        var tabela = "rastreio";
        var id = "";

        $.ajax({
            url: "administrado/fronteEnd/tabelaPri.php",
            type: "POST",
            dataType: "json",
            data: {
                'tabela': tabela,
                'id': id
            }

        }).done(function (resposta) {
            if (resposta.quant == 0) {
                // $('#progress').html('<div class="alert col-md-12 alert-danger alert-dismissible" role="alert"> <p><strong>Não foi encontrado nem um registro :(</strong></p></div>')
                $('#progress').html( '<div class="progress"><div class="progress-bar progress-bar-danger bg-danger progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"style="width: 50%;"><span >50% Complete</span></div></div>')

            }else{
                $('#progress').html( '<div class="progress"><div class="progress-bar progress-bar-danger bg-danger progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"style="width: 50%;"><span >50% Complete</span></div></div>')
                $('.rastreio').append('<tr><td colspan="4"><div class="alert col-md-12 alert-danger alert-dismissible" role="alert"> <p><strong>Não foi encontrado nem um registro :(</strong></p></div></td></tr>')


            }


        })
    }
    rastreio();


    function derivados() {
        var tabela = "derivados";
        var id = "";

        $.ajax({
            url: "administrado/fronteEnd/tabelaPri.php",
            type: "POST",
            dataType: "json",
            data: {
                'tabela': tabela,
                'id': id
            }

        }).done(function (resposta) {
            if (resposta.quant == 0) {
             

            }else{
                for (let index = 0; index < resposta.quant; index++) {
                
                    if (resposta.derivados[index].N_desconto) {
                        oferta(resposta.derivados);
                    }
                    feminino(resposta.derivados)
                    infantil(resposta.derivados)
                    for (let adiciona = 0; adiciona < $('.adiciona').length; adiciona++) {
                        $('.adiciona').eq(adiciona).on("click", () => {
                            cesta();
                            var codigocesta = $('.adiciona').eq(adiciona).val();
                            var quantcesta = resposta.derivados[index].N_quantidade;
                            var descontocesta = resposta.derivados[index].N_desconto;
                            var valor = resposta.derivados[index].N_valor;
                            var receita = resposta.derivados[index].C_receitas;
                            $.ajax({
                                url: "administrado/fronteEnd/Atualiza.php",
                                type: "POST",
                                dataType: "json",
                                data: {
                                    'quantcesta': quantcesta,
                                    'totalcesta': valor,
                                    'codigocesta': codigocesta,
                                    'descontocesta': descontocesta,
                                    'receitacesta': receita
                                }

                            }).done(function (resposta) {
                                if (resposta.erros) {
                                    $('#cestaquatidade').css({ "box-shadow": "0px 3px 10px" })
                                } else {
                                    $('#Entra').addClass("show");
                                    $("#alerta_ceta").css({ "position": "absolute", "z-index": "1000" }).show().animate({ left: "-250px" }).text("Click a qui para entra na sua conta!")
                                }
                            })
                        })

                    }
                }
               
                for (let index = 0; index < $('.derivado').length; index++) {

                    $(".derivado").eq(index).on("click", () => {

                        const val = $(".derivado").eq(index).val();
                        localStorage.setItem('chave', val);
                        location.replace("perfilpro.php?");
                    })
                }
            
        
            }

        })
    }
    derivados()


   function oferta(dado) {
    var element = []
    for (let index = 0; index < 5; index++) {
        element[index]="<figure></figure>"
    }
    $('#oferta').html(element);
    for (let index = 0; index < $('#oferta figure').length; index++) {
        
            $('#oferta figure').eq(index).attr('class',"border border-secondary ml-2 mb-4 pl-0  pr-0  col-md-2").attr("style","border-radius: 15px;overflow:hidden")
            $('#oferta figure').eq(index).html("<div></div>");
            $('#oferta figure').eq(index).append("<figcaption></figcaption>");
            $('#oferta figure:eq('+index+') div').attr("class","pt-3").html("<img src='administrado/fronteEnd/"+dado[index].C_foto+"' class='col-md-12 foto'>");
            $('#oferta figure:eq('+index+') figcaption').attr("class","ml-3 mt-3 mb-4 col-md-12 d-flex flex-column justify-content-center")
            for (let i = 0; i < 4; i++) {
                if(i == 0){
                    $('#oferta figure:eq('+index+') figcaption').append("<strong class='nome'>"+dado[index].C_produtos+"</strong>")

                }
                if(i == 1){
                    $('#oferta figure:eq('+index+') figcaption').append("<strong class='nome'>"+dado[index].N_desconto+"</strong>")
                }
                if(i == 2){
                    $('#oferta figure:eq('+index+') figcaption').append("<strong class='nome'>"+dado[index].N_valor+"</strong>")
                }
                
                
            }
            $('#oferta figure').eq(index).append("<div></div>");
            $('#oferta figure:eq('+index+') div:eq(1)').attr("class","p-2").html("<button></button>")
            $('#oferta figure:eq('+index+') div:eq(1) button').attr("value",dado[index].N_codigo).attr("class","btn  adiciona col-md-12 mb-2 text-white bg-danger d-flex flex-row align-items-center col-md-12 justify-content-center")
            $(".adiciona").html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Adiciona</a>')
            $('#oferta figure').eq(index).append("<button></button>");
            $('#oferta figure:eq('+index+')  button:eq(1)').attr("id","botaocompra").attr("value",dado[index].N_codigo).attr("class","derivado btn d-flex flex-row align-items-center col-md-12 justify-content-center")
            $('.derivado').html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Compra</a>')

        
        
    }
       
   }
    
   function categoria(dado) {
    $('.conteine_promacao').hide(); 
    var element = []
    for (let index = 0; index < 5; index++) {
        element[index]="<figure></figure>"
    }
    $('#cat').html(element);
    for (let index = 0; index < $('#cat figure').length; index++) {
        
            $('#cat figure').eq(index).attr('class',"border border-secondary ml-2 mb-4 pl-0  pr-0  col-md-2").attr("style","border-radius: 15px;overflow:hidden")
            $('#cat figure').eq(index).append("<div></div>");
            $('#cat figure').eq(index).append("<figcaption></figcaption>");
            $('#cat figure:eq('+index+') div').attr("class","pt-3").html("<img src='administrado/fronteEnd/"+dado[index].C_foto+"' class='col-md-12 foto'>");
            $('#cat figure:eq('+index+') figcaption').attr("class","ml-3 mt-3 mb-4 col-md-12 d-flex flex-column justify-content-center")
            for (let i = 0; i < 4; i++) {
                if(i == 0){
                    $('#cat figure:eq('+index+') figcaption').append("<strong class='nome'>"+dado[index].C_produtos+"</strong>")

                }
                if(i == 1){
                    $('#cat figure:eq('+index+') figcaption').append("<strong class='nome'>"+dado[index].N_desconto+"</strong>")
                }
                if(i == 2){
                    $('#cat figure:eq('+index+') figcaption').append("<strong class='nome'>"+dado[index].N_valor+"</strong>")
                }
                
                
            }
            $('#cat figure').eq(index).append("<div></div>");
            $('#cat figure:eq('+index+') div:eq(1)').attr("class","p-2").html("<button></button>")
            $('#cat figure:eq('+index+') div:eq(1) button').attr("value",dado[index].N_codigo).attr("class","btn  adiciona col-md-12 mb-2 text-white bg-danger d-flex flex-row align-items-center col-md-12 justify-content-center")
            $(".adiciona").html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Adiciona</a>')
            $('#cat figure').eq(index).append("<button></button>");
            $('#cat figure:eq('+index+')  button:eq(1)').attr("id","botaocompra").attr("value",dado[index].N_codigo).attr("class","compra btn d-flex flex-row align-items-center col-md-12 justify-content-center")
            $('.compra').html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Compra</a>')

        
            
    
    for (let index = 0; index < $('#cat .compra').length; index++) {
                
        $("#cat .compra").eq(index).on("click", () => {
            
            const val = $("#cat .compra").eq(index).val();
            localStorage.setItem('chave',val);
            location.replace("perfilpro.php?");
        })
     }
    }
   }
   


   function feminino(dado) {
       
    var element = []
    for (let index = 0; index < 5; index++) {
        element[index]="<figure></figure>"
    }
    $('#feminino').html(element);
    for (let index = 0; index < $('#feminino figure').length; index++) {
        
            $('#feminino figure').eq(index).attr('class',"border border-secondary ml-2 mb-4 pl-0  pr-0  col-md-2").attr("style","border-radius: 15px;overflow:hidden")
            $('#feminino figure').eq(index).html("<div></div>");
            $('#feminino figure').eq(index).append("<figcaption></figcaption>");
            $('#feminino figure:eq('+index+') div').attr("class","pt-3").html("<img src='administrado/fronteEnd/"+dado[index].C_foto+"' class='col-md-12 foto'>");
            $('#feminino figure:eq('+index+') figcaption').attr("class","ml-3 mt-3 mb-4 col-md-12 d-flex flex-column justify-content-center")
            for (let i = 0; i < 4; i++) {
                
                if(i == 0){
                    $('#feminino figure:eq('+index+') figcaption').append("<strong class='nome text-dark'>"+dado[index].C_produtos+"</strong>")

                }
                if(i == 1){
                    $('#feminino figure:eq('+index+') figcaption').append("<strong class='nome text-dark'>"+dado[index].N_desconto+"</strong>")
                }
                if(i == 2){
                    $('#feminino figure:eq('+index+') figcaption').append("<strong class='nome text-dark'>"+dado[index].N_valor+"</strong>")
                }
                
                
            }
            $('#feminino figure').eq(index).append("<div></div>");
            $('#feminino figure:eq('+index+') div:eq(1)').attr("class","p-2").html("<button></button>")
            $('#feminino figure:eq('+index+') div:eq(1) button').attr("value",dado[index].N_codigo).attr("class","btn  adiciona col-md-12 mb-2 text-white bg-danger d-flex flex-row align-items-center col-md-12 justify-content-center")
            $(".adiciona").html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Adiciona</a>')
            $('#feminino figure').eq(index).append("<button></button>");
            $('#feminino figure:eq('+index+')  button:eq(1)').attr("id","botaocompra").attr("value",dado[index].N_codigo).attr("class","derivado btn d-flex flex-row align-items-center col-md-12 justify-content-center")
            $('.derivado').html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Compra</a>')

        
        
    }
   }
   function infantil(dado) {
       
    var element = []
    for (let index = 0; index < 5; index++) {
        element[index]="<figure></figure>"
    }
    $('#infantil').html(element);
    for (let index = 0; index < $('#infantil figure').length; index++) {
        
            $('#infantil figure').eq(index).attr('class',"border border-secondary ml-2 mb-4 pl-0  pr-0  col-md-2").attr("style","border-radius: 15px;overflow:hidden")
            $('#infantil figure').eq(index).html("<div></div>");
            $('#infantil figure').eq(index).append("<figcaption></figcaption>");
            $('#infantil figure:eq('+index+') div').attr("class","pt-3").html("<img src='administrado/fronteEnd/"+dado[index].C_foto+"' class='col-md-12 foto'>");
            $('#infantil figure:eq('+index+') figcaption').attr("class","ml-3 mt-3 mb-4 col-md-12 d-flex flex-column justify-content-center")
            for (let i = 0; i < 4; i++) {
                
                if(i == 0){
                    $('#infantil figure:eq('+index+') figcaption').append("<strong class='nome text-dark'>"+dado[index].C_produtos+"</strong>")

                }
                if(i == 1){
                    $('#infantil figure:eq('+index+') figcaption').append("<strong class='nome text-dark'>"+dado[index].N_desconto+"</strong>")
                }
                if(i == 2){
                    $('#infantil figure:eq('+index+') figcaption').append("<strong class='nome text-dark'>"+dado[index].N_valor+"</strong>")
                }
                
                
            }
            $('#infantil figure').eq(index).append("<div></div>");
            $('#infantil figure:eq('+index+') div:eq(1)').attr("class","p-2").html("<button></button>")
            $('#infantil figure:eq('+index+') div:eq(1) button').attr("value",dado[index].N_codigo).attr("class","btn  adiciona col-md-12 mb-2 text-white bg-danger d-flex flex-row align-items-center col-md-12 justify-content-center")
            $(".adiciona").html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Adiciona</a>')
            $('#infantil figure').eq(index).append("<button></button>");
            $('#infantil figure:eq('+index+')  button:eq(1)').attr("id","botaocompra").attr("value",dado[index].N_codigo).attr("class","derivado btn d-flex flex-row align-items-center col-md-12 justify-content-center")
            $('.derivado').html('<svg   width="40" height="40" fill="#fff"  viewBox="0 0 35.991 32.987" ><path data-v-287683c1=""  d="M25.292 8.697h3.155L23.77.677c-.377-.65-1.212-.873-1.862-.49-.65.378-.872 1.212-.487 1.862l3.88 6.64zM14.586 2.05c.377-.65.162-1.484-.487-1.862-.65-.376-1.49-.162-1.87.488L7.56 8.704h3.154l3.872-6.655zm19.085 9.106H2.32C1.038 11.156 0 12.19 0 13.468v2.563c0 1.28 1.035 2.32 2.313 2.32h.724l2.23 12.09c.283 1.42 1.583 2.55 2.935 2.55h19.122c1.353 0 2.652-1.13 2.934-2.55l2.246-12.094h1.175c1.27 0 2.31-1.034 2.31-2.312v-2.57c-.01-1.27-1.04-2.303-2.32-2.303zm-20.9 17.297c0 .745-.6 1.308-1.31 1.308-.74 0-1.3-.6-1.3-1.3v-7.32c0-.74.61-1.3 1.31-1.3.75 0 1.31.608 1.31 1.31v7.32zm4.2 0c0 .745-.6 1.308-1.31 1.308-.74 0-1.31-.6-1.31-1.3v-7.32c0-.74.61-1.3 1.31-1.3s1.31.608 1.31 1.31v7.32zm4.22 0c0 .702-.56 1.308-1.31 1.308-.7 0-1.3-.56-1.3-1.3v-7.32c0-.7.61-1.3 1.31-1.3s1.31.56 1.31 1.31v7.32zm4.2 0c0 .702-.56 1.308-1.3 1.308-.702 0-1.31-.56-1.31-1.3v-7.32c0-.7.56-1.3 1.31-1.3.7 0 1.307.56 1.307 1.31v7.32z"></path></svg><a href="" class="text-white ml-2">Compra</a>')

        
        
    }
   }





    $(".finaliza").on("click",()=>{
        location.replace("cesta.php")
    })
    $("#pagina").on("click", () => {
        location.replace("index.php")
    })
    $(".botao_finalizar").on("click",()=>{
        location.replace("rastreio.php")
    })
    $("#cesta_perfil").on('click',()=>{
        location.replace("cesta.php")
    })

   
})
