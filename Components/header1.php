<!--?php
session_start();
?-->
<!DOCTYPE html>

<head></head>

<style>
   
    .header {
        display: flex;
        justify-content: space-between;
        background-color: black;
        text-align: center;
        justify-content: center;
    }
    
    .last-borders ul {
        display: flex;
        justify-content: space-between;
    }
    
    ul li {
        text-decoration: none;
        list-style-type: none;
    }
    
    .last-borders ul li {
        margin-left: 100px;
        list-style-type: none;
        border: 3px solid rgb(247, 139, 139);
        padding: 12px;
        color: white;
        font-size: 26px;
        width: 131px;
        text-align: center;
    }
    
    .last-borders {
        margin-top: 13px;
    }
    
    .navbar {
        margin-top: 12px;
        font-size: 26px;
        color: white;
        margin-left: 50px;
    }
    
    .navbar ul {
        margin-top: -2px;
        margin-left: 50px;
    }
    
    .navbar ul li {
        padding: 25px;
        font-size: 29px;
        width: 150px;
    }
    
    .sub-menu-1 {
        display: none;
        padding-right: 72px;
        padding-left: 42px;
    }
    
    .navbar ul li:hover .sub-menu-1 {
        display: block;
        position: absolute;
        background: rgb(247, 139, 139);
        margin-left: -20px;
    }
    
    .navbar ul li :hover .sub-menu-1 ul {
        display: block;
        margin: 10px;
    }
    
    .navbar ul li:hover .sub-menu-1 ul li {
        width: 150px;
        padding: 10px;
        border-bottom: 1px dotted #fff;
        border-radius: 0;
        text-align: center;
    }
    
    .sub-menu-1 ul {
        margin-left: -36px;
    }
    
    .image img {
        margin-left: 50px;
    }

    h1 {
        text-align:center;
    }

    .last-borders1 ul {
        display: flex;
        
    }
    
    
    .last-borders1 ul li {
        margin-left: 46px;
        list-style-type: none;
        border: 3px solid rgb(247, 139, 139);
        padding: 12px;
        color: black;
        font-size: 17px;
        width: 135px;
        text-align: center;
    }
    
    .last-borders1 {
        margin-top: 13px;
    }
</style>
<!-- -------------------->
<html>

<body>
    

    <?php 
            if(!isset($_SESSION['roli'])){
        ?>  
        <div class="header">

        <div class="image">
            <a href="../Pages/firstPage.php">
            <img src="data:image/png;base64,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"
                width="120px" height="120px">
                </a>
        </div>
            <div class="last-borders">
                <ul>
                    <a href="../Pages/firstPage.php">
                    <li>Home</li>
                    </a>
                    <a href="../AboutUs/about.php">
                    <li>About</li>
                    </a>
                    <a href="../Contact/contact.php">
                    <li>Contact</li>
                    </a>
                    <a href="../views/login.php">
                    <li>Account</li>
                    </a>
                </ul>
            </div>
            </div>

            <h1>Please login if you want to search products</h1>
            
        <?php
            }
        ?>
    <?php
    if(isset($_SESSION['roli'])&& isset($_SESSION['username'])) {
        ?>
     <div class="header">

        <div class="image">
            <a href="../Pages/firstPage.php">
            <img src="data:image/png;base64,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"
                width="120px" height="120px">
                </a>
        </div>
        <div class="navbar">
            <ul>
                <li>Products</a>

                    <div class="sub-menu-1">
                        <ul>
                        <a href="../Pages/Technology.php">
                            <li>Technology</a></li>
                        </a>
                        <a href="../Pages/Clothes.php">   
                            <li>Clothes</a></li>
                        </a>
                        <a href="../Pages/Accessory.php">
                            <li>Accessory</a></li>
                        </a>
                        <a href="../Pages/PetSupplies.php">
                            <li>Pet Supplies</a></li>
                        </a>
                        <a href="../Pages/Fitness.php">
                            <li>Fitness</a></li>
                        </a>
                        <a href="../Pages/Toys.php">
                            <li>Toys</a></li>
                        </a>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
        
        <div class="last-borders">
            <ul>
                <a href="../Pages/firstPage.php">
                <li>Home</li>
                </a>
                <a href="../AboutUs/about.php">
                <li>About</li>
                </a>
                <a href="../Contact/contact.php">
                <li>Contact</li>
                </a>
                <a href="../views/Logout.php">
                <li>log out</li>
                </a>
            </ul>
        </div>
    </div>
   
            <?php
            if ($_SESSION['roli']==1) {
                    ?>
            <div class="last-borders1">
            <ul>
                <a href="../views/userDashboard.php">
                <li>User Dashboard</li>
                </a>
                <a href="../views/menuDashboard.php">
                <li>Product Dashboard</li>
                </a>
            </ul>
            </div>
                <?php
                }
            ?>
    <?php
                }
            ?>

            


</body>
<style>
    
</style>
</html>