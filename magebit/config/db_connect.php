<?php 
$conn = mysqli_connect("localhost", "kristians", "magebit", "magebit");

if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
}
