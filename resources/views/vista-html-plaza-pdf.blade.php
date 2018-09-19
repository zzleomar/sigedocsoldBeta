<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong><img alt="" src="{{ asset('/file/foto/udo.png')}}" width="100" height="100" /></strong></span></span></p>
         
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">UNIVERSIDAD DE ORIENTE</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">N&Uacute;CLEO DE SUCRE</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">ESCUELA DE CIENCIAS</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">DEPARTAMENTO DE INFORM&Aacute;TICA</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif"><strong>CONCURSO DE PREPARADUR&Iacute;AS.</strong></span></span></p>

@foreach($data as $documento) 
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LA LICENCIATURA EN INFORM&Aacute;TICA ABRE CONCURSO PARA PREPARADORES DOCENTES, EN EL PER&Iacute;ODO {{$documento->nombre}} EN LAS SIGUIENTES ASIGNATURAS:</span></span></p>
@endforeach
@foreach($Plazas as $x) 
<ul>
	<li style="text-align:justify"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">{{$x->asignatura}}</span></span></li>
</ul>
@endforeach
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif"><strong>PERFIL DEL PREPARADOR DOCENTE.</strong></span></span></p>

<ul>
	<li style="text-align:justify"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">PROMEDIO EN CURSOS B&Aacute;SICOS: M&Iacute;NIMO 6 PUNTOS.</span></span></li>
	<li style="text-align:justify"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">UNIDADES DE CR&Eacute;DITOS APROBADAS: M&Iacute;NIMO 60 CR&Eacute;DITOS.</span></span></li>
	<li style="text-align:justify"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">PROMEDIO ARITM&Eacute;TICO EN LA CARRERA: M&Igrave;NIMO 6 PUNTOS.</span></span></li>
	<li style="text-align:justify"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">HABER APROBADO TODAS LAS ASIGNATURAS DE CURSOS B&Aacute;SICOS</span></span></li>
</ul>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><strong style="font-family:&quot;Times New Roman&quot;,Times,serif; font-size:12px">NOTA: LOS BACHILLERES QUE NO CUMPLAN CON ESTE PERFIL SER&Aacute;N DECLARADOS NO ELEGIBLES.</strong></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif"><strong>COMISI&Oacute;N DE PREPARADUR&Iacute;AS</strong></span></span></p>
