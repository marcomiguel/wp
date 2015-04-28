jQuery(document).ready(function($) {
    $('#ajax-get').click(function(){
        var mydata = {
            action: "get_data",
        };
        $.ajax({
            type: "POST",
            url: ajaxurl,
            dataType: "json",
            data: mydata,
            success: function (data, textStatus, jqXHR) {
                var valor = data.responseText;
				$('#display').html(valor);
            },
            error: function (errorMessage) {
                var valor = errorMessage.responseText;
                $('#display').html(valor);
            }
        });      
    });	
});