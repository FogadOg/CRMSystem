<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newCompany"])) {
    require "../connection.php";

    $companyName = $_POST["companyName"];
    $query = "INSERT INTO `ApprenticeCompany` (`Id`, `Name`) VALUES (NULL, '$companyName')";
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
      <h1>Leg til bedrift</h1>
    
      <div class="form-group">
        <label for="companyName">Bedrift navn</label>
        <input type="text" class="form-control" id="companyName" name="companyName" required>
      </div>
      
    
      
      <input class="btn btn-primary" value="Ferdig" type="submit" name="newCompany">
    </form>
</div>


