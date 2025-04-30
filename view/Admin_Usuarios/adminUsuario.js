var usu_id = $('#usu_idx').val();
function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);
    });
}
function guardaryeditar() {
    var formData = new FormData($("#usuario_form")[0]);  
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar", 
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#usuario_data').DataTable().ajax.reload();
            $('#modalusuario').modal('hide');
            Swal.fire({
                title: "Correcto!",
                text: "El usuario se guardo correctamente!",
                icon: "success"
              });
        }
    });
}   
$(document).ready(function(){
    $('#rol_id').select2({
        dropdownParent: $('#modalusuario')
    });
    combo_rol();
    $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url: "../../controller/usuario.php?op=listar",
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
function editar(usu_id) {
    $('#modalusuario').modal('show');
    $('#usu_id').val(usu_id);
    $.ajax({
        url: '../../controller/usuario.php?op=mostrar_editar',
        type: 'POST',
        data: { usu_id: usu_id },
        dataType: 'json',
        success: function(data) {
            $('#usu_nom').val(data.usu_nom);
            $('#usu_apep').val(data.usu_apep);
            $('#usu_apem').val(data.usu_apem);
            $('#usu_corr').val(data.usu_corr);   
            $('#usu_pass').val(data.usu_pass);  
            $('#telefono').val(data.telefono);
            $('#rol_id').val(data.rol_id);trigger('change');   
            $('#modalusuario').modal('hide');
        }
    });
}

function eliminar(usu_id) {
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
                url: '../../controller/usuario.php?op=eliminar',
                type: 'POST',
                data: { usu_id: usu_id },
                success: function(response) {
                    $('#usuario_data').DataTable().ajax.reload();
                    Swal.fire(
                        '¡Eliminado!',
                        'El usuario ha sido eliminado.',
                        'success'
                    );
                }
            });
        }
    });
}

function nuevo(){
    $('#lbltitulo').html('Nuevo Usuario');
    $('#usuario_form')[0].reset();
    combo_rol();
    $('#modalusuario').modal('show');
}
function combo_rol(){
    $.post("../../controller/rolusuario.php?op=combo", function(data){
        $('#rol_id').html(data);
    });
}
init();
