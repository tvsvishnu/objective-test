<?php
session_start();
require_once 'database.php';

?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>JEE Main & Advanced 2021</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        /* Make the image fully responsive */
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
</head>
<body>

    <input type="hidden" id="LangId" value="P">

    <section>
        <div class="topstrip"></div>
    </section>

<section class="headertop">
    <div class="container-fluid">

                <h1>
JEE Main & Advanced 2021              </h1>

    </div>
</section>


        <section class="marqueesection">

            <marquee behavior="alternate" direction="left" class="marqueestyle" onmouseover="this.stop();" onmouseout="this.start();">
                <span class="marqueetext">JEE Main & Advanced 2021</span>
            </marquee>
            
        </section>
       
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
        </script>    <center> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  id = "jeemain" name="jee" method="post">

 <b>
<label for="test">Test : </label>

<select name="test" id="test">
 <?php
require_once 'database.php';
$sql = "SELECT * FROM responses order by s_no desc";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
   echo "<option value='' selected disabled hidden>Select</option>";

    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
  if($field == "test"){
  echo "<option value='$value'>$value</option>";
        // I just did not use "htmlspecialchars()" function. 
    }}
}
?>
</select> <br></b></br>
<b><label for="subject">Subject : </label>
</b>
<select name="subject" id="subject">
      <option value="" selected disabled hidden>Select</option>
        <option value="Maths">Maths</option>

  <option value="Physics">Physics</option>
  <option value="Chemistry">Chemistry</option>

</select> <br></br>
    <button type="submit" name="submit" class="button-tvsvishnu"> Submit </BUTTON><br>

    <?php
require_once 'database.php';
if(isset($_POST['submit'])) 
{
    if($_POST['test'] == ""){
        die();
    }
    if($_POST['subject']==""){
        $test = $_POST['test'];
        $sql = "SELECT * FROM responses where test = '$test'";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field=="start_no"){
           if($value!=NULL){
$x = $value;
}
}// I just did not use "htmlspecialchars()" function. 
    }
}
$resut = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

echo "<br>";
echo "<table border='1'>";
echo "<th> <center>Test</center> </th>";
echo "<th> <center>Subject</center> </th>";

echo "<th> <center>Start Time</center> </th>";

$y = $x;
echo "<th> <center>Submitted Time</center> </th>";
while($x<$y+30) {
echo "<th><center>Q$x</center> </th>";$x++;
}
while ($row = mysqli_fetch_assoc($resut)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field!="s_no" && $field!="start_no"){
        echo "<td><center>" . $value . "</center></td>"; 
        }// I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>"; 

    }
else{
    $subject=$_POST['subject'];
    $test = $_POST['test'];
    $x = 1;
   $sql = "SELECT * FROM responses where test = '$test' and subject='$subject'";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field=="start_no"){
           if($value!=NULL){
$x = $value;
}
}// I just did not use "htmlspecialchars()" function. 
    }
}
$resut = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

echo "<br>";
echo "<table border='1'>";
echo "<th> <center>Test</center> </th>";
echo "<th> <center>Subject</center> </th>";

echo "<th> <center>Start Time</center> </th>";

$y = $x;
echo "<th> <center>Submitted Time</center> </th>";
while($x<$y+30) {
echo "<th><center>Q$x</center> </th>";$x++;
}
while ($row = mysqli_fetch_assoc($resut)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field!="s_no" && $field!="start_no"){
        echo "<td><center>" . $value . "</center></td>"; 
        }// I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>"; 
}
}
$x = 1;
if(!isset($_POST['submit'])) {

$sql = "SELECT * FROM responses order by s_no desc";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<table border='1'>";
echo "<th><center> Test</center> </th>";
echo "<th><center> Subject</center> </th>";
echo "<th> <center>Start Time</center> </th>";


echo "<th><center> Submitted Time </center></th>";
while($x<=30) {
echo "<th><center>Q$x</center> </th>";$x++;
}
while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       if($field!="s_no" && $field!="start_no"){
        echo "<td><center>" . $value . "</center></td>"; 
        }// I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>";
die();

}
?></center>



