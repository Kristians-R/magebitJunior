<?php

include "db_connect.php";

if (isset($_POST['submit'])) {
    $searchValue = $_POST['search'];

    if ($conn->connect_error) {
        echo "connection Failed: " . $conn->connect_error;
    } else {
        $search = "SELECT * FROM email WHERE email LIKE '%$searchValue%'";

        $result = $conn->query($search);
        while ($row = $result->fetch_assoc()) {
            echo $row['email'] . "<br>";
        }
    }
}
