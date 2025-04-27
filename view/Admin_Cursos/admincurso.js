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
        url: "../../controller/curso.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            console.log("test");
            $('#cursos_data').DataTable().ajax.reload();
        }
    });
}    
$(document).ready(function(){
    $('#cat_id').select2({
        dropdownParent: $('#modalMantenimiento')
    });
    $.post("../../controller/categoria.php?op=combo", function(data){
      $('#cat_id').html(data);
    });
    $('#inst_id').select2({
        dropdownParent: $('#modalMantenimiento')
    });
    $.post("../../controller/instructor.php?op=combo", function(data){
      $('#inst_id').html(data);
    });
    
    $('#cursos_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
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
function  editar(){
    console.log("editar");
}
function eliminar(cat_id){
}
function nuevo(){
    $('#cursos_form')[0].reset();
    $('#modalMantenimiento').modal('show');
}
