<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateCompany"])) {
    require "../connection.php";

    $companyName = $_POST["companyName"];
    $companyId = $_POST["companyId"];

    $query = "UPDATE apprenticecompany SET Name = '$companyName' WHERE id = '$companyId'";

    $result = $connection -> query($query);

    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    // Close the database connection
    $connection->close();
}

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    if (!isset($_GET['id']) && empty($_GET['id'])){
        echo "Invalid empty id";
        exit();
    }

    require "../connection.php";

    $companyId = $_GET['id'];
    $query = "SELECT * FROM apprenticecompany WHERE id = '$companyId'";
    $result = $connection -> query($query);

    //? Trenger vi denne? Kun for sql skrive feil
    if (!$result){
        echo "Error: " . $query . "<br>" . $connection->error;
        exit();
    }

    // Fetch assoc because only one result
    $company = $result -> fetch_assoc();

    if ($company == null){
        echo "Company not found with id: ".$companyId;
        exit();
    }

    $companyName = $company["Name"];

    echo "<form method='post'>
        <h1>Update company</h1>
        <input type='hidden' name='companyId' value=".$companyId.">
        <label for='companyName'>Company Name:</label>
        <input type='text' id='companyName' name='companyName' value=".$companyName." required>
        <br>
        <input type='submit' name='updateCompany'>
        </form>";
}



?>