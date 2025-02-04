<?php
// Connect to server and select database.
include("config.php");

// Fetch data from the guestbook table
$sql = "SELECT * FROM guestbook ORDER BY datetime DESC"; // Show latest first
$objQuery = mysqli_query($objCon, $sql);

if (!$objQuery) {
    die("Error retrieving data: " . mysqli_error($objCon)); // Error handling
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Guestbook Comments</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Date/Time</th>
    </tr>

    <?php
    while ($rows = mysqli_fetch_assoc($objQuery)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($rows['id']) . "</td>";
        echo "<td>" . htmlspecialchars($rows['name']) . "</td>";
        echo "<td>" . htmlspecialchars($rows['email']) . "</td>";
        echo "<td>" . nl2br(htmlspecialchars($rows['comment'])) . "</td>";
        echo "<td>" . htmlspecialchars($rows['datetime']) . "</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>

<?php
mysqli_close($objCon); // Close database connection
?>
