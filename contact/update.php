<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateContact"])) {
    require "../connection.php";

    $contactEmail = $contactPerson["contactEmail"];
    $contactNumber = $contactPerson["contactNumber"];
    $contactName = $contactPerson["contactName"];
    $contactPosition = $contactPerson["contactPosition"];
    $contactCompany = $contactPerson["contactCompany"];

    $query = "UPDATE contactperson SET Email = '$companyEmail', Phonenumber = '$contactNumber', Name = '$contactName', Position = '$contactPosition', Laerlingsbedrift_ID = 'contactCompany' WHERE id = '$companyId'";

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

    $contactId = $_GET['id'];
    $query = "SELECT * FROM ContactPerson WHERE id = '$contactId'";
    $result = $connection -> query($query);

    //? Trenger vi denne? Kun for sql skrive feil
    if (!$result){
        echo "Error: " . $query . "<br>" . $connection->error;
        exit();
    }

    // Fetch assoc because only one result
    $contactPerson = $result -> fetch_assoc();

    if ($contactPerson == null){
        echo "Conatct person not found with id: ".$contactId;
        exit();
    }

    $contactEmail = $contactPerson["Email"];
    $contactNumber = $contactPerson["Phonenumber"];
    $contactName = $contactPerson["Name"];
    $contactPosition = $contactPerson["Position"];
    $contactCompany = $contactPerson["Laerlingsbedrift_ID"];


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

    <h1>Update contact</h1>
    <input type='hidden' name='companyId' value=".$contactId.">

    <label for='contactEmail'>Contact email:</label>
    <input type='text' class='form-control' id='contactEmail' name='contactEmail' value=".$contactEmail." required>
    <br>

    <label for='contactNumber'>Contact phone number:</label>
    <input type='text' class='form-control' id='contactNumber' name='contactNumber' value=".$contactNumber." required max='12'>
    <br>

    <label for='contactName'>Contact name:</label>
    <input type='text' class='form-control' id='contactName' name='contactName' value=".$contactName." required>
    <br>

    <label for='contactPosition'>Contact position:</label>
    <input type='text' class='form-control' id='contactPosition' name='contactPosition' value=".$contactPosition." required>
    <br>

    <label for='contactCompany'>Contact company:</label>
    <select name='contactCompany' id='contactCompany'>";

            require "../connection.php";
            $query = "SELECT * FROM ApprenticeCompany";
            $result = mysqli_query($connection, $query);
            $companies = $result -> fetch_all(MYSQLI_ASSOC);
            foreach($companies as $company) {
                if ($contactCompany == $company["Id"]) {
                    echo "<option value=".$company["Id"]." selected>".$company["Name"]."</option>";
                }else{
                    echo "<option value=".$company["Id"].">".$company["Name"]."</option>";
                }
            }

    echo "</select> 
    <br>

    <input type='submit' class='btn btn-primary' name='updateContact'>
    
    </form>
    </div>";

}



?>