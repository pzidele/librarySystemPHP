 <?php 
session_start(); // start session on eevry page
$sitename = 'School Library';
$pagetitle;
?>

<!DOCTYPE html>

<html>
    <head> 
        <meta charset="UTF-8">
        <?php
            

            if(isset($pagetitle)){
                ?>
        <title><?php echo $pagetitle?> | <?php echo $sitename?></title>
                 <?php            } 
            else { ?> 
                        <title><?php echo $sitename?></title>
                <?php
            }
        ?>
        
        <link rel="stylesheet" href="styles.css" type="text/css" />

        <link rel="icon" type="image/png" href="images/logo.png">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

        <nav>
            <div> 
                <ul id="menu">
                    <li class="logo">
                        <a class="logo" href="index.php">
                            <img src ="images/logo.png" class="img-responsive" width="150" height="100" alt="School Library Logo">
                        </a>
                    </li>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="programs.php">Programs</a></li>
                    <li><a href="events.php">Events</a></li>


                    <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<li><a href='search.php'>Search Books</a></li>";
                        echo "<li><a href='profile.php'>My Account</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                    } else {
                        echo "<li><a href='signup.php'>Sign Up</a></li>";
                        echo "<li><a href='login.php'>Log In</a></li>";
                    }
                    ?>

                </ul>
            </div>
        </nav>

        <div id="page-content">
