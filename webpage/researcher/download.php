<?php
$filename1 = 'trackzheimers_test_data.csv';
$export_data1 = unserialize($_POST['export_data1']);
$export_data2 = unserialize($_POST['export_data2']);

$file1 = fopen($filename1,"w");

foreach ($export_data1 as $line){
 fputcsv($file1,$line);
}
fputcsv($file1,array("*****************"));
foreach ($export_data2 as $line){
    fputcsv($file1,$line);
   }

fclose($file1);


header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename1);
header("Content-Type: application/csv; "); 

readfile($filename1);

unlink($filename1);

exit();