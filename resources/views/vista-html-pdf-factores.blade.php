<p style="text-align:center"><img alt="" src="{{ asset('/file/foto/udo.png')}}" width="60" height="60" /></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:9.0pt">UNIVERSIDAD DE ORIENTE</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:9.0pt">N&Uacute;CLEO DE SUCRE</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:9.0pt">ESCUELA DE CIENCIAS</span></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:9.0pt">DEPARTAMENTO DE&nbsp; INFORM&Aacute;TICA</span></span></span></p>
@foreach($Periodo as $x)
<p style="margin-left:0cm; margin-right:0cm; text-align:center"><strong><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">LISTADO DE PREPARADORES DOCENTES ELEGIBLES PARA EL {{$x->nombre}}</span></span></strong></p>
@endforeach
<table align="left" border="1" cellspacing="0" class="Table" style="border-collapse:collapse; border:solid windowtext 1.0pt; margin-left:4.8pt; margin-right:4.8pt; width:527.85pt">
	<tbody>
		<tr>
			<td style="height:11.8pt; vertical-align:top; width:135.85pt">
			<h2 style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">Apellidos y Nombres</span></span></h2>
			</td>
			<td style="height:11.8pt; vertical-align:top; width:61.0pt">
			<h2 style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">C&eacute;dula</span></span></h2>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>1</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>2</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>3</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>4</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>5</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>6</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>7</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>8</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top; width:29.05pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>9</sub></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top; width:29.05pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>F<sub>10</sub></strong></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Lugar</strong></span></span></p>
			</td>
		</tr>
                @foreach($factor as $c)
		<tr>
			<td style="height:11.8pt; vertical-align:top; width:135.85pt">
			<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">{{$c->apellidos}} , {{$c->nombres}}</span></span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top; width:61.0pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->cedula}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f1}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f2}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f3}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f4}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f5}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f6}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f7}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f8}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top; width:29.05pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f9}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top; width:29.05pt">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$c->f10}}</span></span></p>
			</td>
			<td style="height:11.8pt; vertical-align:top">
			<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">{{$i++}}&deg;</span></span></p>
			</td>
		</tr>
                @endforeach
        </tbody>
</table>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>1</sub> = Promedio de Notas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; F<sub>2</sub> = N&ordm; Materias Aplazadas x 0.5</span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>3</sub> = Experiencia como Preparador (n&ordm; de&nbsp;&nbsp; sem. x 0.5; hasta un m&aacute;ximo de 2.50 ptos.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>4</sub> = Art&iacute;culos Publicados x 0.5</span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>5</sub> = Trabajos Cient&iacute;ficos x 0.25&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>6</sub> = Cursos Adicionales x 0.25</span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>7</sub> = Distinciones (c/u x 0.25; hasta un m&aacute;ximo de 1 punto).</span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>8</sub> =&nbsp; (F<sub>1</sub> &ndash; F<sub>2</sub>) x 0.7</span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>9</sub> =&nbsp; (F<sub>3</sub>+ F<sub>4</sub>+ F<sub>5</sub> + F<sub>6 </sub>+ F<sub>7</sub>) x 0.3</span></span></p>

<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">F<sub>10</sub> = F<sub>8</sub> + F<sub>9</sub></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif">_____________________________</span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>Prof. Miguel A. Pagliarulo T.</strong></span></span></p>

<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Coordinador de Preparadur&iacute;as</span></span></span></p>
