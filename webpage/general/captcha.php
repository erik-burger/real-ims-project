<html> 
<style>
    input[type=text] {
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc; 
    box-sizing: border-box;
}
.captcha{
  background-color: #669999;
    border: none;
    color: white;
    padding: 12px 30px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
canvas{
  /*prevent interaction with the canvas*/
  pointer-events:none;
}
</style>

<body onload="createCaptcha()">
    <form action = "" onSubmit="return validateCaptcha();" method = "post">
      <div id="captcha">
      </div>
      <input type="text" placeholder="Captcha" id="cpatchaTextBox", name = "cpatchaTextBox"/>
      <button type="submit" name = "submit" class = "captcha">Submit</button>
      <button type="button" class = "captcha" onclick = "createCaptcha()">New Captcha</button>
    </form>
</body>

<script>
    var code;
function createCaptcha() {
  //clear the contents of captcha div first 
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
  var lengthOtp = 6;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    //below code will not allow Repetition of Characters
    var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  ctx.beginPath();
  ctx.moveTo(0, 0);
  //Draw background lines 
  for (let step = 0; step < 5; step++){
    ctx.lineTo(Math.random()*100, Math.random()*50);
    ctx.moveTo(Math.random()*100, Math.random()*50);
  }
  ctx.stroke();
  //storing captcha so that can validate you can save it somewhere else according to your specific requirements
  code = captcha.join("");
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}

function validateCaptcha() {
  if (document.getElementById("cpatchaTextBox").value == code) {   
    return true; 
  }else{    
    return false; 
  }
}
</script>
</html>

<?php
if(isset($_POST["submit"])){
    echo "hej!"; 
    echo $_POST["cpatchaTextBox"]; 
}
?>