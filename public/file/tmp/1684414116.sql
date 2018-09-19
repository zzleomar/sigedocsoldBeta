SELECT p.cod_emp
                            ,id_personal
                            ,nombres
                            ,apellido_paterno
                            ,apellido_materno
                            ,genero
                            ,DATE_FORMAT(fecha_nacimiento, '%d/%m/%Y') fecha_nacimiento
                            ,p.vigencia
                            ,p.interno
                            ,id_filial
                            ,id_organizacion
                            ,p.cod_cargo
                            ,c.descripcion cargo
                            ,workflow
                            ,email
                            ,relator
                            ,reviso
                            ,elaboro
                            ,aprobo
                            ,extranjero
                            ,DATE_FORMAT(fecha_ingreso, '%d/%m/%Y') fecha_ingreso
                            ,DATE_FORMAT(fecha_egreso, '%d/%m/%Y') fecha_egreso
                            ,responsable_area
                            ,id_organizacion_resp
                            ,promover_cargo
                            ,analisis_causa
                            ,verifica_eficacia
                            ,valida_acc_co
                           , impresion_cc
                           , org.title organizacion
                         FROM mos_personal p
                        LEFT JOIN mos_cargo c ON c.cod_cargo = p.cod_cargo 
                        
                        left join(select cod_emp,
                                    GROUP_CONCAT(id_organizacion) id_organizacion_resp
                         from mos_responsable_area
                         group by cod_emp) resp on p.cod_emp = resp.cod_emp 

                        inner join
                         mos_organizacion org on p.id_organizacion = org.id
                         
                         WHERE p.cod_emp = $id 





SELECT cod_emp
                                    ,id_personal
                                    ,initcap(nombres) nombres
                                    ,initcap(apellido_paterno) apellido_paterno
                                    ,initcap(apellido_materno) apellido_materno
                                    ,id_organizacion
                                    ,(select 
                                  GROUP_CONCAT(o.title) id
                         from mos_organizacion o
                         where o.parent_id =id_organizacion
                         group by o.parent_id)
                                    ,DATE_FORMAT(fecha_nacimiento, '%d/%m/%Y') fecha_nacimiento
                                    ,CASE genero WHEN 1 THEN 'Masculino' ELSE 'Femenino' END genero
                                    ,c.descripcion cod_cargo
                                    ,CASE workflow  when 'S' then 'Si' Else 'No' END workflow
                                    ,p.vigencia
                                    ,CASE p.interno   when 1 then 'Si' Else 'No' END interno                                                                      
                                    ,id_filial                                                                                                            
                                    ,email
                                    ,CASE relator  when 'S' then 'Si' Else 'No' END relator
                                    ,CASE elaboro when 'S' then 'Si' Else 'No' END elaboro
                                    ,CASE reviso when 'S' then 'Si' Else 'No' END reviso                                    
                                    ,CASE aprobo  when 'S' then 'Si' Else 'No' END aprobo
                                    ,CASE responsable_area  when 'S' then 'Si' Else 'No' END responsable_area
                                    -- ,extranjero
                                    ,DATE_FORMAT(fecha_ingreso, '%d/%m/%Y') fecha_ingreso
                                    ,DATE_FORMAT(fecha_egreso, '%d/%m/%Y') fecha_egreso
                                    ,p1.nom_detalle p1 ,p2.nom_detalle p2 ,p3.nom_detalle p3 
                            FROM mos_personal p
                            LEFT JOIN mos_cargo c ON c.cod_cargo = p.cod_cargo  LEFT JOIN(select t1.id_registro, t2.descripcion as nom_detalle from mos_parametro_modulos t1
                                inner join mos_parametro_det t2 on t1.cod_categoria=t2.cod_categoria and t1.cod_parametro=t2.cod_parametro and t1.cod_parametro_det=t2.cod_parametro_det
                        where t1.cod_categoria='3' and t1.cod_parametro='17' ) AS p1 ON p1.id_registro = p.cod_emp  LEFT JOIN(select t1.id_registro, t2.descripcion as nom_detalle from mos_parametro_modulos t1
                                inner join mos_parametro_det t2 on t1.cod_categoria=t2.cod_categoria and t1.cod_parametro=t2.cod_parametro and t1.cod_parametro_det=t2.cod_parametro_det
                        where t1.cod_categoria='3' and t1.cod_parametro='18' ) AS p2 ON p2.id_registro = p.cod_emp  LEFT JOIN(select t1.id_registro, t2.descripcion as nom_detalle from mos_parametro_modulos t1
                                inner join mos_parametro_det t2 on t1.cod_categoria=t2.cod_categoria and t1.cod_parametro=t2.cod_parametro and t1.cod_parametro_det=t2.cod_parametro_det
                        where t1.cod_categoria='3' and t1.cod_parametro='36' ) AS p3 ON p3.id_registro = p.cod_emp 
                            WHERE 1 = 1  AND upper(p.interno) like '%1%' AND id_organizacion IN (21,44,55,160) order by apellido_paterno asc





                            select 
                                  id,  GROUP_CONCAT(title) id
                         from mos_organizacion
                         group by parent_id