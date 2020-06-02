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
$user="";
$pass="";
$name="";
$pass1="";
$errors=array();

if(isset($_POST['okayish'])) {
  $user=mysqli_real_escape_string($conn,$_POST['id']); 
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  if(empty($user)){
    array_push($errors, "Username is required");
  }
  if(empty($pass)){
    array_push($errors, "Password is Required");
  }
  if(count($errors)==0) {
    //$password= md5($pass); //Encrypting password
    $sql="select * FROM reg_user WHERE password = '$pass' AND loginID = '$user'";
    $q=mysqli_query($conn,$sql);
    if(!$q || (mysqli_num_rows($q))==1){
    //  die("YES, THIS WORKS.");
      $_SESSION["username"]=$user;
      $_SESSION["success"]="You are now logged in";
      header('location: user_site.php'); //redirect to home page
  }
  else{
      array_push($errors,"Not a valid Username/Password");
      echo "<script>
alert('You are not registered! Please register and login again!');
window.location.href='new_user.html';
</script>";
  }
}
}
if(isset($_POST['okayish1'])) {
  ini_set('display_errors',1); error_reporting(E_ALL);

  $user=mysqli_real_escape_string($conn,$_POST['id']); 
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  if(empty($name)){
    array_push($errors, "name is required");
  }
  if(empty($pass)){
    array_push($errors, "Password is Required");
  }
  if(empty($user)){
    array_push($errors, "Login-ID is Required");
  }
  if(count($errors)==0) {
    ini_set('display_errors',1); error_reporting(E_ALL);
    //$password= md5($pass); //Encrypting password
    $sql="select * FROM reg_user WHERE password = '$pass' AND loginID = '$user'";
    $q=mysqli_query($conn,$sql);
    if(!$q || mysqli_num_rows($q)==0){
      $s="SELECT rank from leaderboard";
      $e=mysqli_query($conn,$s);
      $arr=array();
      while ($y=$e->fetch_assoc()) {
        array_push($arr,$y["rank"]);
      }
      $max1=max($arr)+1;
      $s1="SELECT serial_no from user_balance";
      $e=mysqli_query($conn,$s1);
      $arr1=array();
      while ($y=$e->fetch_assoc()) {
        array_push($arr1,$y["serial_no"]);
      }
      $max12=max($arr1)+1;
      $s2="SELECT serial_no from shareholders";
      $e=mysqli_query($conn,$s2);
      $arr2=array();
      while ($y=$e->fetch_assoc()) {
        array_push($arr2,$y["serial_no"]);
      }
      $max123=max($arr2)+1;
      $cm='a'.$max1;
      $sql10="INSERT INTO reg_user(name,loginID,password) VALUES('$name','$user','$pass');";
      $sql11="INSERT INTO leaderboard VALUES('$max1','$user',0,0,0,0);";
      $sql12="INSERT INTO user_balance VALUES('$max12','$user',0,0,0);";
      $sql13="INSERT INTO shareholders VALUES('$max123',' ','$user','$cm',0,0);";
      //echo "You are now logged in!";
      $q10=mysqli_query($conn,$sql10);
      $q11=mysqli_query($conn,$sql11);
      $q12=mysqli_query($conn,$sql12);
      $q13=mysqli_query($conn,$sql13);
      if($q10 and $q11 and $q12 and $q13){
      $_SESSION["username"]=$user;
      $_SESSION["success"]="You are now logged in";
      header('location:user_site.php'); //redirect to home page
    } 
  }//redirect to home page
  else{
      array_push($errors,"An account already exists with this Username");
      echo "<script>
alert('You are already registered! Please login to access details!');
window.location.href='login.html';
</script>";
    }
  }
  else{
    array_push($errors,"Not a valid Username/Password");
  }
}
?>

