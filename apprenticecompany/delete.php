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
}
?>

<?php
function deleteForm($companyId ){
return "<form method='post' action='/apprenticecompany/delete.php'>
            <input type='hidden' name='companyId' value='<?php echo $companyId; ?>' >
            <input type='submit' name='deleteCompany' value='delete'>
        </form>";
}
?>
