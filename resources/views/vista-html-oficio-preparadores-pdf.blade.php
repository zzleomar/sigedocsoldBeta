<p style="text-align:center"><img alt="" src="{{ asset('/file/foto/udo.png')}}" width="60" height="60" /></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">UNIVERSIDAD DE ORIENTE</span></em></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">N&Uacute;CLEO DE SUCRE</span></em></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">ESCUELA DE CIENCIAS </span></em></strong></span></span></p>
<!--<div style="border-bottom:solid windowtext 1.5pt; padding:0cm 0cm 1.0pt 0cm">-->
<!--</div>-->
@foreach($Oficio as $x)

<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$x->acronimo}}</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">Cuman&aacute;, 20 de abril de 2016.</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:right">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em>Ciudadano(a):</em></span></span></p>
@if($x->sexo=="Masculino")
    <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em>Lcdo. {{$x->nombres}} {{$x->apellidos}}</em></strong></span></span></p>
@else
    <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em>Lcda. {{$x->nombres}} {{$x->apellidos}}</em></strong></span></span></p>
@endif
@endforeach
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em>Delegada De Personal Nucleo de Sucre</em></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em>Presente.-</em></span></span></p>

@foreach($Oficio as $x)

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">Me dirijo a usted en la oportunidad de <strong>enviarle listado de preparadores docentes, </strong>correspondiente al <strong>semestre {{$x->periodo}}, </strong>discutido y avalado en los consejos de escuela <strong>N&deg; {{$x->nro_consejo}} </strong>en sus sesiones ordinarias de fechas <strong>&nbsp;{{$x->fecha_consejo}}</strong>.</span></span></p>



<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">Cabe destacar que las nuevas contrataciones se iniciaron a partir <strong>{{$x->fecha_contratacion}}.</strong><strong> </strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$x->cuerpo}}</span></span></p>
@endforeach


<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sin m&aacute;s nada que agregar, se suscribe.</span></span></p>



<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">Atentamente,</span></span></p>


               
@foreach($Oficio as $x)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$x->de}}</span></span></p>
@endforeach
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">Director (E) de la Escuela de Ciencias.</span></span></p>

<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
@foreach($ConCopia as $z)
<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:7pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:7.0pt">c.c: {{$z->concopia}}</span></span></span></p>
@endforeach

<!--<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">Av. Universidad Cerro Colorado Cuman&aacute; Estado Sucre Venezuela</span></em></strong></span></span></p>-->

<!--<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">Del Pueblo venimos /Hacia el Pueblo vamos</span></span></span></p>-->

<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p><p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><strong><img alt="" src="{{ asset('/file/foto/udo.png')}}" width="80" height="80" /></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">UNIVERSIDAD DE ORIENTE</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">N&Uacute;CLEO DE SUCRE</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">ESCUELA DE CIENCIAS </span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">DEPARTAMENTO DE INFORM&Aacute;TICA</span></em></strong></span></span></p>

<div style="border-bottom:solid windowtext 1.5pt; padding:0cm 0cm 1.0pt 0cm">
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">Av. Universidad Cerro Colorado Cuman&aacute; Estado Sucre Venezuela</span></em></strong></span></span></p>
</div>

<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">DEPARTAMENTO DE INFORMATICA</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>

<table border="1" cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:solid black 1.0pt">
	<tbody>
		<tr>
			<td style="background-color:#d9d9d9; border-color:black; width:177.95pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">N&deg;</span></span></span></p>
			</td>
			<td style="background-color:#d9d9d9; border-color:black; width:177.95pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">APELLIDOS Y NOMBRE</span></span></span></p>
			</td>
			<td style="background-color:#d9d9d9; border-color:black; width:178.0pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">C&Eacute;DULA DE IDENTIDAD</span></span></span></p>
			</td>
		</tr>
		@foreach($Concurso as $T)
                <tr>
			<td style="border-color:black; vertical-align:top; width:177.95pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">{{$i++}}</span></span></span></p>
			</td>
			<td style="vertical-align:top; width:177.95pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">{{$T->apellidos}} {{$T->nombres}}</span></span></span></p>
			</td>
			<td style="vertical-align:top; width:178.0pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">{{$T->cedula}}</span></span></span></p>
			</td>
		</tr>
		@endforeach
		
	</tbody>
</table>

<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">TOTAL: @foreach($C as $O) {{$O->cupo_asignado}} @endforeach PREPARADORES</span></span></p>
