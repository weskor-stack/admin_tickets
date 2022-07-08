<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" xmlns="http://www.w3.org/TR/REC-html40">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=iso-8859-1">
			<meta name=Generator content="Microsoft Word 15 (filtered medium)"><!--[if !mso]><style>v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style><![endif]--><style><!--
/* Font Definitions */
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:"Century Gothic";
	panose-1:2 11 5 2 2 2 2 9 2 4;}
/* Style Definitions */
p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-fareast-language:EN-US;}
span.EstiloCorreo17
	{mso-style-type:personal-compose;
	font-family:"Calibri",sans-serif;
	color:windowtext;}
.MsoChpDefault
	{mso-style-type:export-only;
	font-family:"Calibri",sans-serif;
	mso-fareast-language:EN-US;}
@page WordSection1
	{size:612.0pt 792.0pt;
	margin:70.85pt 3.0cm 70.85pt 3.0cm;}
div.WordSection1
	{page:WordSection1;}
--></style><!--[if gte mso 9]><xml>
<o:shapedefaults v:ext="edit" spidmax="1026" />
</xml><![endif]--><!--[if gte mso 9]><xml>
<o:shapelayout v:ext="edit">
<o:idmap v:ext="edit" data="1" />
</o:shapelayout></xml><![endif]--></head>
<body lang=EN-GB link="#0563C1" vlink="#954F72" style='word-wrap:break-word'>
	<div class=WordSection1>
		<strong><p class=MsoNormal>{{ $dataMail->salute }}<o:p></o:p></p></strong>
		<p class=MsoNormal><o:p>&nbsp;</o:p></p>
		<p class=MsoNormal><span lang=ES-MX>{{ $dataMail->paragraph1 }}<o:p></o:p></span></p>
		<p class=MsoNormal><span lang=ES-MX>{{ $dataMail->paragraph2 }}<o:p></o:p></span></p>
		<p class=MsoNormal><span lang=ES-MX>{{ $dataMail->client }}<o:p></o:p></span></p>
		<strong><p class=MsoNormal><span lang=ES-MX>{{ $dataMail->paragraph3 }}<o:p></o:p></span></p></strong>

		<p class=MsoNormal><span lang=ES-MX>{{ $dataMail->contact }}<o:p></o:p></span></p>
		<strong><p class=MsoNormal><span lang=ES-MX>{{ $dataMail->paragraph4 }}<o:p></o:p></span></p></strong>

		<p class=MsoNormal><span lang=ES-MX>{{ $dataMail->email }}<o:p></o:p></span></p>
		<strong><p class=MsoNormal><span lang=ES-MX>{{ $dataMail->paragraph5 }}<o:p></o:p></span></p></strong>

		<p class=MsoNormal><span lang=ES-MX><o:p>&nbsp;</o:p></span></p>
		<p class=MsoNormal align=center style='text-align:center'>
			<span lang=ES-MX style='font-size:9.0pt;mso-fareast-language:EN-GB'><img width=437 height=86 style='width:4.552in;height:.8958in' id="Imagen_x0020_2" src="{{ asset('images/logoAutomatyco3.png') }}"></span>
			<b><span lang=ES-MX style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#002060;mso-fareast-language:EN-GB'><img width=86 height=86 style='width:.8958in;height:.8958in' id="Imagen_x0020_1" src="{{ asset('images/iso.png') }}"><o:p></o:p></span></b>
		</p>
		<p class=MsoNormal align=center style='text-align:center'>
			<b><span lang=ES-MX style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#002060;mso-fareast-language:EN-GB'>{{ $dataMail->sender }} | AUTOMATYCO | Ingeniero de Programación PLC y Aplicaciones<o:p></o:p></span></b>
		</p>
		<p class=MsoNormal align=center style='text-align:center'>
			<b><span lang=ES-MX style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#002060;mso-fareast-language:EN-GB'>Av. 5 de mayo #15 Int. 8| San Juan de Ocotán, Zapopan, Jal., Mex. </span></b>
			<b><span lang=EN-US style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#002060;mso-fareast-language:EN-GB'>CP 45019<o:p></o:p></span></b>
		</p>
		<p class=MsoNormal align=center style='text-align:center'>
			<b><span lang=EN-US style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#002060;mso-fareast-language:EN-GB'>Tel: +52 (33) 31201000.<o:p></o:p></span></b>
		</p>
		<p class=MsoNormal align=center style='text-align:center'>
			<span lang=ES style='mso-fareast-language:EN-GB'>
				<a href="mailto:{{ $dataMail->senderEmail }}">
					<b><span lang=EN-US style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:blue'>{{ $dataMail->senderEmail }}</span></b>
				</a>
			</span>
			<span lang=EN-US style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;mso-fareast-language:EN-GB'> | </span>
			<span lang=ES style='mso-fareast-language:EN-GB'>
				<a href="http://www.automatyco.com">
					<b><span lang=EN-US style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:blue'>www.automatyco.com</span></b>
				</a>
			</span>
			<b><span lang=EN-US style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#0070C0;mso-fareast-language:EN-GB'><o:p></o:p></span></b>
		</p>
		<p class=MsoNormal align=center style='text-align:center'>
			<b><span lang=ES-MX style='font-size:10.0pt;font-family:"Arial",sans-serif;color:darkgreen;mso-fareast-language:EN-GB'><img border=0 width=32 height=32 style='width:.3333in;height:.3333in' id="Imagen_x0020_3" src="{{ asset('images/verde.png') }}" alt=recicle></span></b>
			<b><span lang=ES-MX style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#0070C0;mso-fareast-language:EN-GB'><o:p></o:p></span></b>
		</p>
		<p class=MsoNormal align=center style='text-align:center'>
			<b><span lang=ES-MX style='font-size:8.0pt;font-family:"Arial",sans-serif;color:darkgreen;mso-fareast-language:EN-GB'>Antes de imprimir este e-mail y sus documentos, piense bien si es realmente necesario.</span></b>
			<b><span lang=ES-MX style='font-size:9.5pt;font-family:"Century Gothic",sans-serif;color:#0070C0;mso-fareast-language:EN-GB'><o:p></o:p></span></b>
		</p>
		<p class=MsoNormal>
			<span lang=ES-MX><o:p>&nbsp;</o:p></span>
		</p>
	</div>
</body></html>