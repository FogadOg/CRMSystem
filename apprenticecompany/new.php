<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newCompany"])) {
    require "../connection.php";

    $companyName = $_POST["companyName"];
    $query = "INSERT INTO `apprenticecompany` (`Id`, `Name`) VALUES (NULL, '$companyName')";
    $result = $connection -> query($query);

    if ($result === TRUE) {
        header("Location: ../index.php");
        exit();

    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    // Close the database connection
    $connection->close();
}
?>

<form method="post">
    <h1>Create new company</h1>
    <label for="companyName">Company Name:</label>
    <input type="text" id="companyName" name="companyName" required>
    <br>
    <input type="submit" name="newCompany">
</form>