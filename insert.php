<?php

$name = $_POST['name'];
$email = $_POST['email'];
$select  = $_POST['select'];
$description  = $_POST['description'];
$cost  = $_POST['cost'];

$conn = new mysqli('localhost', 'root', '', 'register');

if(isset($_POST['name']) == true && isset($_POST['email']) == true && isset($_POST['select']) == true && isset($_POST['description']) && isset($_POST['cost'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $select  = $_POST['select'];
    $description  = $_POST['description'];
    $cost  = $_POST['cost'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
        if($conn->connect_error){
            die('Conncetion failed: '.$conn->connect_error);
        }else {
            $sql = "INSERT into message(name, email, select, description, cost) values('$name', '$email', '$select', '$description', '$cost')";
            if($conn->query($sql)){
                echo "Success!";
            } else {
                echo "Error";
            }
            $conn->close();
        }

        header("Location: register.html");
    exit;
    }else {
        header("Location: register.html");
    }
}
