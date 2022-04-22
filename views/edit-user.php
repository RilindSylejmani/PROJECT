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
<div class="all-information">
<?php
    if(isset($_SESSION['role']) && $_SESSION['role']==1){
?>
    <form class = "edit" method="POST">
        <link rel="stylesheet" href="../Css/edit-user.css">
    Name:
    <input type="text" placeholder="Name" class="name" name='name' value="<?php echo $currentUser['name']; ?>">
    <br><br>
    Surname:
    <input type="text" class="surname" name='surname' value="<?php echo $currentUser['surname']; ?>">
    <br><br>
    Dateofbirth:
    <input type="date" class="dateofbirth" name='dateofbirth' value="<?php echo $currentUser['dateofbirth']; ?>">
    <br><br>
    Username:
    <input type="text" class="username" name='username' value="<?php echo $currentUser['username']; ?>">
    <br><br>
    Email:
    <input type="email" class="email" name='email' value="<?php echo $currentUser['email']; ?>">
    <br><br>
    Role:
    <input type="number" class="user-role" name="user_role" value="<?php echo $currentUser['user_role'];?>">

    <input type="submit" class="submit" name="submit" value="Update">

    </form>
<?php
    }
?>
</div>
<style>

    .all-information{
        position: relative;
  background-color: #ffffff;
  width: 400px;
  /* height: 320px; */
  margin: 5em auto;
  border-radius: 1.5em;
  /* box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14); */
  margin-left: auto;
  margin-right: auto;
    }

    .name {
        
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  /* border-radius: 20px; */
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 64px;
  text-align: center;
  margin-bottom: 27px;
    }

.surname{
    
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  /* border-radius: 20px; */
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 46px;
  text-align: center;
  margin-bottom: 27px;
}

.dateofbirth{
    
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  /* border-radius: 20px; */
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 28px;
  text-align: center;
  margin-bottom: 27px;
width:238px;
}

.username{
    
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  /* border-radius: 20px; */
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 37px;
  text-align: center;
  margin-bottom: 27px;
}

.email{
    
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  /* border-radius: 20px; */
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 64px;
  text-align: center;
  margin-bottom: 27px;
}

.user-role{
  
  color: rgb(38, 50, 56);
  font-weight: 700;
  font-size: 14px;
  
  background: rgba(136, 126, 126, 0.04);
  padding: 10px 20px;
  border: none;
  /* border-radius: 20px; */
  outline: none;
  box-sizing: border-box;
  border: 2px solid rgba(0, 0, 0, 0.02);
  margin-bottom: 50px;
  margin-left: 72px;
  text-align: center;
  margin-bottom: 27px;
}

.submit{
    margin-top: 50px;
    margin-left: 149px;
    width: 93px;
    height: 34px;
}
</style>
