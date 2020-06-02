<?php
include('compadmin.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Details</title>
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
</head>
<body style="background-color:#e0e0e0;">
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
              <a href="index.html">Home</a><i>|</i>
            </li>
            <li class="w3layouts_header_list">
              <a href="login.html">Login To Trade</a><i>|</i>
            </li>
            <li class="w3layouts_header_list">
              <a href="company.html">Register as a company</a><i>|</i>
            </li>
            <li class="w3layouts_header_list">
              <a href="leaderboard.php">View Leaderboard</a><i>|</i>
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
<p style="float: right; padding-right: 8px;margin-top: 15px; margin-bottom: 0px;  font-size: 20px;">Welcome admin:<strong><?php echo $_SESSION["username"]; ?></strong> of Company:<strong><?php echo $_SESSION["cname"]; ?></strong></p>
  <?php if(isset($_SESSION['success'])){
  	$identity=$_SESSION["username"];
  	$identity=mysql_real_escape_string($identity);
  	$c_name=$_SESSION["cname"];
  	$c_name=mysql_real_escape_string($c_name);
  	$sql="select * 
  		FROM companies 
      WHERE c_name='$c_name';";
    $q=mysqli_query($conn,$sql);
  	$x=$q->fetch_assoc();
  	?>
<div class="container">
<h2>Company fields of <?php echo $_SESSION["cname"]; ?></h2>
<div>
	<h4><pre>Opening Price(new day): 		        <?php echo $x["open_"]; ?></pre></h4>
	<hr>
	<h4><pre>Price(current price): 				  <?php echo $x["price"]; ?></pre></h4>
	<hr>
	<h4><pre>Company Type: 				          <?php echo $x["c_type"]; ?></pre></h4>
	<hr>
</div>
<div class="container">
  <h2>Change details:</h2>
  <form action="change.php" method="post">
    <div class="form-group">
      <label for="addr" >Opening price:</label>
      <input type="number" class="form-control" id="jkdt" placeholder="Enter Login-ID" name="opening">
    </div>
    <div class="form-group">
      <label for="addr" >Price:</label>
      <input type="number" class="form-control"  id="pass" placeholder="Enter Password" name="price">
    </div>
    <div class="form-group">
      <label for="addr" >Company type:</label>
      <input type="text" class="form-control" id="pass" placeholder="Enter Password" name="type">
    </div>
    <button type="submit" class="btn btn-default" name="okayish1">Submit</button>
  </form>

<p style="float: right; padding-right: 8px;margin-top: 15px; margin-bottom: 0px;  font-size: 20px;"><a href="admin.php"><strong>Go back</a></strong></p>
<?php } ?>
</body>
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
</html>