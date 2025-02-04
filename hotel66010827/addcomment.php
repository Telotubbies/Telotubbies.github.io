<?php
// Connect to server and select database.
// Connect to server and select database.
include("config.php");

$datetime=date("y-m-d h:i:s"); //date time
        
$sql="INSERT INTO guestbook (name,email,comment,datetime)VALUES('".$_POST["name"]."','".$_POST["email"]."' ,'".$_POST["comment"]."','$datetime')";

$objQuery = mysqli_query($objCon,$sql);

// Check if query is successful
if ($objQuery) {
    echo "Successful";
    echo "<br>";
    // Link to view guestbook page
    echo "<a href='viewguestbook.php'>View guestbook</a>";
} else {
    echo "ERROR: " . mysqli_error($objCon); // Show detailed error
}

mysqli_close($objCon); // Close the connection
?>
