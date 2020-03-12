<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="top_menu_style.css">
    <link rel="stylesheet" href="../general/IMS_Style.css">
  
<style>
        ul{
              list-style-type: none;
              margin: 0;
              padding: 0;
        }
        .sudoku {
          height:30px; 
          width:30px;}

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;}

        /* Firefox */
        input[type=number] {
        -moz-appearance:textfield;}

        button[type = "Submit"]{
    		background-color: #c2d6d6;
  			color: black;
  			padding: 12px 20px;
 		  	border: none;
  			border-radius: 4px;
  			cursor: pointer;
  			float: right;
  		}
  		
  		button[type = "Submit"] {
  			background-color: #b3cccc;
		}
        .center{margin: auto;
          text-align: center;}

          .logo {
                display: inline-block;
                float: left; 
            }
            .page{
                    margin-left: auto; 
                    margin-right: auto; 
                    padding: 10px;
                    width: 80%; 
                    margin-bottom: 50px;   
                }

          </style>
    </head>
<body>
<div class="navbar">
	<div class="navbar-header">
    	<img class="logo" src="../general/logo_small.png" width = 50>
	</div>  
	<ul class="nav navbar-nav">
    <li class="active"><a href="../general/start_page.php">Home</a></li>            
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="../general/logout.php">Logout</a></li>
  </ul>
</div>
</br>
</br>

<div class = "page">
<h1 align = "center">Sudoku</h1>
</div>

<?php //Sudoku template
$sudoku = array(
  array(0, 0, 7, 0, 0, 4, 0, 2, 0),
  array(0, 0, 4, 0, 0, 1, 0, 0, 0),
  array(0, 0, 0, 0, 0, 6, 8, 0, 4),
  array(9, 0, 8, 6, 0, 5, 0, 1, 0),
  array(5, 6, 0, 0, 0, 0, 7, 0, 0),
  array(0, 0, 2, 7, 0, 3, 6, 9, 5),
  array(7, 8, 0, 0, 6, 2, 1, 0, 0),
  array(0, 0, 9, 1, 3, 8, 0, 0, 0),
  array(1, 3, 0, 0, 0, 7, 4, 0, 2));
