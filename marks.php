<?php
require_once 'database.php';

if(isset($_POST['submit'])) {
$ptno = $_POST['ptno'];


 $sql = "SELECT * FROM responses where ptno = $ptno";
 $res = mysqli_query($conn,$sql);

if($res->num_rows > 0) {
    $correct_mcq = 0;$correct_num = 0;$incorrect_mcq = 0;$incorrect_num = 0;
    $sqlquery = "SELECT * FROM responses,answers where (responses.ptno = answers.ptno and responses.q1 = answers.q1 and responses.ptno = $ptno)";
    
 $resu = mysqli_query($conn,$sqlquery);
  $numrow = $resu->num_rows;

 $sqlque = "SELECT * FROM responses,answers where (responses.ptno = '' and responses.ptno = $ptno)";
 $resul = mysqli_query($conn,$sqlque);
 $numrowresul = $resul->num_rows;
 if($numrow = 1) { $correct_mcq++;}
 else if ($numrowresul > 1) { }
 else {$incorrect_mcq++;}
echo $correct_mcq;
echo $incorrect_mcq;


}
else {
    echo '<script>alert("You did not write test for this PT No.")</script>';
}
}

?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>NIT Andhra Pradesh</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <img src="nitandhralogo4.png" >
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                <h1>
NATIONAL INSTITUTE OF TECHNOLOGY ANDHRA PRADESH                </h1>
                <h4> TADEPALLIGUDEM , WEST GODAVARI DISTRICT , ANDHRA PRADESH.</h4>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <img src="moelogo.png">
            </div>
        </div>
    </div>
</section>


        <section class="marqueesection">

            <marquee behavior="alternate" direction="left" class="marqueestyle" onmouseover="this.stop();" onmouseout="this.start();">
                <span class="marqueetext">NIT Andhra Pradesh Student Information System</span>
            </marquee>
            
        </section>
        <section class="contentsection mt-2" id="skipcontent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">


        <div class="boxdesignCurrentEvents">

                <h5>
                    Home
                </h5>
            <nav id="sidebar">
                <ul class="list-unstyled components">
                                <li>
                                    <a href = "index.html" target="_blank" class="parentLink"> NIT Andhra Pradesh Student Information System Home Page <img src="./Page_files/newicon.gif" alt="new" class="pull-right"></a>
                                </li>
<li>
                                    <a href = "register.php" target="_blank" class="parentLink"> Signup <img src="./Page_files/newicon.gif" alt="new" class="pull-right"></a>
                                </li>
                                <li>
                                    <a href = "login.php" target="_blank" class="parentLink"> Login<img src="./Page_files/newicon.gif" alt="new" class="pull-right"></a>
                                </li>    
                </ul>

            </nav>
        </div>
        </div>
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


<div class="mb-4 pagecontentpara">

<h3 class="pageheading"><b>Maths Practice Tests</b></h3>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   <b>Enter PT No. : </b><input type="text" name="ptno" placeholder="Enter PT No."></input>
<CENTER><button type="submit" name="submit" > SUBMIT </BUTTON>
</center><br></br></br></br></div></div></div></div></form>
</section>