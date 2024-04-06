<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateCompany"])) {
    require "../connection.php";

    $companyName = $_POST["companyName"];
    $companyId = $_POST["companyId"];

    $query = "UPDATE ApprenticeCompany SET Name = '$companyName' WHERE id = '$companyId'";

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
    $query = "SELECT * FROM ApprenticeCompany WHERE id = '$companyId'";
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

    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
    echo '
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
    </style>';
    echo "
    <div class='formContainer'>
    <form method='post'>
        <h1>Update company</h1>
        <input type='hidden' name='companyId' value=".$companyId.">
        <label for='companyName'>Company Name:</label>
        <input type='text' class='form-control' id='companyName' name='companyName' value=".$companyName." required>
        <br>
        <input class='btn btn-primary' type='submit' name='updateCompany'>
        </form>
        </div>";
}



?>