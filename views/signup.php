<?php

require_once '../controllers/userControllers.php';
require_once '../config/Database.php';
// require_once './userDashboard.php';
require_once './user.php';

$db = new Database;

// session_start();
$userInsert = new userControllers;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $dateofbirth = $_POST['dateofbirth'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if(empty(trim($name)) || empty(trim($surname)) || empty(trim($dateofbirth)) || empty(trim($username)) || empty(trim($email)) || empty(trim($password))){
        array_push($errors, 'Mbush te gjitha fushat!');
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, 'Email nuk eshte i sakte!');
        }
        if(!preg_match("/^[A-Z]{1}[a-z]{5,}\d{2,}$/",$password)){
            array_push($errors, 'Invalid password!'); 
        }
        if(!preg_match("/^[A-Za-z]{6,}$/",$username)){
            array_push($errors, 'Invalid username');
        }
    }
    $queryE = $db->pdo->query("SELECT * FROM `useri` WHERE `email` LIKE '$email'");
    $queryU = $db->pdo->query("SELECT * FROM `useri` WHERE `username` LIKE '$password'");

    if(count($queryE->fetchAll())){ 
        array_push($errors, 'Ky email eshte i zene!');
    }
    if(count($queryU->fetchAll())){
        array_push($errors, 'Ky username eshte i zene!');
    }
    if(count($errors) == 0){
        $user = new User ($name, $surname, $dateofbirth, $username, $email, $password, 2);
        $userInsert->insertUser($user);
        
    }
    $_SESSION['errors'] = $errors;
    session_destroy();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <!-- <link rel="stylesheet" href="../CSS/signup.css"> -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <style>
        p.error{
            border-radius:5px;
            color:red;
            border:1px solid red;
            padding:10px;margin:10px;
        }
    </style>
    <body>
        <div class="differentPage">
            <div class="container">
                <div class="header-div">
                    <div class="logo-div">
                        <h1><a href="./index.php"></a></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-page">
            <div class="login-form-element">
                <p class="log-in" align="center">Sign up</p>
                <?php 
                if(isset($_SESSION["errors"]))
                    foreach($_SESSION["errors"] as $error)
                        echo '<p class="error">'.$error.'</p>';
                ?>
                    <form class="login-form" method="POST">
                        <input id="name" class="Name" type="text" align="center" placeholder="Name.." name="name"> <br><br>
                        <input id="surname" class="Surname" type="text" align="center" placeholder="surname.." name="surname"> <br><br>
                        <input id="dateofbirth" class="Date" type="date" align="center" placeholder="dateofbirth.." name="dateofbirth"> <br><br>
                        <input id="username" class="firstInfo" type="text" align="center" placeholder="username.." required="true" name="username"> <br><br>
                        <input id="email" class="firstInfo" type="email" align="center" placeholder="email.." required="true" name="email"> <br><br>
                        <input id="password" class="password" type="password" align="center" placeholder="password.." required="true" name="password"> <br><br>
                        <input class="submit" id="submit" onclick="validoSignUp()" type="submit" name="submit" value="Sign Up"></input> <br><br>
                        <div class="sign-up-message">
                            <p align="center">Already have an account? <a href="./login.php">Log in</a></p>
                        </div>
                        
                    </form>
                </div>
        </div>

        <script src="../js/signup-validation.js"></script>
        <script src="../js/menuToggler.js"></script>
    </body>
</hml>
    
<style>
.log-in {
  padding-top: 40px;
  color: rgb(247, 139, 139);
  
  font-weight: bold;
  font-size: 23px;
}

.account-page {
  position: relative;
  background-color: #ffffff;
  width: 400px;
  
  margin: 5em auto;
  border-radius: 1.5em;
  
  margin-left: auto;
  margin-right: auto;
}


.firstInfo {
    width: 76%;
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 46px;
  text-align: center;
  margin-bottom: 27px;
}

.Date {
    width: 76%;
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 46px;
  text-align: center;
  margin-bottom: 27px;
}

.Surname {
    width: 76%;
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 46px;
  text-align: center;
  margin-bottom: 27px;
}

.Name{
    width: 76%;
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 46px;
  text-align: center;
  margin-bottom: 27px;
}

    .password{
        width: 76%;
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
 
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 46px;
  text-align: center;
  margin-bottom: 27px;
    }

    .submit {
      
  border: 0;
  padding-left: 40px;
  padding-right: 40px;
  padding-bottom: 10px;
  padding-top: 10px;
  
  margin-left: 35%;
  font-size: 13px;
 
}
</style>