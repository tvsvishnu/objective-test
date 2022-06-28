<?php
require_once 'database.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$start_time=$_SESSION['start_time'];
$subject = $_SESSION['subject'];

if($_SESSION['test']==""){
    echo "<script> location.replace('https://tvsvishnu.000webhostapp.com/objective-test/taketest.php');</script>";
    die();
}
$test = $_SESSION['test'];
if(isset($_POST['save'])) {
    $test = $_SESSION['test'];
$subject = $_SESSION['subject'];
$q1 = $_POST['1'];
$q2 = $_POST['2'];
$q3 = $_POST['3'];
$q4 = $_POST['4'];
$q5 = $_POST['5'];
$q6 = $_POST['6'];
$q7 = $_POST['7'];
$q8 = $_POST['8'];
$q9 = $_POST['9'];
$q10 = $_POST['10'];
$q11 = $_POST['11'];
$q12 = $_POST['12'];
$q13 = $_POST['13'];
$q14 = $_POST['14'];
$q15 = $_POST['15'];
$q16 = $_POST['16'];
$q17 = $_POST['17'];
$q18 = $_POST['18'];
$q19 = $_POST['19'];
$q20 = $_POST['20'];
$q21 = $_POST['21'];
$q22 = $_POST['22'];
$q23 = $_POST['23'];
$q24 = $_POST['24'];
$q25 = $_POST['25'];
$q26 = $_POST['26'];
$q27 = $_POST['27'];
$q28 = $_POST['28'];
$q29 = $_POST['29'];
$q30 = $_POST['30'];
$sqll = "DELETE FROM save_responses where test='$test' and subject='$subject'";
mysqli_query($conn,$sqll);
$sql = "INSERT INTO save_responses (test,subject,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30) values ('$test','$subject','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$q20','$q21','$q22','$q23','$q24','$q25','$q26','$q27','$q28','$q29','$q30')";
if(mysqli_query($conn,$sql)) {
    echo "<script>alert('Responses Saved.');</script>";}
    
}
if(isset($_POST['submit'])) {
$test = $_SESSION['test'];

date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$t = date('d-m-Y g:i A');
$q1 = $_POST['1'];
$q2 = $_POST['2'];
$q3 = $_POST['3'];
$q4 = $_POST['4'];
$q5 = $_POST['5'];
$q6 = $_POST['6'];
$q7 = $_POST['7'];
$q8 = $_POST['8'];
$q9 = $_POST['9'];
$q10 = $_POST['10'];
$q11 = $_POST['11'];
$q12 = $_POST['12'];
$q13 = $_POST['13'];
$q14 = $_POST['14'];
$q15 = $_POST['15'];
$q16 = $_POST['16'];
$q17 = $_POST['17'];
$q18 = $_POST['18'];
$q19 = $_POST['19'];
$q20 = $_POST['20'];
$q21 = $_POST['21'];
$q22 = $_POST['22'];
$q23 = $_POST['23'];
$q24 = $_POST['24'];
$q25 = $_POST['25'];
$q26 = $_POST['26'];
$q27 = $_POST['27'];
$q28 = $_POST['28'];
$q29 = $_POST['29'];
$q30 = $_POST['30'];
$z = 1;
$y = $_SESSION['start_no'];
$att = 0;
$x=1;
while($x<=30){
    if($_POST[$x]!=""){
        $att++;
    }
    $x++;
}

 $msg = "<b><big><u>JEE Advanced 2021</big></u></b><br></br><br></br><b>Test : </b> $test <br></br><br></br><b> Start Time :</b>$start_time<br></br><br></br> <b> Submitted Time :</b> $t<br></br><br></br> <b> Attempted :</b> $att<br></br><br></br>";
 $msg = $msg. "<table border='1'>";
$msg = $msg. "<th> Question </th>";
$msg = $msg. "<th> Response </th>";
$z = 1;

 while($z<=30){
          $msg = $msg. "<tr>";

    $msg = $msg. "<td><b><center>$y </b></td><td></center><center>". $_POST[$z]."</center></td>";
     $z++;
     $y++;
      $msg = $msg. "</tr>";

 }
  $msg = $msg . "</table>";
  
   $msg = "<b><big><u>JEE Advanced 2021</big></u></b><br></br><br></br><b>Test : </b> $test <br></br><br></br> <b>Subject : </b> $subject <br></br><br></br><b> Start Time :</b> $start_time<br></br><br></br><b> Submitted Time :</b> $t<br></br><br></br> <b> Attempted :</b> $att<br></br><br></br>";
 $msg = $msg. "<table border='1'>";
 
$msg = $msg. "<th> Ques </th>";
$msg = $msg. "<th> Resp </th>";
$msg = $msg. "<th> Ques </th>";
$msg = $msg. "<th> Resp </th>";
$msg = $msg. "<th> Ques</th>";
$msg = $msg. "<th> Resp </th>";
$msg = $msg. "<th> Ques </th>";
$msg = $msg. "<th> Resp </th>";
$msg = $msg. "<th> Ques </th>";
$msg = $msg. "<th> Resp </th>";
$x = 1;
$p = $_SESSION['start_no'];
 while($x<=30){
          $msg = $msg. "<tr>";
    $msg = $msg. "<td><b><center>$p </b></td><td></center><center>". $_POST[$x]."</center></td>";

     $x++;
     $p++;
         $msg = $msg. "<td><b><center>$p </b></td><td></center><center>". $_POST[$x]."</center></td>";
 $x++;
     $p++;
         $msg = $msg. "<td><b><center>$p </b></td><td></center><center>". $_POST[$x]."</center></td>";
 $x++;
     $p++;
         $msg = $msg. "<td><b><center>$p </b></td><td></center><center>". $_POST[$x]."</center></td>";
 $x++;
     $p++;
         $msg = $msg. "<td><b><center>$p </b></td><td></center><center>". $_POST[$x]."</center></td>";
$x++;
     $p++;
      $msg = $msg. "</tr>";

 }
  $msg = $msg . "</table>";
  $sqllll = "SELECT * FROM revision where test = '$test' and subject='$subject'";
$resss = mysqli_query($conn,$sqllll);


while ($row = mysqli_fetch_assoc($resss)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
    if($field=="key_link"){
        
        $msg = $msg."<b>Key : </b><br></br> <img src='https://tvsvishnu.000webhostapp.com/objective-test$value'></img>";
       }
       // I just did not use "htmlspecialchars()" function. 
    }
}  $mail = new PHPMailer(true);                              

