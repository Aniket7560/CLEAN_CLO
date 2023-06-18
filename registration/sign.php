<?php

$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];


    $sql="Select * from `registration` where username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "User already exit";
            $user=1;
        }else{
            $sql="insert into `registration`(Username, password)
            values('$username', '$password')";
            $result=mysqli_query($con,$sql);
            if($result){
                // echo "Sign up successfully";
                $success=1;
            }else{
                die(mysqli_error($con));
            } 
        }
    }
}


?>










<!doctype html>
<html lang="en">
  <head>
    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'jost', sans-serif;
            background: linear-gradient(to bottom, #e4f9fe, #17a2b8, #a0f0f6);
        }

        .main{
            width: 350px;
            height: 500px;
            background: linear-gradient(to bottom, #e4f9fe, #17a2b8, #a0f0f6);
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 1px 2px 80px #122192;
        }

        #chk{
            display: none;
        }

        .Signup{
            position: relative;
            width: 100%;
            height: 100%;
        }


        label{
            color: #ffffff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }


        input{
            width: 60%;
            height: 20px;
            background-color: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 10px;
        }

        button{
            width: 60%;
            height: 40px;
            margin: 20px auto;
            justify-content: center;
            display: block;
            color: #ffffff;
            background-color: #1972bb;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;

        }
        

        button:hover{
            background: #004fa8;
        }

        .login{
            height: 460px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: 0.8s ease-in-out;
        }

        .login label{
            color:#573b8a;
            transform: scale(.6);

        }


        #chk:checked ~ .login{
            transform: translateY(-500px);
        }

        #chk:checked ~ .login{
            transform: translateY(1);
        }


    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="Signup Now.html">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    

  </head>
  <body>

<?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oh no sorry !</strong> user already exit.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>



<?php
if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success</strong> you are successfully signed up.
  </div>';
}

?>




    <div class= "main">
      <input type="checkbox" id="chk" aria-hidden="true">
        <form action="sign.php" method="post">
          <label for="chk" aria-hidden="true">Signup</label>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter your username" name="username">
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
      
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
  </body>
</html>