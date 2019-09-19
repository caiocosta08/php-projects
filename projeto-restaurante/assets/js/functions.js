var finalizarPedido = () => {
    $.ajax({
        type: 'POST',
        url: 'finalizar-pedido.php',
        data: JSON.stringify({
            id_pedido: $("#idPedido").text().trim(),
            valor: $("#valorTotal").text().trim().split('R$')[1],
        })
    }).done(function(s){
        if(s == 'pedido-finalizado'){
            return s;
        }else{
            return false;
        }
    }).fail(function(f){
            return false;
    });

    /*
    var url = 'finalizar-pedido.php';
    return fetch(url, {
      method: 'POST',
      headers: {
        //Accept: 'application/json',
        //'Content-Type': 'application/json',
        dataType: 'application/json'
        },
      body: JSON.stringify({
        id_pedido: $("#idPedido").text().trim(),
        valor: $("#valorTotal").text().trim().split('R$')[1],
      })
    })
    .then((response) => response.text())
    .then((responseJSON) => {
        console.log(responseJSON)
        if(responseJSON == 'pedido-finalizado') window.location = 'index.php';
    })
    */
}