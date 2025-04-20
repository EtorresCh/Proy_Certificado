/* muestra el usuario con el curso, instructor */
SELECT
    curso_usuario.curusu_id,
    curso.cur_id,
    curso.cur_nom,
    curso.cur_des,
    curso.fech_ini,
    curso.fech_fin,
    usuario.usu_id,
    usuario.usu_nom,
    usuario.usu_apep,
    usuario.usu_apem,
    instructor.inst_id,
    instructor.inst_nom,
    instructor.inst_apep,
    instructor.inst_apem
FROM curso_usuario
INNER JOIN curso ON curso_usuario.cur_id = curso.cur_id
INNER JOIN usuario ON curso_usuario.usu_id = usuario.usu_id
INNER JOIN instructor ON curso.inst_id = instructor.inst_id
WHERE curso_usuario.usu_id = 1;