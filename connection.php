<?php

include 'dbCon.php';

$user_name= $_POST['user_name'];
$address= $_POST['address'];
$phone=$_POST['phone'];
$email= $_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

if($password == $cpassword) {

    $sql = "SELECT * FROM user WHERE email = '$email'";
    // $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    if($result-> num_rows > 0) {
        echo "User with that email id already exists.";
    }
    else{
        $h_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (user_name, address, phone, email, password) 
        VALUES ('$user_name', '$address', '$phone', '$email', '$h_password')";
        
        if($conn->query ($sql) === TRUE) {
        echo "New record created successfully";
        } 
        else {
        echo "Error:" .$sql . "<br>" . $conn->error;
        }
    }
}
else{
    echo "<script>alert('Password Not Matched.')</script>";
}


?>