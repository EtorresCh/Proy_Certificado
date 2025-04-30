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
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
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


function eliminar(usu_id) {
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

function combo_curso(){
    $.post("../../controller/curso.php?op=combo", function(data){
        $('#cur_id').html(data);
    });
}
init();