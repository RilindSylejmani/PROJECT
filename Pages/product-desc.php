<html>
<head>
     
    
    
    <style>
  
  .sub-products{
    margin-top:200px;
    
}
.imagesss{
    display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-around;
  margin: auto;
}

.imagesss img{
    width:200px;
        height:200px;
}

.price{
    text-align:center;
    padding-top:100px;
}

.pershkrimi{
    max-width:400px;
    padding-top:100px;
    margin-left:650px;
    text-align:center;
}

/* .pershkrimi h3 {
    text-align:center;
} */

.linee{
    
    border-bottom:3px solid rgb(247, 139, 139);
    width:90%;
    margin-left:65px;
    border-radius:20px;
    
}

.buy-now{
    text-align:center;
    
}

.buy-now1 {
    margin-top: 18px;
    padding: 10px;
    width:110px;
    margin-bottom:50px;
    background-color:rgb(247, 139, 139);
    color:black;
}

.buy-now1:hover {
    background-color:black;
    color: rgb(247, 139, 139)
}
    
    </style>
    
</head>

<?php
    require_once '../Components/header1.php'
    ?>

<?php
require_once '../controllers/MenuController.php';

?>

<?php 


    $currentProduct = new MenuController;
    if(isset($_GET['id'])){
        $productId = $_GET['id'];
    }

    $productDetail = $currentProduct->edit($productId);

?>



    <?php
    echo '
    <div class="sub-products">
        <div class="imagesss">
        <img src="'.$productDetail['menu_image1'].'">
        <img src="'.$productDetail['menu_image2'].'">
        </div>

        <div class="price">
        <h2> Price : ' .$productDetail['menu_price'].'$</h2>
        </div>
        <br>
        <br>
        <div class="linee"></div>
        <div class="pershkrimi">
        <h2> About Product <br> <br>'.$productDetail['menu_body'].'</h2>
        </div>
        <div class="buy-now">
        <button class="buy-now1">Buy Now!</button>
        </div>
    </div>
    '
    ?>

    <div class="products-bottom-border"></div>
   
    
</div>
</html>