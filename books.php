<?php
$pagetitle = 'Search Books';
include_once "header.php"
?> 

<?php
require('includes/dbh.inc.php');
// create query
$query = 'SELECT * FROM books order by genre';
// get result
$result = mysqli_query($conn, $query);
// fetch data
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result
mysqli_free_result($result);
// close connection
mysqli_close($conn);
?>
<div class="container">

    <h1>Books</h1>


    <form action="placehold.php" method="post">

        <?php foreach ($books as $book) : ?>
            <div class="well">
                <h3><?php echo $book['Title']; ?></h3>
                <small>By 
                    <?php echo $book['Author']; ?> </small>
                <p><?php echo $book['Genre']; ?></p>

                <?php $book['BookID'] ?>
                <?php
                $bookID = $book['BookID'];
                echo "<input type='checkbox' id='hold' name='holds[]' value='$bookID'>"; // value is the bookid
                ?>
                <label for="hold">Place Hold</label><br>

            </div>
        <?php endforeach; ?>

        <button type="submit" name="submit" value = "submit">Submit!</button>
    </form>
</div>
<?php
include_once "footer.php";

