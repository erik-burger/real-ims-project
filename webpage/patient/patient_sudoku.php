<!DOCTYPE html>
<html>
  <body>

  <style>
          .sudoku {
        height:30px; 
        width:30px; 
          }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance:textfield;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>

  <form action="check_sudoku.php" method="POST">
      
    <input type="number" name="11" class="sudoku" value = 5 readonly>
    <input type="number" name="12" class="sudoku" value = 3 readonly>
    <input type="number" name="13" required class="sudoku">
    <input type="number" name="14" required class="sudoku">
    <input type="number" name="15" required class="sudoku" value = 7 readonly>
    <input type="number" name="16" required class="sudoku">
    <input type="number" name="17" required class="sudoku">
    <input type="number" name="18" required class="sudoku">
    <input type="number" name="19" required class="sudoku"><br><br>
   
    <input type="number" name="21" required class="sudoku" value = 6 readonly>
    <input type="number" name="22" required class="sudoku">
    <input type="number" name="23" required class="sudoku">
    <input type="number" name="24" required class="sudoku" value = 1 readonly>
    <input type="number" name="25" required class="sudoku" value = 9 readonly>
    <input type="number" name="26" required class="sudoku" value = 5 readonly>
    <input type="number" name="27" required class="sudoku">
    <input type="number" name="28" required class="sudoku">
    <input type="number" name="29" required class="sudoku"><br><br> 

    <input type="number" name="31" required class="sudoku">
    <input type="number" name="32" required class="sudoku" value = 9 readonly>
    <input type="number" name="33" required class="sudoku" value = 8 readonly>
    <input type="number" name="34" required class="sudoku">
    <input type="number" name="35" required class="sudoku">
    <input type="number" name="36" required class="sudoku">
    <input type="number" name="37" required class="sudoku">
    <input type="number" name="38" required class="sudoku" value = 6 readonly>
    <input type="number" name="39" required class="sudoku"><br><br>

    <input type="number" name="41" required class="sudoku" value = 8 readonly>
    <input type="number" name="42" required class="sudoku">
    <input type="number" name="43" required class="sudoku">
    <input type="number" name="44" required class="sudoku">
    <input type="number" name="45" required class="sudoku" value = 6 readonly>
    <input type="number" name="46" required class="sudoku">
    <input type="number" name="47" required class="sudoku">
    <input type="number" name="48" required class="sudoku">
    <input type="number" name="49" required class="sudoku" value = 3 readonly><br><br> 

    <input type="number" name="51" required class="sudoku" value = 4 readonly>
    <input type="number" name="52" required class="sudoku">
    <input type="number" name="53" required class="sudoku">
    <input type="number" name="54" required class="sudoku" value = 8 readonly>
    <input type="number" name="55" required class="sudoku">
    <input type="number" name="56" required class="sudoku" value = 3 readonly>
    <input type="number" name="57" required class="sudoku">
    <input type="number" name="58" required class="sudoku">
    <input type="number" name="59" required class="sudoku" value = 1 readonly><br><br>

    <input type="number" name="61" required class="sudoku" value = 7 readonly>
    <input type="number" name="62" required class="sudoku">
    <input type="number" name="63" required class="sudoku">
    <input type="number" name="64" required class="sudoku">
    <input type="number" name="65" required class="sudoku" value = 2 readonly>
    <input type="number" name="66" required class="sudoku">
    <input type="number" name="67" required class="sudoku">
    <input type="number" name="68" required class="sudoku">
    <input type="number" name="69" required class="sudoku" value = 6 readonly><br><br>

    <input type="number" name="71" required class="sudoku">
    <input type="number" name="72" required class="sudoku" value = 5 readonly>
    <input type="number" name="73" required class="sudoku"><nbsp><nbsp><nbsp><nbsp><nbsp><nbsp>
    <input type="number" name="74" required class="sudoku">
    <input type="number" name="75" required class="sudoku">
    <input type="number" name="76" required class="sudoku">
    <input type="number" name="77" required class="sudoku" value = 2 readonly>
    <input type="number" name="78" required class="sudoku" value = 8 readonly>
    <input type="number" name="79" required class="sudoku"><br><br> 

    <input type="number" name="81" required class="sudoku">
    <input type="number" name="82" required class="sudoku">
    <input type="number" name="83" required class="sudoku">
    <input type="number" name="84" required class="sudoku" value = 4 readonly>
    <input type="number" name="85" required class="sudoku" value = 1 readonly>
    <input type="number" name="86" required class="sudoku" value = 9 readonly>
    <input type="number" name="87" required class="sudoku">
    <input type="number" name="88" required class="sudoku">
    <input type="number" name="89" required class="sudoku" value = 5 readonly><br><br>

    <input type="number" name="91" required class="sudoku">
    <input type="number" name="92" required class="sudoku">
    <input type="number" name="93" required class="sudoku">
    <input type="number" name="94" required class="sudoku">
    <input type="number" name="95" required class="sudoku" value = 8 readonly>
    <input type="number" name="96" required class="sudoku">
    <input type="number" name="97" class="sudoku" required>
    <input type="number" class="sudoku" name="98" required value = 7 readonly>
    <input class="sudoku" type="number" name="99" required value = 9 readonly><br><br>
    
    

    
    
    <button type="submit">Submit</button>

</form>
    <?php





    ?>
  </body>
</html>