?>
<div style="margin:0 auto;width:29%;text-align:center">
  <form action="check_sudoku.php" method="POST">
      
    <input type="number" name="11" required class="sudoku" value = <?php if($sudoku[0][0] != 0){echo $sudoku[0][0]; echo " readonly";} ?>>
    <input type="number" name="12" required class="sudoku" value = <?php if($sudoku[0][1] != 0){echo $sudoku[0][1]; echo " readonly";} ?>>
    <input type="number" name="13" required class="sudoku" value = <?php if($sudoku[0][2] != 0){echo $sudoku[0][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="14" required class="sudoku" value = <?php if($sudoku[0][3] != 0){echo $sudoku[0][3]; echo " readonly";} ?>>
    <input type="number" name="15" required class="sudoku" value = <?php if($sudoku[0][4] != 0){echo $sudoku[0][4]; echo " readonly";} ?>> 
    <input type="number" name="16" required class="sudoku" value = <?php if($sudoku[0][5] != 0){echo $sudoku[0][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="17" required class="sudoku" value = <?php if($sudoku[0][6] != 0){echo $sudoku[0][6]; echo " readonly";} ?>> 
    <input type="number" name="18" required class="sudoku" value = <?php if($sudoku[0][7] != 0){echo $sudoku[0][7]; echo " readonly";} ?>> 
    <input type="number" name="19" required class="sudoku" value = <?php if($sudoku[0][8] != 0){echo $sudoku[0][8]; echo " readonly";} ?>><br>
   
    <input type="number" name="21" required class="sudoku" value = <?php if($sudoku[1][0] != 0){echo $sudoku[1][0]; echo " readonly";} ?>> 
    <input type="number" name="22" required class="sudoku" value = <?php if($sudoku[1][1] != 0){echo $sudoku[1][1]; echo " readonly";} ?>>
    <input type="number" name="23" required class="sudoku" value = <?php if($sudoku[1][2] != 0){echo $sudoku[1][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="24" required class="sudoku" value = <?php if($sudoku[1][3] != 0){echo $sudoku[1][3]; echo " readonly";} ?>> 
    <input type="number" name="25" required class="sudoku" value = <?php if($sudoku[1][4] != 0){echo $sudoku[1][4]; echo " readonly";} ?>>
    <input type="number" name="26" required class="sudoku" value = <?php if($sudoku[1][5] != 0){echo $sudoku[1][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="27" required class="sudoku" value = <?php if($sudoku[1][6] != 0){echo $sudoku[1][6]; echo " readonly";} ?>>
    <input type="number" name="28" required class="sudoku" value = <?php if($sudoku[1][7] != 0){echo $sudoku[1][7]; echo " readonly";} ?>>
    <input type="number" name="29" required class="sudoku" value = <?php if($sudoku[1][8] != 0){echo $sudoku[1][8]; echo " readonly";} ?>><br>

    <input type="number" name="31" required class="sudoku" value = <?php if($sudoku[2][0] != 0){echo $sudoku[2][0]; echo " readonly";} ?>>
    <input type="number" name="32" required class="sudoku" value = <?php if($sudoku[2][1] != 0){echo $sudoku[2][1]; echo " readonly";} ?>> 
    <input type="number" name="33" required class="sudoku" value = <?php if($sudoku[2][2] != 0){echo $sudoku[2][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="34" required class="sudoku" value = <?php if($sudoku[2][3] != 0){echo $sudoku[2][3]; echo " readonly";} ?>>
    <input type="number" name="35" required class="sudoku" value = <?php if($sudoku[2][4] != 0){echo $sudoku[2][4]; echo " readonly";} ?>>
    <input type="number" name="36" required class="sudoku" value = <?php if($sudoku[2][5] != 0){echo $sudoku[2][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="37" required class="sudoku" value = <?php if($sudoku[2][6] != 0){echo $sudoku[2][6]; echo " readonly";} ?>>
    <input type="number" name="38" required class="sudoku" value = <?php if($sudoku[2][7] != 0){echo $sudoku[2][7]; echo " readonly";} ?>> 
    <input type="number" name="39" required class="sudoku" value = <?php if($sudoku[2][8] != 0){echo $sudoku[2][8]; echo " readonly";} ?>><br><br>

    <input type="number" name="41" required class="sudoku" value = <?php if($sudoku[3][0] != 0){echo $sudoku[3][0]; echo " readonly";} ?>> 
    <input type="number" name="42" required class="sudoku" value = <?php if($sudoku[3][1] != 0){echo $sudoku[3][1]; echo " readonly";} ?>>
    <input type="number" name="43" required class="sudoku" value = <?php if($sudoku[3][2] != 0){echo $sudoku[3][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="44" required class="sudoku" value = <?php if($sudoku[3][3] != 0){echo $sudoku[3][3]; echo " readonly";} ?>>
    <input type="number" name="45" required class="sudoku" value = <?php if($sudoku[3][4] != 0){echo $sudoku[3][4]; echo " readonly";} ?>> 
    <input type="number" name="46" required class="sudoku" value = <?php if($sudoku[3][5] != 0){echo $sudoku[3][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="47" required class="sudoku" value = <?php if($sudoku[3][6] != 0){echo $sudoku[3][6]; echo " readonly";} ?>>
    <input type="number" name="48" required class="sudoku" value = <?php if($sudoku[3][7] != 0){echo $sudoku[3][7]; echo " readonly";} ?>>
    <input type="number" name="49" required class="sudoku" value = <?php if($sudoku[3][8] != 0){echo $sudoku[3][8]; echo " readonly";} ?>> <br>

    <input type="number" name="51" required class="sudoku" value = <?php if($sudoku[4][0] != 0){echo $sudoku[4][0]; echo " readonly";} ?>> 
    <input type="number" name="52" required class="sudoku" value = <?php if($sudoku[4][1] != 0){echo $sudoku[4][1]; echo " readonly";} ?>>
    <input type="number" name="53" required class="sudoku" value = <?php if($sudoku[4][2] != 0){echo $sudoku[4][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="54" required class="sudoku" value = <?php if($sudoku[4][3] != 0){echo $sudoku[4][3]; echo " readonly";} ?>> 
    <input type="number" name="55" required class="sudoku" value = <?php if($sudoku[4][4] != 0){echo $sudoku[4][4]; echo " readonly";} ?>>
    <input type="number" name="56" required class="sudoku" value = <?php if($sudoku[4][5] != 0){echo $sudoku[4][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="57" required class="sudoku" value = <?php if($sudoku[4][6] != 0){echo $sudoku[4][6]; echo " readonly";} ?>>
    <input type="number" name="58" required class="sudoku" value = <?php if($sudoku[4][7] != 0){echo $sudoku[4][7]; echo " readonly";} ?>>
    <input type="number" name="59" required class="sudoku" value = <?php if($sudoku[4][8] != 0){echo $sudoku[4][8]; echo " readonly";} ?>> <br>

    <input type="number" name="61" required class="sudoku" value = <?php if($sudoku[5][0] != 0){echo $sudoku[5][0]; echo " readonly";} ?>> 
    <input type="number" name="62" required class="sudoku" value = <?php if($sudoku[5][1] != 0){echo $sudoku[5][1]; echo " readonly";} ?>>
    <input type="number" name="63" required class="sudoku" value = <?php if($sudoku[5][2] != 0){echo $sudoku[5][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="64" required class="sudoku" value = <?php if($sudoku[5][3] != 0){echo $sudoku[5][3]; echo " readonly";} ?>>
    <input type="number" name="65" required class="sudoku" value = <?php if($sudoku[5][4] != 0){echo $sudoku[5][4]; echo " readonly";} ?>> 
    <input type="number" name="66" required class="sudoku" value = <?php if($sudoku[5][5] != 0){echo $sudoku[5][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="67" required class="sudoku" value = <?php if($sudoku[5][6] != 0){echo $sudoku[5][6]; echo " readonly";} ?>>
    <input type="number" name="68" required class="sudoku" value = <?php if($sudoku[5][7] != 0){echo $sudoku[5][7]; echo " readonly";} ?>>
    <input type="number" name="69" required class="sudoku" value = <?php if($sudoku[5][8] != 0){echo $sudoku[5][8]; echo " readonly";} ?>><br><br>

    <input type="number" name="71" required class="sudoku" value = <?php if($sudoku[6][0] != 0){echo $sudoku[6][0]; echo " readonly";} ?>>
    <input type="number" name="72" required class="sudoku" value = <?php if($sudoku[6][1] != 0){echo $sudoku[6][1]; echo " readonly";} ?>> 
    <input type="number" name="73" required class="sudoku" value = <?php if($sudoku[6][2] != 0){echo $sudoku[6][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="74" required class="sudoku" value = <?php if($sudoku[6][3] != 0){echo $sudoku[6][3]; echo " readonly";} ?>>
    <input type="number" name="75" required class="sudoku" value = <?php if($sudoku[6][4] != 0){echo $sudoku[6][4]; echo " readonly";} ?>>
    <input type="number" name="76" required class="sudoku" value = <?php if($sudoku[6][5] != 0){echo $sudoku[6][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="77" required class="sudoku" value = <?php if($sudoku[6][6] != 0){echo $sudoku[6][6]; echo " readonly";} ?>> 
    <input type="number" name="78" required class="sudoku" value = <?php if($sudoku[6][7] != 0){echo $sudoku[6][7]; echo " readonly";} ?>> 
    <input type="number" name="79" required class="sudoku" value = <?php if($sudoku[6][8] != 0){echo $sudoku[6][8]; echo " readonly";} ?>><br>

    <input type="number" name="81" required class="sudoku" value = <?php if($sudoku[7][0] != 0){echo $sudoku[7][0]; echo " readonly";} ?>>
    <input type="number" name="82" required class="sudoku" value = <?php if($sudoku[7][1] != 0){echo $sudoku[7][1]; echo " readonly";} ?>>
    <input type="number" name="83" required class="sudoku" value = <?php if($sudoku[7][2] != 0){echo $sudoku[7][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="84" required class="sudoku" value = <?php if($sudoku[7][3] != 0){echo $sudoku[7][3]; echo " readonly";} ?>> 
    <input type="number" name="85" required class="sudoku" value = <?php if($sudoku[7][4] != 0){echo $sudoku[7][4]; echo " readonly";} ?>> 
    <input type="number" name="86" required class="sudoku" value = <?php if($sudoku[7][5] != 0){echo $sudoku[7][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="87" required class="sudoku" value = <?php if($sudoku[7][6] != 0){echo $sudoku[7][6]; echo " readonly";} ?>>
    <input type="number" name="88" required class="sudoku" value = <?php if($sudoku[7][7] != 0){echo $sudoku[7][7]; echo " readonly";} ?>>
    <input type="number" name="89" required class="sudoku" value = <?php if($sudoku[7][8] != 0){echo $sudoku[7][8]; echo " readonly";} ?>><br>

    <input type="number" name="91" required class="sudoku" value = <?php if($sudoku[8][0] != 0){echo $sudoku[8][0]; echo " readonly";} ?>>
    <input type="number" name="92" required class="sudoku" value = <?php if($sudoku[8][1] != 0){echo $sudoku[8][1]; echo " readonly";} ?>>
    <input type="number" name="93" required class="sudoku" value = <?php if($sudoku[8][2] != 0){echo $sudoku[8][2]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="94" required class="sudoku" value = <?php if($sudoku[8][3] != 0){echo $sudoku[8][3]; echo " readonly";} ?>>
    <input type="number" name="95" required class="sudoku" value = <?php if($sudoku[8][4] != 0){echo $sudoku[8][4]; echo " readonly";} ?>> 
    <input type="number" name="96" required class="sudoku" value = <?php if($sudoku[8][5] != 0){echo $sudoku[8][5]; echo " readonly";} ?>><span style="display:inline-block; width:10px;"></span>
    <input type="number" name="97" class="sudoku" required value = <?php if($sudoku[8][6] != 0){echo $sudoku[8][6]; echo " readonly";} ?>>
    <input type="number" class="sudoku" name="98" required value = <?php if($sudoku[8][7] != 0){echo $sudoku[8][7]; echo " readonly";} ?>> 
    <input class="sudoku" type="number" name="99" required value = <?php if($sudoku[8][8] != 0){echo $sudoku[8][8]; echo " readonly";} ?>><br><br>
    
    <button type="Submit">Submit</button>

</form>
</div>


  </body>
</html>