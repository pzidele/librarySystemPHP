<?php
$pagetitle = 'My Account';
include_once "header.php"
?> 

<?php
require('includes/dbh.inc.php');
$user = $_SESSION["useruid"];
// create query
$query = "SELECT * FROM userinformation where usersUID = '$user'";

// get result
$result = mysqli_query($conn, $query);
// fetch data
$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free result
mysqli_free_result($result);

foreach ($info as $userinfo) :
    ?>
    <div class="well">
        <h3><?php echo $userinfo['usersName']; ?></h3>
        <small>
            <?php echo $userinfo['usersUID']; ?> </small>
        <p><?php echo $userinfo['usersEmail']; ?></p>

    </div>
<?php endforeach; ?>

<?php
// display my holds
echo "<h3>My Holds</h3>";
$userid = $userinfo['usersID'];
$query2 = "select * from books inner join booksonhold on booksonhold.BookID = books.BookID && userID = '$userid';";
$result2 = mysqli_query($conn, $query2);
// fetch data
$info2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
// free result
mysqli_free_result($result2);

if (!empty($info2)) {
    foreach ($info2 as $userinfo) :
        ?>
        <div class="well">
            <h4><?php echo $userinfo['Title']; ?></h4>
            <h5> By 
                <?php echo $userinfo['Author']; ?> </h5>
            <p><?php echo "Genre: " . $userinfo['Genre']; ?></p>
            <p><?php echo "Pick up by: " . $userinfo['pickupDate'] ?></p>



        </div>
        <?php
    endforeach;
} else {
    echo "<p>You have no holds yet. <a href='search.php'>Search for books</a> to place a hold!</p>";
}
// close connection
mysqli_close($conn);

include_once 'footer.php';
