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
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12pt"><span style="font-family:&quot;Bookman Old Style&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Respetuosamente acudo ante usted, a fin de solicitar un estudio de mis credenciales acad&eacute;micas, para optar a Preparador Docente en el periodo academico<strong> {{$preparador->periodo}} </strong>en la Materia<strong> {{$preparador->codigo}} {{$preparador->nombre}}</strong> , la cual aprobe con nota <strong>{{$preparador->nota}}</strong> puntos. Cursare el <strong>{{$preparador->semestre}} </strong>  Semestre , con un N&ordm; de <strong>{{$preparador->creditos_aprobados}}</strong>  creditos aprobados ,siendo mi promedio general de notas <strong> {{$preparador->promedio_general}}</strong> puntos. Actualmente curso las siguientes asignaturas:</span></span></p>
                @foreach($materias as $materia)
               <strong>{{$materia->codigo}} -   {{$materia->nombre}} </strong>  </span></span></span></p>
@endforeach
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sin mas que hacer referencia, se despide de usted.</span></span></span></p>


<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10 pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Atentamente,</span></span></span></p>

<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong><img alt="" src="{{ asset('/file/foto/'.$preparador->firma)}}" width="80" height="80" /></strong></span></span></p>
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">__________________________</span></span></p>
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">Br. {{ $preparador->nombres.', '.$preparador->apellidos}}</span></span></p>
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">C.I.{{ $preparador->cedula}}
</span></span></p>

@endforeach