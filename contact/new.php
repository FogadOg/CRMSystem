<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newContact"])) {
    require "../connection.php";

    $contactEmail = $_POST["contactEmail"];
    $contactNumber = $_POST["contactNumber"];
    $contactName = $_POST["contactName"];
    $contactPosition = $_POST["contactPosition"];
    $contactCompany = $_POST["contactCompany"];

    $query = "INSERT INTO `ContactPerson` (`Id`, `Email`, `Phonenumber`, `Name`, `Position`, `Laerlingsbedrift_ID`) VALUES (NULL, '$contactEmail', '$contactNumber', '$contactName', '$contactPosition', '$contactCompany')";
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


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
    .formContainer{
        width: 100%;
        height: 100%;

        display: flex;
        justify-content: center;
        align-items: center;
    }
    .formContainer form{
        width: 30%;
    }
</style>

<div class="formContainer">
    <form method="post">
        <h1>Leg til kontant person</h1>
        <label for="contactEmail">Kontant email</label>
        <input class="form-control" type="text" id="contactEmail" name="contactEmail" required>
        <br>
    
        <label for="contactNumber">Kontant telefon number</label>
        <input class="form-control" type="text" id="contactNumber" name="contactNumber" required max="12">
        <br>
    
        <label for="contactName">Kontant navn</label>
        <input class="form-control" type="text" id="contactName" name="contactName" required>
        <br>
    
        <label for="contactPosition">stilling</label>
        <input class="form-control" type="text" id="contactPosition" name="contactPosition" placeholder="Utvikler/Drift" required>
        <br>
    
        <label for="contactCompany">Kontant bedrift</label>
        <select name='contactCompany' id='contactCompany'>";
            <?php
                require "../connection.php";
                $query = "SELECT * FROM ApprenticeCompany";
                $result = mysqli_query($connection, $query);
                $companies = $result -> fetch_all(MYSQLI_ASSOC);
                foreach($companies as $company) {
                    echo "<option value=".$company["Id"].">".$company["Name"]."</option>";
                }
            ?>
        </select>
        <br>
    
        <input class="btn btn-primary" type="submit" value="Ferdig" name="newContact">
    </form>
</div>


