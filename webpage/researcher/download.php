<?php
$filename = 'trackzheimers_data.csv';
$export_data = unserialize($_POST['export_data']);

$file1 = fopen($filename,"w");

foreach ($export_data as $line){
 fputcsv($file1,$line);
}

fclose($file1);

header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; ");

readfile($filename);

unlink($filename);

exit();