try {
    $mail->IsHTML(true);

    $mail->isSMTP(); // using SMTP protocol                                     
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
    $mail->SMTPAuth = true;  // enable smtp authentication                             
    $mail->Username = 'tvsvishnu2002@gmail.com';  // sender gmail host              
    $mail->Password = 'TVSVishnu@23771'; // sender gmail host password                          
    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
    $mail->Port = 587;   // port for SMTP     

    $mail->setFrom('tvsvishnu2002@gmail.com', "T V S Vishnu Vardhan"); // sender's email and name
    $mail->addAddress('tvsvishnu2002@gmail.com', "JEE Advanced 2021");  // receiver's email and name
$mail->AddCC('tvsvishnu2002@gmail.com', "T V S Vishnu Vardhan");

    $mail->Subject = "$test Responses";
    
    $mail->Body = '<span style="font-family:Roboto, sans-serif; font-size:14px">'.$msg.'</span>';

    $mail->send();
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

if($test==""){
    die();
}
$start_no = $_SESSION['start_no'];
$sql = "INSERT INTO responses (test,subject,start_time,time,start_no,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30) values ('$test','$subject','$start_time','$t','$start_no','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$q20','$q21','$q22','$q23','$q24','$q25','$q26','$q27','$q28','$q29','$q30')";
if(mysqli_query($conn,$sql)) {
   $sqll = "UPDATE revision set submitted = '1' where test='$test' and subject='$subject'";
mysqli_query($conn,$sqll);

$sqllii = "DELETE FROM save_responses where test='$test' and subject='$subject'";
mysqli_query($conn,$sqllii);
//$sqlltt = "UPDATE revision set visible = '0' where test='$test' and subject='$subject'";
//mysqli_query($conn,$sqlltt);
$sqlll = "SELECT * FROM revision where test = '$test' and subject='$subject'";
$ress = mysqli_query($conn,$sqlll);
$msg = "<b><big><u>JEE Advanced 2021</big></u></b><br></br><br></br><b>Test : </b> $test <br></br><br></br><b>Subject : </b> $subject <br></br><br></br> <b> Start Time :</b> $start_time<br></br><br></br> <b> Submitted Time :</b> $t<br></br><br></br>";

while ($row = mysqli_fetch_assoc($ress)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
    if($field=="key_link"){
        $msg = $msg."<b>Key : </b><a href = 'https://tvsvishnu.000webhostapp.com/objective-test$value'>Click Here</a><br></br><br></br>";
        $msg = $msg."<b>Key : </b> <img src='https://tvsvishnu.000webhostapp.com/objective-test$value'></img>";
       }
        if($field=="sol"){
            
        $msg = $msg."<b>Solutions : </b><a href = 'https://tvsvishnu.000webhostapp.com/objective-test$value'>Click Here</a>";
        
       }
       // I just did not use "htmlspecialchars()" function. 
    }
}
  $mail = new PHPMailer(true);                              
try {
    $mail->IsHTML(true);

    $mail->isSMTP(); // using SMTP protocol                                     
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
    $mail->SMTPAuth = true;  // enable smtp authentication                             
    $mail->Username = 'tvsvishnu2002@gmail.com';  // sender gmail host              
    $mail->Password = '9652353102'; // sender gmail host password                          
    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
    $mail->Port = 587;   // port for SMTP     

    $mail->setFrom('tvsvishnu2002@gmail.com', "T V S Vishnu Vardhan"); // sender's email and name
    $mail->addAddress('tvsvishnu2002@gmail.com', "JEE Advanced 2021");  // receiver's email and name
$mail->AddCC('tvsvishnu2002@gmail.com', "T V S Vishnu Vardhan");

    $mail->Subject = "$test Key & Solutions";
    $mail->Body = '<span style="font-family:Roboto, sans-serif; font-size:14px">'.$msg.'</span>';


   $mail->send();
   
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

echo "<script>alert('You have submitted the Test.');location.replace('https://tvsvishnu.000webhostapp.com/objective-test/revision.php');</script>";

}
else {
   echo "Unsuccesful.";
}

}

