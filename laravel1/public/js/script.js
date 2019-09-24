$(document).ready(function () {
    $('#fisica-tab').on('click',()=>{
        $('#Fisica').removeClass('d-none')
        $('#Juridica').addClass('d-none')
        $('.submit').attr({
            name: "fisica",
            value: "fisica ",
            
        });
    })
    $('#juritica-tab').on('click', () => {
        $('#Juridica').removeClass('d-none')
        $('#Fisica').addClass('d-none')
        $('.submit').attr({
            name: "juridica",
            value: "juridica ",

        });
    })
    $('.batao_submit button').eq(0).hover(()=>{
    
        $('.batao_submit button').eq(0).addClass('submit').removeClass('bg-white text-dark');
        $('.batao_submit button').eq(1).removeClass('submit').addClass('bg-white text-dark');
    })
    $('.batao_submit button').eq(1).hover(()=>{
    
        $('.batao_submit button').eq(1).addClass('submit').removeClass('bg-white text-dark');
        $('.batao_submit button').eq(0).removeClass('submit').addClass('bg-white text-dark');
    })
})
