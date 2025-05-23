var usu_id = $('#usu_idx').val();
function init(){
    $("#categoria_form").on("submit",function(e){
        e.preventDefault();
        guardaryeditar(e);
    });
}
function guardaryeditar() {
    var formData = new FormData($("#categoria_form")[0]);  
    $.ajax({
        url: "../../controller/categoria.php?op=guardaryeditar", 
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            Swal.fire({
                title: "Correcto!",
                text: "¡La categoría se guardó correctamente!",
                icon: "success"
            }).then(() => {
                $('#categoria_data').DataTable().ajax.reload();
                $('#modalCategoria').modal('hide');
            });
        },
        error: function(xhr, status, error) {
            console.error("Error AJAX:", error);
        }
    });
}
   
$(document).ready(function(){
    $('#categoria_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
         buttons: [
            {
                extend: 'copyHtml5',
                text: 'Copiar',
                className: 'btn btn-primary'
            },
            {
                extend: 'excelHtml5',
                text: 'Exportar Excel',
                className: "btn btn-success"
            },
            {
                extend: 'csvHtml5',
                text: 'Exportar CSV',
                className: 'btn btn-info'
            }
        ],
        "ajax":{
            url: "../../controller/categoria.php?op=listar",
            type :"post"
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 15,
	    "order": [[ 0, "asc" ]],
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando  registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de  un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
		},
	});   
});  
function editar(cat_id) {
    $('#modalCategoria').modal('show');
    $('#cat_id').val(cat_id);
    $.ajax({
        url: '../../controller/categoria.php?op=mostrar',
        type: 'POST',
        data: { cat_id: cat_id },
        dataType: 'json',
        success: function(data) {
            $('#cat_nom').val(data.cat_nom);
            $('#modalCategoria').modal('hide');
        }
    });
}

function eliminar(cat_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../../controller/categoria.php?op=eliminar',
                type: 'POST',
                data: { cat_id: cat_id },
                success: function(response) {
                    $('#categoria_data').DataTable().ajax.reload();
                    Swal.fire(
                        '¡Eliminado!',
                        'La categoria ha sido eliminado.',
                        'success'
                    );
                }
            });
        }
    });
}

function nuevo(){
    $('#categoria_form')[0].reset();
    $('#modalCategoria').modal('show');
}
init();
