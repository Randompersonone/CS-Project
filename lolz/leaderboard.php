<?php
//echo "flag0";
session_start();
ini_set('display_errors',1); error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock1";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * from leaderboard order by rank";
$q=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Leaderboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Stack the Stocks"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link class="include" rel="stylesheet" type="text/css" href="css/jquery.jqplot.css" />
<link type="text/css" href="css/jquery.simple-dtpicker.css" rel="stylesheet" />
<link rel="stylesheet" href="css/chart.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css" />

<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.marquee.min.js"></script>

<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<script src="js/jquery.flot.min.js" type="text/javascript"></script> 
<script src="js/jquery.flot.animator.min.js" type="text/javascript"></script>
<!-- //left-chart -->
<link href="//fonts.googleapis.com/css?family=Muli:300,300i,400,400i" rel="stylesheet">
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->
</head>
  
<body style="background-color: #e0e0e0;">
<!-- header -->
<div class="header">
    <div class="w3ls_header_top">
      <div class="container">
        <div class="w3l_header_left">
          <ul class="w3layouts_header">
            <li class="w3layouts_header_list">
              <ul>
                <li>
                  <i>|</i>
                </li>
              </ul>
            </li>
            
            
            <li class="w3layouts_header_list">
              <a href="#">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="w3l_header_right">
          <h2><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+(000) 123 456 678</h2>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="w3ls_header_middle">
      <div class="container">
        <div class="agileits_logo">
          <h1><a href="index.html">&nbsp;&nbsp;&nbsp;<span>Stack the Stocks</span> </a></h1>
        </div>
        
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="trade_navigation">
    <div class="container">
      <nav class="navbar nav_bottom">
       <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header nav_2">
          <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
        </div> 
         <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
          <nav class="wthree_nav">
            <ul class="nav navbar-nav nav_1">
              <li class="act"><a href="index.html">Home</a></li>
              <li><a href="login.html">User Login</a></li>
              <li><a href="compadmin.html">Admin Login</a></li>
              <li><a href="leaderboard.php">View Leaderboard</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Company Registration<span class="caret"></span></a>        
                <div class="dropdown-menu w3ls_vegetables_menu">
                  <ul>  
                    <li><a href="oil_gas.html">Oil Gas</a></li>
                    <li><a href="mining.html">Mining</a></li>
                    <li><a href="construction.html">Construction</a></li>
                    <li><a href="consultancy.html">Consultancy Firms</a></li>
                  </ul>             
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </nav>
    </div>
  </div>
</div>
<div class="w3_stocks">
  <br>
            <center><h1> <font color="green">Leaderboard</font></h1></center><br>
              <div id="myTabContent2" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home2" aria-labelledby="home2-tab" align="center">
                  <div class="w3l_stocks">
                    <?while($x=$q->fetch_assoc()){?>
                    <div class="w3l_stocks1">
                      <a href="single.html"><h4><?php echo $x["loginID"] ?></h4></a>
                      <p>
                        <?php
                        if ($x["gain_loss"]>0) {
                          $color="green";
                          $cr="caret caret1";
                        }
                        else{
                          $color="red";
                          $cr="caret";
                        }?><i style="color:<?php echo $color?>;"><span class="<?php echo $cr?>"></span>
                        <?php echo $x["gain_loss"] ?></label></i></p>
                    </div>
                    <?php } ?>
                    
                  </div>
                </div>
              </div>
            
</div>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
  <script type="text/javascript">
    $(document).ready(function() {        
      $().UItoTop({ easingType: 'easeOutQuart' });
                
      });
  </script>
<!--<p style="margin-top: 15px; margin-bottom: 0px;  font-size: 20px;">The current leaderboard is as follows:<hr><br></p>
<table>
    <tr>
      <th>Name</th>
    </tr>
  <?while($x=$q->fetch_assoc()){?>
    <tr>
      <td><?php echo $x["loginID"] ?></td>
    </tr>
  <?php } ?>
<p style="float: right; padding-right: 8px;margin-top: 0px; margin-bottom: 0px;  font-size: 20px;"><a href="index.html"><strong>Go back</a></strong></p>-->
</body>
</html>