?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>JEE Advanced 2021</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        /* Make the image fully responsive */
    
    </style>
</head><!----
<script type="text/javascript">
document.getElementById("modal").click();
</script>--->
  <script>
  function fun(){
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } 
  }
  
function functio() {

  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}</script>

<!----
<body onload="functio();">
-->
        <div class="topstrip"></div>
    <section class="headertop">
    <div class="container-fluid"> <h1>
JEE Advanced 2021</h1>
  </div>       <div class="topstrip"></div>
  
       
        <link href="./Page_files/bootstrap.min.css" rel="stylesheet">
    <link href="./Page_files/menudropsub.css" rel="stylesheet">
    <link href="./Page_files/own.css" rel="stylesheet">
    <link href="./Page_files/opensans.css" rel="stylesheet">
    <link href="./Page_files/font-awesome.min.css" rel="stylesheet">
    <script src="./Page_files/popper.min.js.download"></script>
    <script src="./Page_files/jquery-3.4.1.min.js.download"></script>
    <script src="./Page_files/bootstrap.min.js.download"></script>
    <script src="./Page_files/jquery.flexslider-min.js.download"></script>
    <script src="./Page_files/custom.js.download"></script>

    <script>
        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function () {
            if (this.matchMedia("(min-width: 768px)").matches) {
                $dropdown.hover(
                    function () {
                        const $this = $(this);
                        $this.addClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "true");
                        $this.find($dropdownMenu).addClass(showClass);
                    },
                    function () {
                        const $this = $(this);
                        $this.removeClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "false");
                        $this.find($dropdownMenu).removeClass(showClass);
                    }
                );
            } else {
                $dropdown.off("mouseenter mouseleave");
            }
        });
    </script>
    <script src="./Page_files/jquery.counterup.min.js.download"></script>
    <script src="./Page_files/jquery.waypoints.min.js.download"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
        </script>     
