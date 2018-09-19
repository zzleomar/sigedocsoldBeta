@foreach($preparaduria as $preparador)
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><strong><img alt="" src="{{ asset('/file/foto/udo.png')}}" width="100" height="100" /></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:9.0pt">UNIVERSIDAD DE ORIENTE</span></em></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:9.0pt">N&Uacute;CLEO DE SUCRE </span></em></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:9.0pt">@foreach($Escuela as $P)
                   {{$P->nombre}}
                @endforeach / @foreach($Dependencia as $P)
                    {{$P->nombre_dependencia}}
                @endforeach</span></em></strong></span></span><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"></span></span></p>
<h2 style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</h2>
<p style="text-align:right"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">cuman&aacute;, <?php echo date('d-m-Y');?></span></span></p>
<h2 style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em>SOLICITUD DE PREPARADURIA N° {{$preparador->numero}}</em></span></span></h2>
<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><span style="color:black">Ciudadana:</span></span></strong></span></span></p>
<h2 style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt">
        <span style="font-family:Cambria,serif"><span style="color:#4f81bd">
                <em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                        <span style="color:black">
@foreach($UserJobDep as $P)             
    @if($P->sexo==='Masculino')
        Prof. {{$P->nombres}} {{$P->apellidos}}
    @else
        Profa. {{$P->nombres}} {{$P->apellidos}}
    @endif
@endforeach</span></span></em></span></span></span></h2>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><span style="color:black"> 
@foreach($UserJobDep as $P)
    @if($P->sexo==='Masculino')
       @foreach($Dependencia as $P)
            Jefe De {{$P->nombre_dependencia}}
       @endforeach
    @else
       @foreach($Dependencia as $P)
            Jefa De {{$P->nombre_dependencia}}
       @endforeach
    @endif
 @endforeach</span></span></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><span style="color:black">Su Despacho</span></span></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Bookman Old Style&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Respetuosamente acudo ante usted, a fin de solicitar un estudio de mis credenciales acad&eacute;micas, para optar a Preparador Docente en el periodo academico:<strong> {{$preparador->periodo}} </strong>en la Materia:<strong> {{$preparador->nombre}}</strong> , la cual aprobe con nota : <strong>{{$preparador->nota}}</strong> puntos.
Mi promedio general es de :        {{$preparador->promedio_general}} , tengo aprobado un total de : {{$preparador->creditos_aprobados}} creditos , voy a cursar el semestre : {{$preparador->semestre}} .
        </span></span></p>
<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Bookman Old Style&quot;,&quot;serif&quot;">ASIGNATURAS CURSADAS EN EL SEMESTRE ACTUAL:
                @foreach($materias as $materia)
               <strong style="font-size:10pt">{{$materia->codigo}} -   {{$materia->nombre}} </strong>  </span></span></span></p>
@endforeach
<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Bookman Old Style&quot;,&quot;serif&quot;">SOLICITUD: <strong> APROBADA POR </strong>    @foreach($Escuela as $P)
                  {{$P->nombre}}
                @endforeach </span></span></span></p>

<table cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:undefined">
	<tbody>
		<tr>
			<td style="vertical-align:top; width:149.6pt">
			<div style="border-bottom:solid windowtext 1.5pt; padding:0cm 0cm 1.0pt 0cm">
			<p style="margin-left:0cm; margin-right:0cm">@foreach($Profesor as $P)
                <img alt="" src="{{ asset('/file/foto/'.$P->firma)}}" width="80" height="80" />
                @endforeach
                @foreach($Sello as $S)
                <img alt="" src="{{ asset('/file/foto/'.$S->sello)}}" width="80" height="80" />
                @endforeach&nbsp;</p>
			</div>
                @foreach($UserJobDep as $P)             
               @if($P->sexo==='Masculino')
                 	<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                                    Prof. {{$P->nombres}} {{$P->apellidos}}
                </span></span></p>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                                    @foreach($Dependencia as $P)
                                        Jefe De {{$P->nombre_dependencia}}
                                    @endforeach
                @else
                 	<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                Profa. {{$P->nombres}} {{$P->apellidos}}
                </span></span></p>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                            @foreach($Dependencia as $P)
                    Jefa De {{$P->nombre_dependencia}}
                @endforeach
            @endif</span></span></p>
@endforeach
			<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
			</td>
			<td style="vertical-align:top; width:149.65pt">
			<div style="border-bottom:solid windowtext 1.5pt; padding:0cm 0cm 1.0pt 0cm">
			<p style="margin-left:0cm; margin-right:0cm">&nbsp; <img alt="" src="{{ asset('/file/foto/'.$preparador->firma)}}" width="80" height="80" /></p>
			</div>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Br. {{ $preparador->nombres.', '.$preparador->apellidos}}</span></span></p>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center">C.I.: {{$preparador->cedula}}&nbsp;</p>
			</td>
			<td style="vertical-align:top; width:149.65pt">
			<div style="border-bottom:solid windowtext 1.5pt; padding:0cm 0cm 1.0pt 0cm">
			<p style="margin-left:0cm; margin-right:0cm">&nbsp;@foreach($Profesors as $P)
                <img alt="" src="{{ asset('/file/foto/'.$P->firma)}}" width="80" height="80" />
                @endforeach
                @foreach($SellosEscuela as $S)
                <img alt="" src="{{ asset('/file/foto/'.$S->sello)}}" width="80" height="80" />
                @endforeach</p>
			</div>

			@foreach($UserJobSchool as $P)
                             @if($P->sexo==='Masculino')
                        <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">  
                                    Prof. {{$P->nombres}} {{$P->apellidos}}
                
                
                                </span></span></p>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"> 
                                @foreach($Escuela as $P)
                  Director De {{$P->nombre}}
                @endforeach
            
                                </span></span></p>
@else
 <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">  
                                    Profa. {{$P->nombres}} {{$P->apellidos}}
                
                
                                </span></span></p>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"> 
                                @foreach($Escuela as $P)
                  Directora De {{$P->nombre}}
                @endforeach
            
                                </span></span></p>
		
            @endif @endforeach	<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>
@endforeach