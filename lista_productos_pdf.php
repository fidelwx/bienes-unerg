<?php 
	require 'vendor/autoload.php';
	require 'config/constante.php';

	// ob_start();
	// reference the Dompdf namespace
	use Dompdf\Dompdf;
	use Dompdf\Options;
	
	$options = new Options();
	$options->set('defaultFont', 'Courier');

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();

	$dompdf->load_html( file_get_contents( $index.'pdf/productos_pdf.php' ) );
	$dompdf->setPaper('A4', 'portrait');
	
	$dompdf->render();
	$dompdf->stream("lista_producto_bienes_unerg.pdf");
	// $dompdf->stream(
	//   'lista_producto_bienes_unerg.pdf',
	//   array(
	//     'Attachment' => 0
	//   )
	// );















 ?>