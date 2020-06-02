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
$c_name="";
$name="";
$pass1="";
$errors=array();

if(isset($_POST['okayish'])) {
  $user=mysqli_real_escape_string($conn,$_POST['id']); 
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  $c_name=mysqli_real_escape_string($conn,$_POST['c_name']);
  if(empty($user)){
    array_push($errors, "Username is required");
  }
  if(empty($pass)){
    array_push($errors, "Password is Required");
  }
  if(empty($c_name)){
    array_push($errors, "Please enter the company's name");
  }
  if(count($errors)==0) {
    //$password= md5($pass); //Encrypting password
    $sql="select * FROM admin WHERE password = '$pass' AND loginID = '$user' AND c_name= '$c_name' ";
    $q=mysqli_query($conn,$sql);
    if(mysqli_num_rows($q)==1){
    //  die("YES, THIS WORKS.");
      $_SESSION["username"]=$user;
      $_SESSION["cname"]=$c_name;
      $_SESSION["success"]="You are now logged in";
      header('location: admin.php'); //redirect to home page
  }
  else{
      array_push($errors,"Not a valid Admin, please check your credentials and try again!");
      echo "<script>
alert('You are not a registered admin!');
window.location.href='index.html';
</script>";
  }
}
}

?>