<?php

include("./config/db_connect.php");
include("./config/search.php");

$sql = "SELECT * FROM email";

$results = mysqli_query($conn, $sql);
$emails = mysqli_fetch_all($results, MYSQLI_ASSOC);

mysqli_free_result($results);

mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" />
    <title>Document</title>
</head>

<body>
    <form action="database.php" method="POST">
        <div class="filter">
            <input type="text" placeholder="Search" name="search">
            <button type="submit" name="submit">Search</button>
        </div>
        <table class=" table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($emails as $email) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($email["id"]); ?></td>
                        <td><?php echo htmlspecialchars($email["email"]); ?></td>
                        <td><?php echo htmlspecialchars($email["created_at"]); ?></td>
                        <td class="del">
                            <a href="./config/delete.php?id=<?php echo $email['id']; ?>">delete</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </form>
</body>

</html>