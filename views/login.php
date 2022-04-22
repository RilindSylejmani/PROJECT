<?php
     session_start();
    require_once '../config/Database.php';
    require_once '../controllers/userControllers.php';

    $db = new Database;

    $userInsert = new userControllers;

    if(isset($_POST['submit'])){
        $errors = [];

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            array_push($errors, 'Mbush te gjitha fushat!');
        }

        $queryU = $db->pdo->query("SELECT * FROM useri WHERE username LIKE '$username'");
        
        $userPassword = $userInsert->readUserData($username);
        
        if(!count($queryU->fetchAll())){
            array_push($errors, 'Ky username nuk ekziston');
        }
        if(!password_verify($password, $userPassword['password'])){
            array_push($errors, 'Passwordi nuk eshte i sakte!');
        }
        if(count($errors) == 0){
             $_SESSION['roli'] = $userPassword['user_role'];
            echo $_SESSION['roli'];
             $_SESSION['username'] = $userPassword['username'];

            $name   = 'timeOfLogin';
            $value  = date("h:ia");
            $expire = time() + 60 * 60 * 24 * 30;
            setcookie( $name, $value, $expire);
              
            $secName   = 'username';
            $secValue  = $userPassword['username'];
            setcookie( $secName, $secValue, $expire);
            

            header('Location: ../Pages/firstPage.php');
        }
        $_SESSION['errors'] = $errors;
    }

?>
<html>
    <head>
    <!-- <link rel="stylesheet" href="../CSS/login.css"> -->
    </head>
    <style>
        p.error{
            border-radius:7px;
            color:red;
            border:2px solid black;
            padding:10px;margin:10px;
        }
    </style>
<body>
<?php include '../components/header1.php'; ?>
<div class="account-page">
    <div class="login-form-element">
    <p class="log-in" align="center">Log in</p>
        <?php
        if(isset($_SESSION["errors"]))
            foreach($_SESSION["errors"] as $error)
                echo '<p class="error">'.$error.'</p>';
        ?>
        
        
        <form class="login-form" method = 'POST'>
        
            <input id="username" class="firstInfo" type="text" placeholder="Username..." required="true" name="username"><br>
            <input id="password" class="password" type="password" placeholder="password..." name="password"><br>
        
            <input type="submit" class="submit" onclick="validoLogin()" value="login" id="submit" name="submit"><br>
            <div class="sign-up-message" style="margin-top: 25px; font-size: 13px;">
                <p>Don't have an account? <a href="./signup.php">Sign up</a></p>
            </div>
        </form>
    </div>
</div>


<script src="../js/login-validation.js"></script>
<script src="../menuToggler.js"></script>
</body>
</html>

<style>
    .account-page {
  position: relative;
  background-color: #ffffff;
  width: 400px;
  
  margin: 5em auto;
  border-radius: 1.5em;
  
  margin-left: auto;
  margin-right: auto;
}

.log-in {
  padding-top: 40px;
  color: rgb(247, 139, 139);
  
  font-weight: bold;
  font-size: 23px;
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

form.login-form {
  padding-top: 40px;
}

.password {
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

/

.submit {
  border: 0;
  padding-left: 40px;
  padding-right: 40px;
  padding-bottom: 10px;
  padding-top: 10px;
  
  margin-left: 35%;
  font-size: 13px;
  
}

.sign-up-message {
  display: block;
  margin-left: auto;
  margin-right: auto;
}



.sign-up-message {
    text-align:center;
}

p{
    font-size:17px;
}

</style>