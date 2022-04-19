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
        
        $userPassword = $userInsert->readUser($username);
        
        if(!count($queryU->fetchAll())){
            array_push($errors, 'Ky username nuk ekziston');
        }
        /*if(!password_verify($password, $userPassword = ['user_password'])){
            array_push($errors, 'Passwordi nuk eshte i sakte!');
        }*/
        if(count($errors) == 0){
            $_SESSION['roli'] = $userPassword['user_role'];
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
    <link rel="stylesheet" href="../Css/login.css">
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
<div>
    <div>
        <?php
        if(isset($_SESSION["errors"]))
            foreach($_SESSION["errors"] as $error)
                echo '<p class="error">'.$error.'</p>';
        ?>
        
        <h1>Log in</h1>
        <form class="registration-form" method = 'POST'>
        
            <input id="username" type="text" placeholder="Username..." required="true" name="username"><br>
            <input id="password" type="password" placeholder="password..." name="password"><br>
        
            <input type="submit" class="Submit" onclick="validoLogin()" value="login" id="submit" name="submit"><br>
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

