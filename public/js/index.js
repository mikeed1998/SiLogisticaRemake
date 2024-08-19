console.log("FUNCIONA EL SCRIPT GENERAL");  

$(document).ready(function() {
    $('.editarajax').change(function() {
        var model = $(this).data('model');
        var field = $(this).data('field');
        var id = $(this).data('id');
        var newValue = $(this).val();

        $.ajax({
			url: 'EditarAJAX',
            method: 'PATCH', // PATCH ya que solo hago actualizacione parciales (buena práctica RESTful)
            data: {
                modelo: model,
                id: id,
                field: field,
                value: newValue,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response) {
                toastr.success(response.success, 'Dato Actualizado');
            },
            error: function(xhr) {
                toastr.error('Error al actualizar', 'Error');
            }
        });
    });
});


