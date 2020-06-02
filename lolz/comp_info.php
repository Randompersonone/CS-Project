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
$pub="";
$open1="";
$offer="";
$bid="";
$type="";
$name="";
$vol=13567;
$idog="";
$errors=array();



  ini_set('display_errors',1); error_reporting(E_ALL);
  $name=mysqli_real_escape_string($conn,$_POST['name']); 
  $pub=mysqli_real_escape_string($conn,$_POST['pub_share']); 
  $open1=mysqli_real_escape_string($conn,$_POST['open']);
  $offer=mysqli_real_escape_string($conn,$_POST['offer']);
  $bid=mysqli_real_escape_string($conn,$_POST['bid']);
  $type=mysqli_real_escape_string($conn,$_POST['company_type']);
  if(empty($name)){
    array_push($errors, "name is required");
  }
  if(empty($pub)){
    array_push($errors, "Number of shares open is required");
  }
  if(empty($open1)){
    array_push($errors, "Opening price is Required");
  }
  if(empty($offer)){
    array_push($errors, "Offer  price is Required");
  }
  if(empty($bid)){
    array_push($errors, "Bid price is Required");
  }
  if(empty($type)){
    array_push($errors, "Company type is Required");
  }
  if(count($errors)==0) {
    ini_set('display_errors',1); error_reporting(E_ALL);
    //$password= md5($pass); //Encrypting password
    $sql="select * FROM companies WHERE c_name='$name';";
    $q=mysqli_query($conn,$sql);
    $og=rand(10,1000);
    if(!$q || mysqli_num_rows($q)==0){
      $sql10="SELECT og_id FROM oil_gas";
      $sql="INSERT INTO companies(c_name,price,c_type,volume,open_) VALUES('$name','$open1','$type','$vol','$open1');";
      $sql1="UPDATE companies SET market_capital=price*'$pub';";
      $sql2="UPDATE companies SET change=open-price;";
      $sql3="UPDATE companies SET p_change=(change/price)*100;";
      $q=mysqli_query($conn,$sql10);
      $arrid=array();
		if($q)
		{
			while($x=$q->fetch_assoc())
			{
				$num = preg_replace('/[^0-9]/', '', $x["og_id"]);
				array_push($arrid,$num);
			}
		}
		$flag=0;
		while($flag==0){
		$og=rand(10,1000);
		if (in_array($og, $arrid))
		{
			$flag=0;
		}
		else{
			$flag=1;
		}
		$idog="og".$og;
	}
	$sql4="INSERT INTO oil_gas(og_id,c_name,price,bid,offer,open_) VALUES('$idog','$name','$open1','$bid','$offer','$open1');";
	$sql5="UPDATE oil_gas SET market_capital=price*'$pub';";
	$sql6="UPDATE companies SET change=open-price;";
	$sql7="UPDATE companies SET p_change=(change/price)*100;";
      //echo "You are now logged in!";
      $q1=mysqli_query($conn,$sql);
      $q2=mysqli_query($conn,$sql1);
      $q3=mysqli_query($conn,$sql2);
      $q4=mysqli_query($conn,$sql3);
      $q5=mysqli_query($conn,$sql4);
      $q6=mysqli_query($conn,$sql5);
      $q7=mysqli_query($conn,$sql6);
      $q8=mysqli_query($conn,$sql7);
      $_SESSION["cname"]=$name;
      $_SESSION["ogid"]=$idog;
      $_SESSION["success"]="You are now logged in";
      header('location:company.html'); //redirect to home page
    } 
  }//redirect to home page
  else{
      array_push($errors,"An account already exists with this Username");
      echo "<script>
alert('You are already registered! Please login to access details!');
window.location.href='stock_detail.html';
</script>";
    }
  }
?>