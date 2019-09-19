$(() => {
    
    $('#form').bind('submit', function(e){
        e.preventDefault();

        var txt = $(this).serialize();
        console.log(txt);

        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: txt,
            success: (json) => {
                console.log(json);
                if(json == true) window.location.replace('teste.html');
                else alert('Usuário não existe.');
            },
            error: () => {
                alert("Erro");
            }
        });

        /*
            $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: txt,
            dataType: 'json',
            success: (json) => {
                console.log(json);
                console.log('Meu nome é: ' + json.usuario)
            },
            error: () => {
                alert("Erro");
            }
        });
        */

    });

});