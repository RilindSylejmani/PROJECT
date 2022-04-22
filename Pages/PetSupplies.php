<?php session_start(); ?>
<html>
<head>
     
    
    
    <style>
    .rows{
        margin-left:50px;
        margin-top:50px;
        
    }
    
    .row1 {
        margin-bottom:50px;
        height: 300px;
        width: 280px
        }
    .row1:hover {
        border: 1px solid rgb(247, 139, 139);
    }
    .imagess img{
        width:200px;
        height:200px;
    }
     .imagess{
        padding-top:20px;
        text-align:center;
        
    } 
    .buy-now {
        text-align:center;
        padding-top:20px;
    }
    .name{
        text-align:center;
        padding-top:56px;
        font-size: 30px;
    }

    .technology-border{
        border:2px solid rgb(247, 139, 139);
        width:207px;
        border-radius:20px;
        margin-top:97px;
        margin-left:823px;
    }
    .technology h1{
        text-align:center;
    }
    .rowss{
        display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-around;
  margin: auto;
    }
    
    .products-border {
        border: 1px solid rgb(247, 139, 139);

    }
    .products-bottom-border {
        border-bottom: 10px solid rgb(247, 139, 139);
        width:88%;
        margin-top:91px;
        margin-left:135px;

    }

    
    

    .buy-now button {
        width:100px;
        height:37px;
        background-color:rgb(247, 139, 139);
        color:black;
    } 

    .buy-now button:hover {
        background-color:black;
        color:rgb(247, 139, 139);
    }

    .categories {
    Max-width: 1200px;
    margin: auto; 
    padding-left: 25px;
    padding-right: 25px;
    } 


    
    </style>
    
</head>
<?php
    require_once '../Components/header1.php'
    ?>

<?php
require_once '../controllers/MenuController.php';
// require_once '../Components/header.php'
?>
 <div>
    <div class="technology-border">
    <div class="technology">
        <h1>PET SUPPLIES</h1>
    </div>
    </div>

    

    <div class="categories">
    <div class ="rowss">
    <?php
    $petProducts = new MenuController;
    $allPetProducts = $petProducts->readPetProducts();
    foreach($allPetProducts as $petProducts) {
        echo ' 
        <div class="rows">
            <div class="row1">
                <div class = "square1">
                <div class="imagess">
                <img src="' .$petProducts['menu_image'].'">
                </div>

                <a href="./product-desc.php?id='.$petProducts['id'].'">
                <div class="buy-now">
                <button>Buy now</button>
                </div>
                </a>
                
                <div class="name">'. $petProducts['menu_name'].'</div>
                </div>

                
            </div>
        </div>
        
        ';

    }
    ?>
    </div>
    </div>

    <div class="products-bottom-border"></div>
     
    
</div>
</html>