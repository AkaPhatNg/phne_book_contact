<?php
require 'database.php';

if ($mysqli->ping()) {
    echo "Connection is OK!";
} else {
    echo "Error: " . $mysqli->error;
}
?>