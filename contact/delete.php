<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteContact"])) {
    require "../connection.php";

    $contactId = $_POST["contactId"];
    // Checking if id exits
    $checkQuery = "SELECT * FROM ContactPerson WHERE id = $contactId";
    $result = $connection->query($checkQuery);
    $contactPerson = $result -> fetch_assoc();

    if ($contactPerson == null){
        echo "Contact person not found with id: ".$contactId;
        exit();
    }

    $query = "DELETE FROM ContactPerson WHERE id = '$contactId'";

    $result = $connection -> query($query);

    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    // Close the database connection
    $connection->close();
} else{
    header("Location: ../index.php");
    exit();
}


?>