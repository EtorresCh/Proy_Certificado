var usu_id = $('#usu_idx').val();
function init(){
    $("#instructor_form").on("submit",function(e){
        guardaryeditar(e);
    });
}
function guardaryeditar(e){
    e.preventDefault(); 
    var formData = new FormData($("#instructor_form")[0]);  
    $.ajax({
        url: "../../controller/instructor.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            console.log(data);
            $('#instructor_data').DataTable().ajax.reload();
            $('#modalInstructor').modal('hide');
            Swal.fire({
                title: "Correcto!",
                text: "El instructor se guardo correctamente!",
                icon: "success"
              });
        }
    });
}    
$(document).ready(function(){
    $('#inst_id').select2({
        dropdownParent: $('#modalInstructor')
    });
    $.post("../../controller/instructor.php?op=combo_sex", function(data){
      $('#inst_id').html(data);
    });
    
    $('#instructor_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url: "../../controller/instructor.php?op=listar",
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
function  editar(inst_id){
    $('#modalInstructor').modal('show');
    $('#inst_id').val(inst_id);
    $.ajax({
        url: '../../controller/instructor.php?op=mostrar',
        type: 'POST',
        data: {inst_id:inst_id },
        dataType: 'json',
        success: function(data) {
            $('#inst_nom').val(data.inst_nom);
            $('#inst_apep').val(data.inst_apep);
            $('#inst_apem').val(data.inst_apem);
            $('#inst_sex').val(data.inst_sex).trigger('change');
            $('#inst_telf').val(data.inst_telf);
            $('#inst_correo').val(data.inst_correo);
            $('#modalInstructor').modal('show');
        }
    });
}
function eliminar(inst_id){
    console.log("eliminar");
}

function nuevo(){
    $('#instructor_form')[0].reset();
    $('#modalInstructor').modal('show');
}
init();