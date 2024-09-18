function deleteRegistroPaginacao(rotaUrl, idDoRegistro){

    if(confirm('Deseja excluir este produto?')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: idDoRegistro
            },

            beforeSend: function(){
                $.blockUI({
                    message: 'Carregando....',
                    timeout: 2000,
                });
            },
        }).done(function(data){
            $.unblockUI();
            console.log(data);
            window.location.reload();
        }).fail(function(data){
            $.unblockUI();
            alert('Não foi possivel retornar os dados');
        });
    }
}

$('#mascara_valor').mask('#.##0,00', { reverse: true })