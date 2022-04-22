<?php
    session_start();
    require_once '../controllers/userControllers.php';
?>

<!DOCTYPE html>

<html>
    <head>
    <link rel="stylesheet" href="../Css/userDashboard.css">
    </head>
    <body>
    
        <nav class="navbar">
        <div class="container">
            <div class="logo">
            Admin Page    
            </div>
            <ul class="nav">
            
            </ul>
        </div>
        </nav>
        <h2 class="my-cart">User Dashboard</h2>
        <div class="cart">
            <div class="cart-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Dateofbirth</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edito/Fshij</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $user = new userControllers;
                        $allUsers = $user->readUser();
                        foreach($allUsers as $user):
                    ?>
                        <tr>
                            <td>
                                <?php echo $user['name'] ?>
                            </td>
                            <td>
                                <?php echo $user['surname'] ?>
                            </td>
                            <td>
                                <?php echo $user['dateofbirth'] ?>
                            </td>
                            <td>
                                <?php echo $user['username'] ?>
                            </td>
                            <td>
                                <?php echo $user['email'] ?>
                            </td>
                            <td>
                                <?php echo $user['user_role'] ?>
                            </td>
                            <td><a href="./edit-user.php?id=<?php echo $user['id'];?>">Edit</a></td>
                            <td><a href="./delete-user.php?id=<?php echo $user['id'];?>">Fshij</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a class="redirect" href="../pages/firstPage.php">Go to website</a>
    
        
    
    </body>
</html>
