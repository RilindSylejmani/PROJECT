<?php
    session_start();
    require_once '../controllers/userControllers.php';


$user = new userControllers();
if(isset($_GET['id'])){
    $userId = $_GET['id'];
}

$currentUser = $user->editUser($userId);
    
if(isset($_POST['submit'])){
    $user->updateUser($_POST, $userId);

}
?>

<!--?php
    if(isset($_SESSION['role']) && $_SESSION['role']==1){
?-->
    <form class = "edit" method="POST">
        <link rel="stylesheet" href="../Css/edit-user.css">
    Name:
    <input type="text" name='name' value="<?php echo $currentUser['name']; ?>">
    <br><br>
    Surname:
    <input type="text" name='surname' value="<?php echo $currentUser['surname']; ?>">
    <br><br>
    Dateofbirth:
    <input type="date" name='dateofbirth' value="<?php echo $currentUser['dateofbirth']; ?>">
    <br><br>
    Username:
    <input type="text" name='username' value="<?php echo $currentUser['username']; ?>">
    <br><br>
    Email:
    <input type="email" name='email' value="<?php echo $currentUser['email']; ?>">
    <br><br>
    Role:
    <input type="number" name="user_role" value="<?php echo $currentUser['user_role'];?>">

    <input type="submit" name="submit" value="Update">

    </form>
<!--?php
    }
?-->
