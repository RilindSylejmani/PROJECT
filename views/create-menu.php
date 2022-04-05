<head>
    
</head>
<?php 
require_once '../controllers/MenuController.php';

$menu = new MenuController;
if(isset($_POST['submit'])){
    $menu->insert($_POST);
}
?>
<div class="title-form">
    <h1>Add Products</h1>
</div>
<div class="create-form">
    <form method="POST">
        Main Image:
        <input class="file-image" type="file" name="image">
        <br>
        Product Name:
        <input class="text-name" type="text" name="name">
        <br>
        Price:
        <input class="text-price" type="text" name="price">
        <br>
        
        <textarea class="textarea-body" name="body"  cols="30" rows="10" placeholder="About Product"></textarea>
        <br>
        Choose Category:
        <select name="category" id="category">
            <option selected disabled hidden>Select a category</option>
            <option value="Main">Main</option>
            <option value="Technology">Technology</option>
            <option value="Clothes">Clothes</option>
            <option value="Accessory">Accessory</option>
            <option value="Pet supplies">Pet supplies</option>
            <option value="Fitness">Fitness</option>
            <option value="Toys">Toys</option>
        </select>
        <br>
        Image Description:
        <input class="file-image1" type="file" name="image1">
        <br>
        Image Description
        <input class="file-image2" type="file" name="image2">
        <br>
        <div class="subimt-form">
        <input class="submit-save" type="submit" name="submit" value="Save">
        </div>
    </form>

</div>

<style>
    .create-form{
        border:15px solid blue;
        width:500px;
        padding-left:227px;
        padding-right:92px;
        padding-top:73px;
        padding-bottom:51px;
        margin-left:450px;
        margin-top:91px;

    }
    .file-image{
        margin-bottom:20px;
        margin-left:68px;
    }
    .text-name {
        margin-bottom:20px;
        margin-left:54px;
    }
    .text-price{
        margin-bottom:20px;
        margin-left:112px;
    }
    .textarea-body{
        margin-bottom:20px;
        margin-left:155px;
    }
    #category {
        margin-bottom:20px;
        margin-left:38px;
    }
    .file-image1 {
        margin-bottom:20px;
        margin-left:30px;
    }
    .file-image2 {
        margin-bottom:20px;
        margin-left:36px;
    }
    .submit-save {
        margin-left:183px;
    }
    .title-form{
        text-align:center;
        margin-top:80px;
    }
    .submit-form{
        text-align:center;
    } 
 
</style>