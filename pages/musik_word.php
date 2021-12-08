<?php
if (defined("ALLOWED") === false) {
	die("Anda tidak boleh membuka halaman ini secara langsung!");
}


require 'vendor/autoload.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$id_musik = $_GET['id_musik'];
$sql = "select * from musik where id_musik=".$id_musik;

$result = mysqli_query($koneksi,$sql);
$row = mysqli_fetch_assoc($result);

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./template.docx');
$templateProcessor->setValue('judul_musik', $row['judul_musik']);
$templateProcessor->setValue('tahun', $row['tahun']);
$templateProcessor->setValue('artist', $row['artist']);

$templateProcessor->saveAs('musik.docx');
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $objWriter->save('movie.docx');
redirect('?page=musik_list');