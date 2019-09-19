$(function(){
    
    //Torna as linhas da tabela de pedidos clicáveis
    var cl_bg = $('.click-row').css('background-color'); 
    $('.click-row').hover(function(){
        $(this).css('cursor', 'pointer');
        $(this).css('background-color', '#b3d7ff');
    }, function(){
        $(this).css('background-color', cl_bg);
    });
    $('.click-row').click(function(){
        window.location = $(this).data("href");
    });

    $('#finalizarPedido').css('color', '#FFF');
    $('#finalizarPedido').click(function(){
        //var spinner = '<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>';
        try {
            finalizarPedido();
            //$('#finalizarPedido').html(spinner)
            window.location = 'index.php?statusPedido=finalizado';
        } catch (error) {
            alert(error);
        }
        
    });
    $('#finalizarPedido').hover(function(){
        $(this).css('cursor', 'pointer');
    }, function(){
    });

});