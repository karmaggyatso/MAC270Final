<?php 
$link = mysqli_connect("localhost","root","","extracredit") 
    or die("Cannot connect to DB");
$username = mysqli_real_escape_string($link, (strtolower($_POST['user'])));
$password = mysqli_real_escape_string($link, (strtolower($_POST['pass'])));
$result = mysqli_query($link, "select * from tbl_user where UserLogin = '$username' and Password = '$password'") 
    or die ("No connection".mysqli_error($link));

$row = mysqli_fetch_array($result);

if($row ['UserLogin'] == "" && $row ['Password'] == "") {
    echo "Fail to login";
}

elseif($row ['UserLogin'] == $username && $row['Password'] == $password) {
    header("Location: ../Project/index.php");   
}
?>