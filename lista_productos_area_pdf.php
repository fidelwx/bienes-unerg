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
	
	$options = new Options();
	$options->set('defaultFont', 'Courier');

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();

	$dompdf->load_html( file_get_contents( $index.'pdf/productos_area_pdf.php' ) );
	$dompdf->setPaper('A4', 'portrait');
	
	$dompdf->render();
	$dia_hora = date('d-m-Y');
	$dompdf->stream("lista_bienes_area_unerg_".$dia_hora);

 ?>