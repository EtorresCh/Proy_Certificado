var usu_id = $('#usu_idx').val();
function init(){
}
 
$(document).ready(function(){
    $('#cur_id').select2();
    combo_curso();
    $('#usuario_data').DataTable({
    });   
});  


function eliminar(usu_id) {
   
}

function combo_curso(){
    $.post("../../controller/curso.php?op=combo", function(data){
        $('#cur_id').html(data);
    });
}
init();