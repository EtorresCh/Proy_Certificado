var usu_id = $('#usu_idx').val();
function init(){
}
 
$(document).ready(function(){
    $('#cur_id').select2();
    combo_curso();
    $("#cur_id").change(function(){
      $("#cur_id option:selected").each(function(){
         cur_id=$(this).val();
         $('#detalle_data').DataTable({
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
                url: "../../controller/usuario.php?op=listar_cursos_usuario",
                type : "post",
                data:{cur_id:cur_id},
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
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
    });
});  


function certificado(curusu_id){
    window.open('../Certificado/index.php?curusu_id='+ curusu_id +'','_blank');
}  


function eliminar(curusu_id) {
    console.log("hasta aqui");
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
                url: '../../controller/curso.php?op=eliminar_curso_usuario',
                type: 'POST',
                data: { curusu_id: curusu_id },
                success: function(response) {
                    $('#detalle_data').DataTable().ajax.reload();
                    Swal.fire(
                        '¡Eliminado!',
                        'El registro ha sido eliminado.',
                        'success'
                    );
                }
            });
        }
    });
}


function combo_curso(){
    $.post("../../controller/curso.php?op=combo", function(data){
        $('#cur_id').html(data);
    });
}
function nuevo(){
    listar_usuario();
    $('#lbltitulo').html('Nuevo Registro');
    $('usuario_form')[0].reset();
    $('#modaldCertificado').modal('show');
}
function listar_usuario(){
    $('#usuario_data').DataTable({
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
}
init();