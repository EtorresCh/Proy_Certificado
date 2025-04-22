 const canvas= document.getElementById('canvas');
 const ctx= canvas.getContext('2d');
 const img= new Image();
    img.src= '../../public/img/certificado.png'; 
        ctx.drawImage(img,0,0,canvas.width,canvas.height);
        ctx.font= 'bold 30px Arial';
        ctx.fillStyle= '#000000';
        ctx.textAlign= 'center';
        ctx.fillText('Nombre del Estudiante', canvas.width/2, 200);
        ctx.fillText('Curso de Programación', canvas.width/2, 300);
        ctx.fillText('Fecha de Finalización', canvas.width/2, 400);
 $(document).ready(function(){
    var curusu_id = getUrlParameter('curusu_id');

    $.post("../../controller/usuario.php?op=mostrar_cursos_detalle", { curusu_id: curusu_id }, function (data) {
        console.log(data);
    });
});
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};