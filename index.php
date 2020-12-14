<?php

include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $sql1 = "SELECT * FROM `users`";
    $result1 = mysqli_query($conn,$sql1);

    $data = array();
    $i=0;

    while($row = mysqli_fetch_assoc($result1)){
        $data[] = $row;
    }

    echo json_encode($data);
    echo gettype(json_encode($data));

    for($i;$i<count($data);$i++){

       $username = $data[i].username;

    }

    if( $_POST["username"] == "" && $_POST["email"] == "" && $_POST["password"] == "" && $_POST["password"]  != $_POST["cpassword"] ){

        echo "hello";
    }

    else{    
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $email = $_POST["email"];

        $sql = "INSERT INTO `users`(`username`, `password`, `email`) VALUES ('$username', '$password','$email')";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "done";
        }
        else{
            echo "try again";
        }
    }
}  

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>

    <link rel = "stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  </head>
  <body>

    <div class="alert alert-success" role="alert">
        A simple success alert—check it out!
    </div>
    <div class="alert alert-danger" role="alert">
        A simple danger alert—check it out!
    </div>

    <form id = "registration_form" action="" method="POST">
        <h2>REGISTER</h2>
        <div class = "sec">
            <label class = "labels" for="username">UserName</label>
            <span id ="error_fname">Please Enter Valid First name</span>
            <input class = "input" type = "text" id="username" name="username">
        </div>

        <div class = "sec">
            <label class = "labels" for="email">Email</label>
            <span id ="error_email">Please enter valid email address</span>
            <input class = "input" type = "email" id="email" name="email">
        </div>

        <div class = "sec">
            <label class = "labels" for="password">Password</label>
            <span id ="error_password">Password should have 8 characters</span>
            <input class = "input" type = "password" id="password" name="password">
        </div>

        <div class = "sec">
            <label class = "labels" for="re_password">Re-Password</label>
            <span id ="error_re_password">Password and Re-Password didn't match</span>
            <input class = "input" type = "password" id="cpassword" name="cpassword">
        </div>

        <button type="submit">Submit</button>

    </form>

    <script src = "index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>