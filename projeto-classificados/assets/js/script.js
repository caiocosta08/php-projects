$(function(){
    $('#telefone').mask("(00) 0 0000-0000");
    $('#valor').mask('000.000.000.000.000,00', {reverse: true});
    $('.table_row').on('click', function(){
        window.location = $(this).data('href');
    });
    $('.table_row').css('cursor', 'pointer');
});