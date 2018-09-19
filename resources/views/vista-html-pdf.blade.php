@foreach($documentos as $documento) 
<div id="main-content" class="main-content panel-container col-xs-12 ">
    <div class="content-panel panel">
        <div class="content">
            <div class="report-body">    
                <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong><img alt="" src="{{ asset('/file/foto/udo.png')}}" width="100" height="100" /></strong></span></span></p>
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong>UNIVERSIDAD DE ORIENTE</strong></span></span></p>
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong>NUCLEO DE SUCRE</strong></span></span></p>
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong>DECANATO /{{ $documento->escuela}} </strong></span></span></p>
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong>{{ $documento->nombre_dependencia }}</strong></span></span></p>
            <p style="text-align:right"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">cuman&aacute;, <?php echo date('d-m-Y');?></span></span></p>
            <p style="text-align:right"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong></strong></span></span></p>
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong>PARA: &nbsp;{{ $documento->para_circular}}</strong></span></span></p>
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong>DE: &nbsp;{{ $documento->de_circular}}</strong></span></span></p>
<p style="text-align:center"><strong>Circular N°  {{ $documento->numero}} </strong></p>


<?php  echo($documento->cuerpo_circular);?>





<p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">&nbsp; &nbsp; &nbsp; &nbsp;Sin otro particular, se despide de usted.</span></span></p>

<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">Atentamente,</span></span></p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">__________________________</span></span></p>

@if($documento->sexo==='Femenino')
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">Profa. {{ $documento->nombres.', '.$documento->apellidos}}</span></span></p>
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">Jefa del {{ $documento->nombre_dependencia }}</span></span></p>
@endif

@if($documento->sexo==='Masculino')
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">Prof. {{ $documento->nombres.', '.$documento->apellidos}}</span></span></p>
<p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">Jefe del {{ $documento->nombre_dependencia }}</span></span></p>
@endif
<p style="text-align:center">&nbsp;</p>

<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">Nota: {{ $documento->nota_circular }} </span></span></p>

<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">c.c : Archivo</span></span></p>

<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">CR/Elizabet Perez</span></span></p>

<p>&nbsp;</p>


<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px">Apartado de Correo 245/t&eacute;lex 93134 &ndash;UDONS VE / Cable Univoriente / Cerro Colorado / Cuman&aacute; / Venezuela</span></span></p>

<p>&nbsp;</p>

<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:12px"><strong>&nbsp; &nbsp;&nbsp;</strong></span></span></p>

<p>&nbsp;</p>

<p style="text-align:center">&nbsp;</p>


            </div>
                        
            
        </div>
    </div>

</div>


@endforeach
