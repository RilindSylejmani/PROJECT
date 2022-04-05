<head>
    <!-- <link rel="stylesheet" type="text/css" href="../Components/header.css"> 
    <link rel="stylesheet" type="text/css" href="../CSS/firstPage.css">  -->
</head>

<style>

 .mySlides {
    display: none
}

.Photo {
    vertical-align: middle;
    height: 400px;
    width: 100%;
}

.slideshow-container {
    position: absolute;
    
    width: 73%;
    height: 382px;
    
    left: 253px;
    top: 166px;
}

.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    background-color: black;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover,
.next:hover {
    background-color: white;
    color: black;
}

.firstLine {
    position: absolute;
    top: 100px;
} 

/* -------------------------------- */

.rows{
        margin-left:50px;
        margin-top:50px;
        padding-bottom:90px;
    }
    
    .row1 {
        
        height: 300px;
        width: 280px
        }
    .row1:hover {
        border: 3px solid rgb(247, 139, 139);
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
        margin-top:148px;
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
  margin-top:515px;
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
        max-width: 1319px;
  margin: auto;
  padding-left: 25px;
  padding-right: 25px;
    }

</style>



<?php
require_once '../controllers/MenuController.php';
//  require_once '../Components/header.php';
?>

<div class="slideshow-container">

                
                <a href="Clothes.php">
                    <div class="mySlides fade">

                        <img class="Photo" src="https://339621-1046748-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/IS_Website_Cat_Banners_0421_FA_01_03_Desktop.jpg" style=" width:100% ">

                    </div>
                </a>

                
                <a href="Clothes.php">
                    <div class="mySlides fade">

                        <img class="Photo" src="https://339621-1046748-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/IS_Website_Cat_Banners_0421_FA_01_12_Desktop.jpg" style=" width:100% ">

                    </div>
                </a>

                
                <a href="Toys.php ">
                    <div class="mySlides fade ">

                        <img class="Photo " src="https://339621-1046748-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/IS_Website_Cat_Banners_0421_FA_01_18_Desktop.jpg" style="
                            width:100% ">

                    </div>
                </a>

                
                <a href="Sportstech.php">
                    <div class="mySlides fade ">

                        <img class="Photo " src="https://339621-1046748-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/IS_Website_Cat_Banners_0421_FA_01_23_Desktop.jpg" style="
                            width:100% ">

                    </div>
                </a>

                <a class="prev " onclick="plusSlides(-1) ">&#10094;</a>
                <a class="next " onclick="plusSlides(1) ">&#10095;</a>

            </div>

            <script src="../JS/slider.js"></script> 

            <?php
    require_once '../Components/header1.php'
    ?>


             <div class="categories">
    <div class ="rowss">
    <?php
    $firstPageProducts = new MenuController;
    $allFirstPageProducts = $firstPageProducts->readMainProducts();
    foreach($allFirstPageProducts as $firstPageProducts) {
        echo ' 
        <div class="rows">
            <div class="row1">
                <div class = "square1">
                <div class="imagess">
                <img src="' .$firstPageProducts['menu_image'].'">
                </div>

                <div class="buy-now">
                <button>Click here!</button>
                </div>
                
                
                <div class="name">'. $firstPageProducts['menu_name'].'</div>
                </div>

                
            </div>
        </div>
        
        ';

    }
    ?>
    </div>
    </div> 
