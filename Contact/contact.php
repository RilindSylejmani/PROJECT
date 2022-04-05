<head>
      
</head>

<style>
.contact-form{
    margin-top:196px;
    text-align:center;
}

.first-name {
    width:300px;
    height:50px;
}
.username{
    padding-top:50px;
    padding-bottom:50px;
}
.your-email {
    width:300px;
    height:50px
}
.emaili {
    padding-bottom:50px;
}
/* .your-comment {
    width:300px;
    height:50px
} */

.send-button{
    margin-top:50px;
}
.buttonn {
    width:85px;
    height:36px;
}
</style>

<body>

 <?php
     require_once '../Components/header1.php';
    ?> 

 <?php
  
 require_once '../controllers/MenuController.php';
 
 $contact = new MenuController;
 if(isset($_POST['submit'])){
    //  $contact->sendMessages($_POST);

    $errors=[];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    if(empty($name) || empty(trim($name)) || empty($email) || empty($comment)) {
        array_push($errors, 'Ploteso te gjitha fushat!');
        $_SESSION['errors'] = $errors;
    } else {
        if  (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, 'Invalid Email');
        } else  if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            array_push($errors, 'Invalid name');
        } else {
            $contact->sendMessages($_POST);
           
        }
    }
    $_SESSION['errors'] = $errors;
 }
 ?>
 
  <!-- <div>
     <form method="POST">
         <input type="text" name="name">
         <br>
         <input type="text" name="email">
         <br>
         <input type="text" name="comment">
        <br>
         <input type="submit" name="submit" value="Save">
     </form>
 </div>  -->
 
    
    
<div class="contact-form">
    <div class="text">
        <h1>Got a question? We'd love to hear from you. Send us a message <br> and we'll respond as sson as possible</h1>
    </div>

<?php if(isset($_SESSION["errors"]))
    foreach($_SESSION["errors"] as $error)
        echo '<p class= "error">' .$error. '</p>';
        ?>

    <form method="POST">
    <div class="information-block">
        <div class="username">
        <input class="first-name" type="text" placeholder="Name" name="name">
        </div>
        <div class="emaili">  
        <input class="your-email" type="email" placeholder="Email" name="email">
        </div>
        <div class="commentt"> 
        <textarea class="your-comment" name="comment" id="" cols="30" rows="10"></textarea>   
    </div> 
        <div class="send-button">
        <button  class="buttonn" type="submit" name="submit" value="Send">Send</button>
        </div>
    </div>
    </form>
    
</div>

</body>