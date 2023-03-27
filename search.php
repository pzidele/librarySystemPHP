<style>
    th {
        width: 150px;
        text-align:left;
    }
</style>
<?php
$pagetitle = 'Search Books';
include_once 'header.php';
require 'includes/dbh.inc.php';
?>

<h1>Book Search</h1>  

<p>Search for books by author, genre or title, or <a href="books.php">View All Books</a></p>
<form method ="post" action ="search.php">
    <input type ="hidden" name ="submitted" value ="true"/>

    <label>Search Category:
        <?php
        // table called category 
        // take the values 
        // create query
        $query = 'SELECT * FROM categories';
        // get result
        $result = mysqli_query($conn, $query);
        // fetch data
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // free result
        mysqli_free_result($result);
        // close connection
        mysqli_close($conn);
        ?>

        <select name ="category">

            <?php foreach ($categories as $cat) : ?>
                <div class="well">
                    <option><?php echo $cat['CategoryName']; ?></option>
                </div>
            <?php endforeach; ?>

        </select>
    </label>

    <label>Search Criteria: <input type="text" name = "criteria" /></label>

    <input type ="submit" name="submitform"/>        
</form>


<form method ="post" action ="placehold.php">
    <?php
    if (isset($_POST['submitted'])) {
        require('includes/dbh.inc.php');

        $category = $_POST['category'];
        $criteria = $_POST['criteria'];
        $query = "SELECT * FROM Books WHERE $category = '$criteria'";
        $result = mysqli_query($conn, $query) or die('error getting data');

        echo "<table>";
        echo "<tr> <th>Title</th> <th>Author</th> <th>Genre</th> </tr>";

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            echo "<tr><td>";
            echo $row['Title'];
            echo "</td><td>";
            echo $row['Author'];
            echo "</td><td>";
            echo $row['Genre'];
            echo "</td><td>";
            $bookID = $row['BookID'];
            echo "<input type='checkbox' id='hold' name='holds[]' value='$bookID'>"; // value is the bookid
            echo "<label for='hold'>Place Hold</label><br>";
            echo "</td></tr>";
        }
        echo "</table>";

        if ($result->num_rows === 0) {
            // list is empty.
            echo "No results match your search. Search again.";
        }
        else {
            echo "<button type='submit' name='submit' value = 'submit'> Submit!</button>";
        }
    }
    ?>

</form>

<?php
include_once 'footer.php';
