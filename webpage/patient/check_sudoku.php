<?php

$field11 = $_POST["11"]; 
$field12 = $_POST["12"]; 
$field13 = $_POST["13"]; 
$field14 = $_POST["14"]; 
$field15 = $_POST["15"]; 
$field16 = $_POST["16"]; 
$field17 = $_POST["17"]; 
$field18 = $_POST["18"]; 
$field19 = $_POST["19"]; 

$field21 = $_POST["21"]; 
$field22 = $_POST["22"]; 
$field23 = $_POST["23"]; 
$field24 = $_POST["24"]; 
$field25 = $_POST["25"]; 
$field26 = $_POST["26"]; 
$field27 = $_POST["27"]; 
$field28 = $_POST["28"]; 
$field29 = $_POST["29"]; 

$field31 = $_POST["31"]; 
$field32 = $_POST["32"]; 
$field33 = $_POST["33"]; 
$field34 = $_POST["34"]; 
$field35 = $_POST["35"]; 
$field36 = $_POST["36"]; 
$field37 = $_POST["37"]; 
$field38 = $_POST["38"]; 
$field39 = $_POST["39"];

$field41 = $_POST["41"]; 
$field42 = $_POST["42"]; 
$field43 = $_POST["43"]; 
$field44 = $_POST["44"]; 
$field45 = $_POST["45"]; 
$field46 = $_POST["46"]; 
$field47 = $_POST["47"]; 
$field48 = $_POST["48"]; 
$field49 = $_POST["49"]; 

$field51 = $_POST["51"]; 
$field52 = $_POST["52"]; 
$field53 = $_POST["53"]; 
$field54 = $_POST["54"]; 
$field55 = $_POST["55"]; 
$field56 = $_POST["56"]; 
$field57 = $_POST["57"]; 
$field58 = $_POST["58"]; 
$field59 = $_POST["59"]; 

$field61 = $_POST["61"]; 
$field62 = $_POST["62"]; 
$field63 = $_POST["63"]; 
$field64 = $_POST["64"]; 
$field65 = $_POST["65"]; 
$field66 = $_POST["66"]; 
$field67 = $_POST["67"]; 
$field68 = $_POST["68"]; 
$field69 = $_POST["69"]; 

$field71 = $_POST["71"]; 
$field72 = $_POST["72"]; 
$field73 = $_POST["73"]; 
$field74 = $_POST["74"]; 
$field75 = $_POST["75"]; 
$field76 = $_POST["76"]; 
$field77 = $_POST["77"]; 
$field78 = $_POST["78"]; 
$field79 = $_POST["79"]; 

$field81 = $_POST["81"]; 
$field82 = $_POST["82"]; 
$field83 = $_POST["83"]; 
$field84 = $_POST["84"]; 
$field85 = $_POST["85"]; 
$field86 = $_POST["86"]; 
$field87 = $_POST["87"]; 
$field88 = $_POST["88"]; 
$field89 = $_POST["89"]; 

$field91 = $_POST["91"]; 
$field92 = $_POST["92"]; 
$field93 = $_POST["93"]; 
$field94 = $_POST["94"]; 
$field95 = $_POST["95"]; 
$field96 = $_POST["96"]; 
$field97 = $_POST["97"]; 
$field98 = $_POST["98"]; 
$field99 = $_POST["99"]; 

$fields = array(
            array($field11, $field12, $field13, $field14, $field15, $field16, $field17, $field18, $field19),
            array($field21, $field22, $field23, $field24, $field25, $field26, $field27, $field28, $field29),
            array($field31, $field32, $field33, $field34, $field35, $field36, $field37, $field38, $field39),
            array($field41, $field42, $field43, $field44, $field45, $field46, $field47, $field48, $field49),
            array($field51, $field52, $field53, $field54, $field55, $field56, $field57, $field58, $field59),
            array($field61, $field62, $field63, $field64, $field65, $field66, $field67, $field68, $field69),
            array($field71, $field72, $field73, $field74, $field75, $field76, $field77, $field78, $field79),
            array($field81, $field82, $field83, $field84, $field85, $field86, $field87, $field88, $field89),
            array($field91, $field92, $field93, $field94, $field95, $field96, $field97, $field98, $field99));

$error = 0;

$column1 = 0;
$column2 = 0;
$column3 = 0;
$column4 = 0;
$column5 = 0;
$column6 = 0;
$column7 = 0;
$column8 = 0;
$column9 = 0;

$rowerror = 0;

for($row = 0; $row < 9; $row++){

    $rowsum = array_sum($fields[$row]);
    $column0 = $column9 + $fields[$row][0];
    $column1 = $column1 + $fields[$row][1];
    $column2 = $column2 + $fields[$row][2];
    $column3 = $column3 + $fields[$row][3];
    $column4 = $column4 + $fields[$row][4];
    $column5 = $column5 + $fields[$row][5];
    $column6 = $column6 + $fields[$row][6];
    $column7 = $column7 + $fields[$row][7];
    $column8 = $column8 + $fields[$row][8];
    
    if($rowsum != 0)
        $rowerror = $rowerror +1;}


if($column0 != 9 || $column1 != 9 || $column2 != 9 || $column3 != 9 || $column4 != 9 || $column5 != 9 || 
    $column6 != 9 || $column7 != 9 || $column7 != 9 || $column8 != 9 || $column9 != 9 || $rowerror != 0){
echo "Not correct, try again";

}else{
echo "Good Job!";
}




    //if($rowsum != 45){
     //   $error = $rowerror + 1;
//}


echo "what $rowsum, and $column8";


/*
for ($row = 0; $row < 4; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
      echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
  }
echo "what $row1";
*/
?>