<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $phone_number = trim($_POST['phone_number']);

    if (!empty($name) && !empty($phone_number)) {
        $stmt = $mysqli->prepare("UPDATE contacts_table SET name = ?, phone_number = ? WHERE id = ?");

        $stmt->bind_param("ssi", $name, $phone_number, $id);

        if ($stmt->execute()) {
            echo "Contact updated successfully.";
        } else {
            echo "Error: Could not update contact.";
        }

        $stmt->close();
    } else {
        echo "Please fill in both fields.";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Contact</title>
</head>

<body>
    <h1>Edit Contact</h1>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= $contact['name'] ?>" required><br>
        <label>Phone Number:</label><br>
        <input type="text" name="phone_number" value="<?= $contact['phone_number'] ?>" required><br><br>
        <button type="submit">Save</button>
    </form>
</body>

</html>