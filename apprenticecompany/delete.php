<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteCompany"])) {
    require "../connection.php";

    $companyId = $_POST["companyId"];
    // Checking if id exits
    $checkQuery = "SELECT * FROM apprenticecompany WHERE id = $companyId";
    $result = $connection->query($checkQuery);
    $company = $result -> fetch_assoc();

    if ($company == null){
        echo "Company not found with id: ".$companyId;
        exit();
    }
    
    $query = "DELETE FROM contactperson WHERE Lærlingsbedrift_ID = $companyId";
    $result = $connection -> query($query);

    if (!$result) {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    $query = "DELETE FROM apprenticecompany WHERE id = '$companyId'";
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