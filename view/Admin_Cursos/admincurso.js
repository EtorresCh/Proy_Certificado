var usu_id = $('#usu_idx').val();
function init(){
    $("#cursos_form").on("submit",function(e){
        guardaryeditar(e);
    });
}
function guardaryeditar(e){
    e.preventDefault(); 
    var formData = new FormData($("#cursos_form")[0]);  
    $.ajax({
        url:'../../controller/curso.php?op=guardaryeditar',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $('#cursos_data').DataTable().ajax.reload();
            $('#modalMantenimiento').modal('hide');
            Swal.fire({
                title: "Correcto!",
                text: "El curso se guardo correctamente!",
                icon: "success"
              });
        }
    });
}    
$(document).ready(function(){
    $('#cat_id').select2({
        dropdownParent: $('#modalMantenimiento')
    });
    $('#inst_id').select2({
        dropdownParent: $('#modalMantenimiento')
    });
    combo_categoria();
    combo_instructor();
    
    $('#cursos_data').DataTable({
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
            url: "../../controller/curso.php?op=listar",
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
function editar(cur_id) {
    $('#modalMantenimiento').modal('show');
    $('#cur_id').val(cur_id);
    $.ajax({
        url: '../../controller/curso.php?op=mostrar',
        type: 'POST',
        data: { cur_id: cur_id },
        dataType: 'json',
        success: function(data) {
            $('#cat_id').val(data.cat_id).trigger('change');
            $('#cur_nom').val(data.cur_nom);
            $('#cur_des').val(data.cur_des);
            $('#fech_ini').val(data.fech_ini);
            $('#fech_fin').val(data.fech_fin);
            $('#inst_id').val(data.inst_id).trigger('change');
            $('#modalMantenimiento').modal('hide');
        }
    });
}

function eliminar(cur_id) {
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
                url: '../../controller/curso.php?op=eliminar',
                type: 'POST',
                data: { cur_id: cur_id },
                success: function(response) {
                    $('#cursos_data').DataTable().ajax.reload();
                    Swal.fire(
                        '¡Eliminado!',
                        'El curso ha sido eliminado.',
                        'success'
                    );
                }
            });
        }
    });
}

function nuevo(){
    $('#lbltitulo').html('Nuevo Curso');
    $('#cursos_form')[0].reset();
    combo_categoria();
    combo_instructor();
    $('#modalMantenimiento').modal('show');
}
function imagen(){
    $('#modalFile').modal('show');
}
function combo_categoria(){
    $.post("../../controller/categoria.php?op=combo", function(data){
        $('#cat_id').html(data);
    });
}
function combo_instructor(){
    $.post("../../controller/instructor.php?op=combo", function(data){
        $('#inst_id').html(data);
    });
}
init();