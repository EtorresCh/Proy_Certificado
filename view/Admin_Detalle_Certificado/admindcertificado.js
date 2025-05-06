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

function eliminar(curusu_id) {
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
function certificado(curusu_id){
    window.open('../Certificado/index.php?curusu_id='+ curusu_id +'','_blank');
}  

function nuevo(){
    if  ($('#cur_id').val()==''){
        Swal.fire({
            title: 'Error!',
            text: 'Selecciona Curso',
            icon:'info',
            confirmButtonText:'Aceptar'
        })
    }else{
        $('#lbltitulo').html('Selecciona Usuario');
        var cur_id = $('#cur_id').val();
        listar_usuario(cur_id);
        $('#modaldCertificado').modal('show');
    }    
}
function listar_usuario(cur_id){
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
            url: "../../controller/usuario.php?op=listar_detalle_usuario",
            type :"post",
            data:{cur_id:cur_id}
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
function registrardetalle() {
    var table = $('#usuario_data').DataTable();
    var usu_id = [];

    table.rows().every(function(rowIdx, tableLoop, rowLoop) {
        cell1 = table.cell({ row: rowIdx, column: 0 }).node();
        if ($('input',cell1).prop("checked")==true) {
            id=$('input',cell1).val();
            usu_id.push([id]);
        }
    });
    if (usu_id==0){
        Swal.fire({
            title: 'Error!',
            text: 'Selecciona Usuarios',
            icon:'info',
            confirmButtonText:'Aceptar'
        })
    }else{
        const formData = new FormData($("#form_detalle")[0]);
        formData.append('cur_id',cur_id);
        formData.append('usu_id',usu_id);
        $.ajax({
            url: "../../controller/curso.php?op=inser_curso_usuario",
            type : "post",
            data:formData,
            contentType:false,
            processData:false,
            success: function(response) {
                Swal.fire({
                    title: 'Éxito!',
                    text: 'Datos guardados correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    $('#modaldCertificado').modal('hide'); 
                    $('#detalle_data').DataTable().ajax.reload(); 
                });
            }
        });
        

    }
}
init();