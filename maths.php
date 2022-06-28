<?php
session_start();
require_once 'database.php';

?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width">
    <title>JEE Main & Advanced 2021</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <style>
        /* Make the image fully responsive */
    
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
        </script>
<h3 class="pageheading"><b><center>Maths Questions</center></b></h3>
        
<?php
require_once 'database.php';
$sql = "SELECT * FROM questions order by date desc";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<center>";
echo "<table border='1'>";
echo "<th> <center> Chapter </center></th>";
echo "<th> <center>Link </center></th>";

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) {
    // I you want you can right this line like this: foreach($row as $value) {
if($field != "date"){      
    if($field == "questions_link"){
    echo "<td>" . "<a href='$value'>" ."Link for Questions" ."</a>". "</td>"; }
    else {
        echo "<td>" .$value . "</td>";
    }
}
        // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>";echo "</center>";echo "<hr></hr>";
echo "<center><h3 class='pageheading'><b>Maths Solutions</b></h3></center>";
$sql = "SELECT * FROM solutions order by date desc";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<center>";
echo "<table border='1'>";
echo "<th> <center> Chapter </center></th>";
echo "<th> <center>Link </center></th>";

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) {
    // I you want you can right this line like this: foreach($row as $value) {
if($field != "date"){      
    if($field == "solutions_link"){
    echo "<td>" . "<a href='$value'>" ."Link for Solutions" ."</a>". "</td>"; }
    else {
        echo "<td>" .$value . "</td>";
    }
}
        // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>";echo "</center>";


?>