<center> <div class="mb-4 pagecontentpara" id="status">

<div class="row">
    <div class="column"> 
    <b>          

<label for="test">Test : </label>
<?php echo $_SESSION['test']." ";?>
<?php echo $_SESSION['subject'];?>
<br>
<?php 
$tes = $_SESSION['test'];
$subject = $_SESSION['subject'];
$sqlllt = "SELECT * FROM revision WHERE test='$tes' and subject='$subject'";
$ress = mysqli_query($conn,$sqlllt);

 while ($row = mysqli_fetch_assoc($ress)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) {
     if($field=="qp"){
         $qp_link = $value;
     }   
        }
     
 }
?>
<object data="<?php echo "https://tvsvishnu.000webhostapp.com/objective-test".$qp_link;?>" type="application/pdf" width="830px" height="1620px">
    <embed src="<?php echo "https://tvsvishnu.000webhostapp.com/objective-test".$qp_link;?>" type="application/pdf">
        
    </embed>
</object>
</div>

  <div class="column">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  id = "jeemain" name="jee" method="post">
    <?php if($_SESSION['start_no'] != ""){
    $x = $_SESSION['start_no'];
    }
    else {
    $x = 1;
    }?><br><center>
       <?php
       $test = $_SESSION['test'];
       $subject = $_SESSION['subject'];
       $sqllll = "SELECT * FROM save_responses where test = '$test' and subject='$subject'";
       $resulttt = mysqli_query($conn,$sqllll);
       $saved_answers = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
       if($resulttt->num_rows>0){
       
       $i = -1;
        while ($row = mysqli_fetch_assoc($resulttt)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) {
        if($field=="q$i"){
        $saved_answers[$i] = $value;
        }
                            $i++;

    }

        }
        }
       ?>
        <?php $p = 1;?>
<script> window.onload="fun()" </script>
  <b><!----<button type="submit" class="button-tvsvishnu" onclick="functio()">Click for Full Screen</button>--->
<input type="button" class="button-tvsvishnu" value="Click for Full Screen" onclick="functio()"><br></br><button type="submit" class="button-tvsvishnu" name="save" > Save Responses </BUTTON><br></br><?php echo "Question ".$x . " : " ; ?></b><?php echo " ";?><input type="text" name="1" autocomplete="off" value = '<?php echo $saved_answers[$p];$p++;?>' placeholder="<?php echo 'Question '.$x;$x = $x +1;?>" id="attlist">
  <b><?php echo "Question ".$x . " : " ?></b><input type="text" name="2" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist"><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="3" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist"><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="4" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist"><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="5" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="6" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="7" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="8" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="9" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="10" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br><b> 
<?php echo "Question ".$x . " : " ?></b><input type="text" name="11" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="12" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="13" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="14" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="15" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="16" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="17" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="18" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="19" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="20" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="21" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="22" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="23" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="24" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="25" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="26" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="27" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="28" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="29" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<b><?php echo "Question ".$x . " : " ?></b><input type="text" name="30" autocomplete="off" value = '<?php echo $saved_answers[$p]; $p++;?>'  placeholder="<?php echo 'Question '.$x; $x = $x+1;?>" id="attlist" ><br></br>
<CENTER><button onclick="return myFunction()" class="button-tvsvishnu" type="submit" name="submit" > Submit </BUTTON><br></br>
<button type="submit" class="button-tvsvishnu" name="save" > Save Responses </BUTTON></center></div></div></div></div></form></center>  </div></div></center>
</div>
<script type="text/javascript">
    function myFunction() {
       if (confirm('Click OK to Submit')) {
           return true;
       } else {
           return false;
       }
    }
</script>
</section>
</body>
<style>
    .column {
  width:61%;
  
}
body {
   height: 100%;
   overflow-x: hidden;
}
/* Clear floats after the columns */
 .button-tvsvishnu {
    background-color: #00468a !important;
    border-color: none !important;
    font-size: 16px;
    border:none;
    width : 200px;
    border-radius: 17.5px;
    height : 35px;
    color : white;
  }

</style>