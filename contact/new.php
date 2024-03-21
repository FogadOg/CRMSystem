<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newContact"])) {
    require "../connection.php";

    $contactEmail = $_POST["contactEmail"];
    $contactNumber = $_POST["contactNumber"];
    $contactName = $_POST["contactName"];
    $contactPosition = $_POST["contactPosition"];
    $contactCompany = $_POST["contactCompany"];

    $query = "INSERT INTO `contactperson` (`Id`, `Email`, `Phonenumber`, `Name`, `Position`, `Lærlingsbedrift_ID`) VALUES (NULL, '$contactEmail', '$contactNumber', '$contactName', '$contactPosition', '$contactCompany')";
    $result = $connection -> query($query);

    if ($result === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    // Close the database connection
    $connection->close();
}
?>

<form method="post">
    <h1>Create new contact</h1>
    <label for="contactEmail">Contact email:</label>
    <input type="text" id="contactEmail" name="contactEmail" required>
    <br>

    <label for="contactNumber">Contact phone number:</label>
    <input type="text" id="contactNumber" name="contactNumber" required max="12">
    <br>

    <label for="contactName">Contact name:</label>
    <input type="text" id="contactName" name="contactName" required>
    <br>

    <label for="contactPosition">Contact position:</label>
    <input type="text" id="contactPosition" name="contactPosition" required>
    <br>

    <label for="contactCompany">Contact company:</label>
    <select name='contactCompany' id='contactCompany'>";
        <?php
            require "../connection.php";
            $query = "SELECT * FROM apprenticecompany";
            $result = mysqli_query($connection, $query);
            $companies = $result -> fetch_all(MYSQLI_ASSOC);
            foreach($companies as $company) {
                echo "<option value=".$company["Id"].">".$company["Name"]."</option>";
            }
        ?>
    </select>
    <br>

    <input type="submit" name="newContact">
</form>