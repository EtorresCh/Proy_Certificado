const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const image = new Image();
const imageqr = new Image();

$(document).ready(function () {
    var curusu_id = getUrlParameter('curusu_id');
    $.post("../../controller/usuario.php?op=mostrar_cursos_detalle", { curusu_id: curusu_id }, function (data) {
        data = JSON.parse(data);
        image.src = data.cur_img;

        image.onload = function () {
            // Dibujar la imagen una vez cargada
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            var x = canvas.width / 2;

            ctx.font = '25px Times New Roman';
            ctx.fillText(data.usu_nom + ' ' + data.usu_apep + ' ' + data.usu_apem, x, 160);

            ctx.font = '27px Times New Roman';
            ctx.fillText(data.cur_nom, x, 200);

            ctx.font = '18px Times New Roman';
            ctx.fillText(data.inst_nom + ' ' + data.inst_apep + ' ' + data.inst_apem, x, 250);

            ctx.font = '12px Times New Roman';
            ctx.fillText("Fecha Inicio: " + data.fech_ini + "                Fecha Fin: " + data.fech_fin, x, 300);

            $('#cur_des').html(data.cur_des);
        };
    });
});

// Recarga solo una vez por sesión usando hash
window.onload = function () {
    if (!window.location.hash) {
        window.location.href = window.location.href + "#loaded";
        window.location.reload();
    }
};

// Botón para descargar PNG
$(document).on("click", "#btnpng", function () {
    let lblng = document.createElement('a');
    lblng.download = 'certificado.png';
    lblng.href = canvas.toDataURL('image/png', 1.0);
    lblng.click();
});

// Botón para descargar PDF
$(document).on("click", "#btnpdf", function () {
    var imgData = canvas.toDataURL('image/png');
    var doc = new jsPDF('l', 'mm');
    doc.addImage(imgData, 'PNG', 30, 15);
    doc.save('certificado.pdf');
});

// Función para obtener parámetros por URL
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName;

    for (var i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
