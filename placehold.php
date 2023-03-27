<?php
$pagetitle = 'Place Hold';
include_once 'header.php';
require('includes/dbh.inc.php');

if (isset($_POST["submit"])) {

    $username = $_SESSION["useruid"];
    $query = "select * from userinformation where usersUID = '$username'"; //rshorser
    // get result
    $result = mysqli_query($conn, $query);
    // result is rshorser
// fetch data
    $info = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($info as $val) {
        $userid = $val['usersID'];
    }


    echo "place hold success";
    echo "<br>";

    $start_date = date('Y-m-d');
    $pickupDate = strtotime($start_date);
    $pickupDate = strtotime("+10 day", $pickupDate);
    $dateStr = date('Y-m-d', $pickupDate);
    $date = strtotime($dateStr);
    $date = date('Y-m-d', $date);

    if (!empty($_POST['holds'])) {

        foreach ($_POST['holds'] as $value) {
            $query = "insert into booksonhold (BookID,UserID,pickupDate) values ($value,$userid,'$date')";
            mysqli_query($conn, $query);

            $query2 = "SELECT * FROM booksonhold inner join books on books.BookID = booksonhold.BookID where books.BookID = '$value'";
            // get result
            $result2 = mysqli_query($conn, $query2);
            // fetch data
            $title = mysqli_fetch_all($result2, MYSQLI_ASSOC);

            foreach ($title as $value) {
                $title2 = $value['Title'];
                echo "Hold submitted for " . $title2;
            }
        }
    }
    else {
        echo "no holds placed";
    }
    mysqli_free_result($result2);
    // close connection
    mysqli_close($conn);
}


include_once 'footer.php';
