@foreach($documentos as $documento) 
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:10.0pt"><img src="{{ asset('/file/foto/udo.png')}}" style="height:58px; width:85px" /></span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt">UNIVERSIDAD DE ORIENTE</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt">N&Uacute;CLEO DE SUCRE</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt">DECANATO/{{ $documento->escuela}}</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:10.0pt">{{ $documento->nombre_dependencia }}</span></em></strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Cuman&aacute;, <?php echo date('d-m-Y');?></span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:right"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">{{ $documento->acronimo }}</span></span></span></p>



<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Ciudadano:</span></em></strong></span></span></p>
@foreach($Profesor as $Prof) 
@if($Prof->sexo=='Masculino')
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PROF. {{$Prof->nombres}} {{$Prof->apellidos}}</span></em></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">DIRECTOR DE LA {{ $documento->escuela}}</span></em></strong></span></span></p>
@else
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PROF(A). {{$Prof->nombres}} {{$Prof->apellidos}}</span></em></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">DIRECTOR(A) DE LA {{ $documento->escuela}}</span></em></strong></span></span></p>

@endif
@endforeach

<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Su Despacho.-</span></em></strong></span></span></p>

@foreach($Estudiante as $x) 
<p style="margin-left:0cm; margin-right:0cm; text-align:justify">
    <span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">
            <span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                La presente tiene por finalidad solicitarle la realizaci&oacute;n de los tr&aacute;mites administrativos para la Contrataci&oacute;n</span>
            <span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"> 
                       @if($x->sexo=='Masculino') 
                        del <strong><em> Lcdo. {{$x->nombres}} {{$x->apellidos}} , C.I: {{$x->cedula}}
                                </em></strong>
                    @else
                      de la <strong><em>   Lcda.{{$x->nombres}} {{$x->apellidos}} , C.I: {{$x->cedula}}
                   
                    
                    </em></strong>
                @endif
                @endforeach, </span><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">para el per&iacute;odo Acad&eacute;mico {{$documento->periodo}}.</span></span></span></p>


<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Esta Contrataci&oacute;n tiene <strong>Dedicaci&oacute;n {{ $documento->nombre_dedicacion }}</strong></span><strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"> (16h),</span></strong> <span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">para dictar la asignatura <strong>{{$documento->materia}} </strong></span><strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"> {{$documento->codigo}} ({{$documento->seccion}})</span></strong><strong> </strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">que ofrecer&aacute; nuestro Programa para el mencionado per&iacute;odo.</span></span></span></p>


<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:8pt"><span style="font-family:Arial,sans-serif">Sin otro particular al cual hacer referencia</span><span style="font-family:Arial, sans-serif">, se despide</span></span></p>
<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Atentamente,</span></span></span></p>
<p style="text-align:center">&nbsp;</p>
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:8px"><strong>
              @foreach($ProfesorJefe as $Sx)
                <img alt="" src="{{ asset('/file/foto/'.$Sx->firma)}}" width="60" height="60" />
              @endforeach  
              @foreach($Sello as $S)   
                <img alt="" src="{{ asset('/file/foto/'.$S->sello)}}" width="60" height="60" />
            @endforeach
            </strong></span></span></p>
                        
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:8px">__________________________</span></span></p>

@foreach($membrete as $x) 
@if($x->sexo==='Masculino')
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PROF. {{$x->nombres}} {{$x->apellidos}} </span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">JEFE DEL {{$documento->nombre_dependencia}}</span></span></span></p>

@else
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">PROFA. {{$x->nombres}} {{$x->apellidos}} </span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">JEFA DEL  {{$documento->nombre_dependencia}}</span></span></span></p>

@endif
@endforeach




@foreach($ConCopia as $x)
<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Cc.  {{$x->concopia}}</span></span></span></p>

@endforeach
@foreach($Estudiante as $x) 

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">                       @if($x->sexo=='Masculino') 
                        Lcdo. {{$x->nombres}} {{$x->apellidos}} 
                    @else
                         Lcda. {{$x->nombres}} {{$x->apellidos}}
                   
                    @endif
</span></span></span></p>

@endforeach

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">DA/elizabeth</span></span></p>



<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><em><span style="font-size:8.0pt">Apartado de Correo 245/t&eacute;lex 93134 &ndash;UDONS VE / Cable Univoriente / Cerro Colorado / Cuman&aacute; /</span></em></strong><strong><em><span style="font-size:9.0pt"> Venezuela</span></em></strong></span></span></p>

@endforeach