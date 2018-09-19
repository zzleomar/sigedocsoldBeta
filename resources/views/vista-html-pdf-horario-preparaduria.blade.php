@foreach($preparaduria as $preparador)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><img src="{{ asset('/file/foto/udo.png')}}" style="height:62px; width:76px" /></span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">UNIVERSIDAD DE ORIENTE</span></span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">N&Uacute;CLEO DE SUCRE</span></span></em></strong></span></span></p>
@foreach($Escuela as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">DECANATO / {{$P->nombre}} </span></span></em></strong></span></span></p>
@endforeach
@foreach($Dependencia as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">{{$P->nombre_dependencia}}</span></span></em></strong></span></span></p>
@endforeach

<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Cuman&aacute;,<?php echo date('d-m-Y');?>.</span></span></span></p>
@foreach($Oficio as $x)
<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">{{ $x->acronimo }}</span></span></span></p>
@endforeach
<p style="margin-left:0cm; margin-right:0cm; text-align:right">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Ciudadano(a):</span></em></strong></span></span></p>

@foreach($UserJobSchool as $P)             

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Prof(a). {{$P->nombres}} {{$P->apellidos}} </span></em></strong></span></span></p>
@endforeach
@foreach($Escuela as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Director(E) de la {{$P->nombre}}</span></em></strong></span></span></p>
@endforeach
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Su Despacho.-</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>



<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Reciba cordiales saludos. Anexo a la presente remito a usted los resultados del Concurso de Preparadores Docentes asignados por el Departamento de Inform&aacute;tica para el Per&iacute;odo {{$preparador->periodo}} &nbsp;</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sin mas que hacer referencia, se despide de usted.</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Atentamente,</span></span></span></p>

@foreach($Profesor as $P)
                @foreach($Sello as $S)

<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong><img alt="" src="{{ asset('/file/foto/'.$P->firma)}}" width="80" height="80" />                <img alt="" src="{{ asset('/file/foto/'.$S->sello)}}" width="80" height="80" />
</strong></span></span></p>
                        
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">__________________________</span></span></p>
@endforeach
@endforeach&nbsp;
			

@foreach($UserJobDep as $P)   
    @if($P->sexo==='Masculino')
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Prof. {{$P->nombres}} {{$P->apellidos}}</span></span></span></p>
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                @foreach($Dependencia as $P)
                    Jefe Del {{$P->nombre_dependencia}}
                @endforeach</span></span></span></p>
    @else
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Profa. {{$P->nombres}} {{$P->apellidos}}</span></span></span></p>
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                @foreach($Dependencia as $P)
                    Jefa Del {{$P->nombre_dependencia}}
                @endforeach</span></span></span></p>
    @endif
@endforeach


<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><img src="{{ asset('/file/foto/udo.png')}}" style="height:62px; width:76px" /></span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">UNIVERSIDAD DE ORIENTE</span></span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">N&Uacute;CLEO DE SUCRE</span></span></em></strong></span></span></p>
@foreach($Escuela as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">DECANATO / {{$P->nombre}} </span></span></em></strong></span></span></p>
@endforeach
@foreach($Dependencia as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">{{$P->nombre_dependencia}}</span></span></em></strong></span></span></p>
@endforeach

<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Cuman&aacute;,<?php echo date('d-m-Y');?>.</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:right">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Ciudadano(a):</span></em></strong></span></span></p>

@foreach($UserJobDep as $P)             

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Prof(a). {{$P->nombres}} {{$P->apellidos}} </span></em></strong></span></span></p>
@endforeach
@foreach($Dependencia as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Director(a) del {{$P->nombre_dependencia}}</span></em></strong></span></span></p>
@endforeach
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Su Despacho.-</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Ante todo reciba un cordial saludo.</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sirva la presente para hacerle entrega de los resultados relacionados con la evaluaci&oacute;n&nbsp; de los participantes a preparadores docentes del Departamento de Inform&aacute;tica para el Per&iacute;odo {{$preparador->periodo}} , se anexa tabla de valores&nbsp; de los factores considerados en la evaluaci&oacute;n y tabla de posiciones de los postulantes&nbsp;</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sin mas que hacer referencia, se despide de usted.</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Atentamente,</span></span></span></p>

@foreach($Profesors as $P)
                @foreach($Sello as $S)

<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong><img alt="" src="{{ asset('/file/foto/'.$P->firma)}}" width="80" height="80" />                <img alt="" src="{{ asset('/file/foto/'.$S->sello)}}" width="80" height="80" />
</strong></span></span></p>
                        
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">__________________________</span></span></p>
@endforeach
@endforeach&nbsp;
			

@foreach($UserJob as $P)   
    @if($P->sexo==='Masculino')
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Prof. {{$P->nombres}} {{$P->apellidos}}</span></span></span></p>
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                @foreach($Dependencias as $P)
                    Coordinador De {{$P->nombre}}
                @endforeach</span></span></span></p>
    @else
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Profa. {{$P->nombres}} {{$P->apellidos}}</span></span></span></p>
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                @foreach($Dependencias as $P)
                    Coordinadora De {{$P->nombre}}
                @endforeach</span></span></span></p>
    @endif
@endforeach





<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><img src="{{ asset('/file/foto/udo.png')}}" style="height:62px; width:76px" /></span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">UNIVERSIDAD DE ORIENTE</span></span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">N&Uacute;CLEO DE SUCRE</span></span></em></strong></span></span></p>
@foreach($Escuela as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">DECANATO / {{$P->nombre}} </span></span></em></strong></span></span></p>
@endforeach
@foreach($Dependencia as $P)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">{{$P->nombre_dependencia}}</span></span></em></strong></span></span></p>
@endforeach

<p style="margin-left:0cm; margin-right:0cm; text-align:right">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:right">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><strong><span style="font-family:Arial,sans-serif"><span style="font-size:16px">RESULTADOS DEL CONCURSO DE PREPARADORES DOCENTES {{$preparador->periodo}}</span></span></strong></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-family:Arial,sans-serif"><span style="font-size:16px">BACHILLERES ELEGIBLES</span></span></p>





<table border="1" cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:solid black 1.0pt">
	<tbody>
		<tr>
			<td style="border-color:black; vertical-align:top; width:62.1pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Posici&oacute;n</strong></span></span></p>
			</td>
			<td style="border-color:black; vertical-align:top; width:127.6pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Apellidos y Nombres</strong></span></span></p>
			</td>
			<td style="border-color:black; vertical-align:top; width:79.6pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Cedula</strong></span></span></p>
			</td>
			<td style="border-color:black; vertical-align:top; width:89.8pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Puntaje</strong></span></span></p>
			</td>
			<td style="border-color:black; vertical-align:top; width:89.8pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Condici&oacute;n</strong></span></span></p>
			</td>
		</tr>
                @foreach($Concurso as $item) 
		 
		<tr>
                    	<td style="border-color:black; vertical-align:top; width:62.1pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center">{{ $i++ }}</p>
			</td>
			<td style="vertical-align:top; width:127.6pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center">{{$item->apellidos}} {{$item->nombres}}</p>
			</td>
			<td style="vertical-align:top; width:79.6pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center">{{$item->cedula}}</p>
			</td>
			<td style="vertical-align:top; width:89.8pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center">{{$item->puntaje}}</p>
			</td>
			<td style="vertical-align:top; width:89.8pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center">{{$item->condicion}}</p>
			</td>
                    
		</tr>
	</tbody> @endforeach   
</table>


@foreach($Profesors as $P)
                @foreach($Sello as $S)

<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong><img alt="" src="{{ asset('/file/foto/'.$P->firma)}}" width="80" height="80" />                <img alt="" src="{{ asset('/file/foto/'.$S->sello)}}" width="80" height="80" />
</strong></span></span></p>
                        
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">__________________________</span></span></p>
@endforeach
@endforeach&nbsp;

@foreach($UserJob as $P)   
    @if($P->sexo==='Masculino')
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Prof. {{$P->nombres}} {{$P->apellidos}}</span></span></span></p>
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                @foreach($Dependencias as $P)
                    Coordinador De {{$P->nombre}}
                @endforeach</span></span></span></p>
    @else
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Profa. {{$P->nombres}} {{$P->apellidos}}</span></span></span></p>
    <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                @foreach($Dependencias as $P)
                    Coordinadora De {{$P->nombre}}
                @endforeach</span></span></span></p>
    @endif
@endforeach


<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:8.0pt">Apartado de Correo 245/t&eacute;lex 93134 &ndash;UDONS VE / Cable Univoriente / Cerro Colorado / Cuman&aacute; / Venezuela</span></span></span></p>

@endforeach