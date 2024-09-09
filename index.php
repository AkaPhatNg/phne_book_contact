<?php
require 'database.php';

$query = "SELECT * FROM contacts_table";
$result = $mysqli->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
</head>

<body>
    <h1>Phonebook Contacts</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['phone_number'] ?></td>
                <td><a href="edit_contact.php?id=<?= $row['id'] ?>">Edit</a></td>
                <td><a href="delete_contact.php?id=<?= $row['id'] ?>">Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="add_contact.php">Add New Contact</a>
</body>

</html>