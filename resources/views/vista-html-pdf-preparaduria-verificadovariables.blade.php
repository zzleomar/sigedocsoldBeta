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
@foreach($UserJobDep as $P)             
    @if($P->sexo==='Masculino')
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><span style="color:black">Ciudadano:</span></span></strong></span></span></p>
<h2 style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt">
        <span style="font-family:Cambria,serif"><span style="color:#4f81bd">
                <em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                        <span style="color:black">

    Prof. {{$P->nombres}} {{$P->apellidos}}
    @else
    <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><span style="color:black">Ciudadana:</span></span></strong></span></span></p>
<h2 style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt">
        <span style="font-family:Cambria,serif"><span style="color:#4f81bd">
                <em><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
                        <span style="color:black">

        Profa. {{$P->nombres}} {{$P->apellidos}}
    @endif
@endforeach</span></span></em></span></span></span></h2>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><span style="color:black"> 
@foreach($UserJobDep as $P)
    @if($P->sexo==='Masculino')
       @foreach($Dependencia as $P)
            Director De {{$P->nombre_dependencia}}
       @endforeach
    @else
       @foreach($Dependencia as $P)
            Directora De {{$P->nombre_dependencia}}
       @endforeach
    @endif
 @endforeach</span></span></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><span style="color:black">Su Despacho</span></span></strong></span></span></p>



<table cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:undefined">
	<tbody>
		<tr>
			<td style="vertical-align:top; width:149.6pt">
			<div style="border-bottom:solid windowtext 1.5pt; padding:0cm 0cm 1.0pt 0cm">
			<p style="margin-left:0cm; margin-right:0cm">@foreach($Profesors as $P)
                <img alt="" src="{{ asset('/file/foto/'.$P->firma)}}" width="80" height="80" />
                @endforeach
                @foreach($Sello as $S)
                <img alt="" src="{{ asset('/file/foto/'.$S->sello)}}" width="80" height="80" />
                @endforeach&nbsp;</p>
			</div>
                @foreach($UserJob as $P)             
               @if($P->sexo==='Masculino')
                 	<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                                    Prof. {{$P->nombres}} {{$P->apellidos}}
                </span></span></p>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                                    @foreach($Dependencias as $P)
                                       Coordinador De {{$P->nombre}}
                                    @endforeach
                @else
                 	<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                Profa. {{$P->nombres}} {{$P->apellidos}}
                </span></span></p>

			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                            @foreach($Dependencias as $P)
                   Coordinadora De {{$P->nombre}}
                @endforeach
            @endif</span></span></p>
@endforeach
			<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
			</td>
			
			
		</tr>
	</tbody>
</table>
@endforeach