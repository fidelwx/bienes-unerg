<?php
	/*-------------------------
	Autor: Direccion de informatica Unerg 2018
	Jhonny Perez;
	Fidel Herrera;
	---------------------------*/ 
	require 'vendor/autoload.php';
	require 'config/constante.php';
	use Dompdf\Dompdf;
	use Dompdf\Options;
	extract($_GET);
	
	$options = new Options();
	$options->set('defaultFont', 'Courier');

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();

	$dompdf->load_html( file_get_contents( $index.'pdf/producto_pdf.php?id='.$id ) );
	$dompdf->setPaper('A4', 'portrait');
	
	$dompdf->render();
	$dia_hora = date('d-m-Y');
	$dompdf->stream("producto_historial_unerg_".$dia_hora);

 ?>