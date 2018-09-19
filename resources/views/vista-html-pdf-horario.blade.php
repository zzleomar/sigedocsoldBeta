<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p><p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><strong><img alt="" src="{{ asset('/file/foto/udo.png')}}" width="80" height="80" /></strong></span></span></p>
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">UNIVERSIDAD DE ORIENTE</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">N&Uacute;CLEO DE SUCRE</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">ESCUELA DE CIENCIAS</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">DEPARTAMENTO DE INFORM&Aacute;TICA</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:14.0pt"><span style="color:#17365d">DEPARTAMENTO DE INFORM&Aacute;TICA - &nbsp;HORARIOS DE PREPARADUR&Iacute;AS @foreach($Periodo as $R) {{$R->nombre}} @endforeach</span></span></strong></span></span></p>

<table border="1" cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:solid #17365d 1.0pt; margin-left:2.15pt">
	<tbody>
		<tr>
			<td rowspan="2" style="background-color:#b8cce4; border-color:#17365d; height:15.75pt; width:151.25pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><strong><span style="color:#17365d">ASIGNATURA </span></strong></span></span></p>
			</td>
			<td rowspan="2" style="background-color:#b8cce4; border-color:#17365d; height:15.75pt; width:108.35pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><strong><span style="color:#17365d">PREPARADOR</span></strong></span></span></p>
			</td>
			<td rowspan="2" style="background-color:#b8cce4; border-color:#17365d; height:15.75pt; width:63.8pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><strong><span style="color:#17365d">D&Iacute;A</span></strong></span></span></p>
			</td>
			<td colspan="2" style="background-color:#b8cce4; border-color:#17365d; height:15.75pt; width:127.55pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><strong><span style="color:#17365d">HORA</span></strong></span></span></p>
			</td>
			<td rowspan="2" style="background-color:#b8cce4; border-color:#17365d; height:15.75pt; width:66.45pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><strong><span style="color:#17365d">AULA</span></strong></span></span></p>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color:#b8cce4; height:11.25pt; width:127.55pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><strong><span style="background-color:#b8cce4"><span style="color:#17365d">ENTRADA</span></span><span style="color:#17365d">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SALIDA</span></strong></span></span></p>
			</td>
		</tr>
		<tr>   @foreach($Horario as $R)
			<td rowspan="4" style="border-color:#17365d; width:151.25pt">
                            <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">{{$R->nombre}}</span></span></span></p>
			</td>
                       
			<td rowspan="4" style="width:108.35pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><em><span style="color:#17365d">{{$R->nombres}} {{$R->apellidos}}</span></em></span></span></p>
			</td>
                        @endforeach 
                      <td style="width:63.8pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">LUNES</span></span></span></p>
			</td>
			<td style="width:2.0cm">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">08:00 AM</span></span></span></p>
			</td>
			<td style="width:70.85pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">12:00</span></span></span></p>
			</td>
			<td style="width:66.45pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">info-03</span></span></span></p>
			</td>
               
		</tr>
		<tr>
			<td style="width:63.8pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">Jueves</span></span></span></p>
			</td>
			<td style="width:2.0cm">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">2:00</span></span></span></p>
			</td>
			<td style="width:70.85pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">4:00 pm</span></span></span></p>
			</td>
			<td style="width:66.45pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">CB-29</span></span></span></p>
			</td>
		</tr>
                <tr>
			<td style="width:63.8pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">vIERNES</span></span></span></p>
			</td>
			<td style="width:2.0cm">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">2:00</span></span></span></p>
			</td>
			<td style="width:70.85pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">4:00 pm</span></span></span></p>
			</td>
			<td style="width:66.45pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:Calibri,sans-serif"><span style="color:#17365d">CB-29</span></span></span></p>
			</td>
		</tr>
             

		
		
		
		
		
		
		
	</tbody>
</table>

<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Prof. Miguel A. Pagliarulo T.</strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:8pt"><span style="font-family:&quot;Times New Roman&quot;,serif">Coordinador&nbsp; de Preparadur&iacute;as</span></span></p>
