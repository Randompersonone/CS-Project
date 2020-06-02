<?php
include('changedetails.php');
$o="";
$p="";
$t="";
if(isset($_POST['okayish1'])) {
  $o=mysqli_real_escape_string($conn,$_POST['opening']); 
  $p=mysqli_real_escape_string($conn,$_POST['price']);
  $t=mysqli_real_escape_string($conn,$_POST['type']);
$cname=$_SESSION["cname"];
  if($o){
    $sql1="UPDATE companies SET open_='$o' WHERE c_name='$cname';";
    $sql2="UPDATE stock_quote SET open_='$o' WHERE c_name='$cname';";
    $sql3="UPDATE oil_gas SET open_='$o' WHERE c_name='$cname';";
    $sql4="UPDATE construction SET open_='$o' WHERE c_name='$cname';";
    $sql5="UPDATE consultancy_firms SET open_='$o' WHERE c_name='$cname';"; 
    $sql6="UPDATE mining SET open_='$o' WHERE c_name='$cname';"; 
    $q1=mysqli_query($conn,$sql1);
    $q2=mysqli_query($conn,$sql2);
    $q3=mysqli_query($conn,$sql3);
    $q4=mysqli_query($conn,$sql4);
    $q5=mysqli_query($conn,$sql5);
    $q6=mysqli_query($conn,$sql6);}
  if($p){
    $sql7="UPDATE companies SET open_='$o' WHERE c_name='$cname';";
    $sql8="UPDATE stock_quote SET open_='$o' WHERE c_name='$cname';";
    $sql9="UPDATE oil_gas SET open_='$o' WHERE c_name='$cname';";
    $sql10="UPDATE construction SET open_='$o' WHERE c_name='$cname';";
    $sql11="UPDATE consultancy_firms SET open_='$o' WHERE c_name='$cname';"; 
    $sql12="UPDATE mining SET open_='$o' WHERE c_name='$cname';";   
    $q7=mysqli_query($conn,$sql7);
    $q8=mysqli_query($conn,$sql8);
    $q9=mysqli_query($conn,$sql9);
    $q10=mysqli_query($conn,$sql10);
    $q11=mysqli_query($conn,$sql11);
    $q12=mysqli_query($conn,$sql12);}
  if($t){
    $sql13="UPDATE companies SET c_type='$t' WHERE c_name='$cname';";
    $q13=mysqli_query($conn,$sql13);
  }
  $sql20="UPDATE companies SET change_=open_-price WHERE c_name='$c_name'; ";
  $sql21="UPDATE stock_quote SET change_=open_-price WHERE c_name='$c_name'; "; 
  $sql22="UPDATE oil_gas SET change_=open_-price WHERE c_name='$c_name'; "; 
  $sql23="UPDATE construction SET change_=open_-price WHERE c_name='$c_name'; "; 
  $sql24="UPDATE consultancy_firms SET change_=open_-price WHERE c_name='$c_name'; "; 
  $sql25="UPDATE mining SET change_=open_-price WHERE c_name='$c_name'; "; 
  $sql26="UPDATE companies SET p_change=change_/100 WHERE c_name='$c_name'; ";
  $sql27="UPDATE stock_quote SET p_change=change_/100 WHERE c_name='$c_name'; "; 
  $sql28="UPDATE oil_gas SET p_change=change_/100 WHERE c_name='$c_name'; "; 
  $sql29="UPDATE construction SET p_change=change_/100 WHERE c_name='$c_name'; "; 
  $sql30="UPDATE consultancy_firms SET p_change=change_/100 WHERE c_name='$c_name'; "; 
  $sql31="UPDATE mining SET p_change=change_/100 WHERE c_name='$c_name'; "; 
    $q20=mysqli_query($conn,$sql20);
    $q21=mysqli_query($conn,$sql21);
    $q22=mysqli_query($conn,$sql22);
    $q23=mysqli_query($conn,$sql23);
    $q24=mysqli_query($conn,$sql24);
    $q25=mysqli_query($conn,$sql25); 
    $q26=mysqli_query($conn,$sql26);
    $q27=mysqli_query($conn,$sql27);
    $q28=mysqli_query($conn,$sql28);
    $q29=mysqli_query($conn,$sql29);
    $q30=mysqli_query($conn,$sql30);
    $q31=mysqli_query($conn,$sql31); 
  echo "<script>alert('Values are changed')</script>";
}

?>     