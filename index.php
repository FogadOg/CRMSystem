<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laerling bedrifter</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    <h1>Laerling Bedrift</h1>
    <h1>Jeg skjønner ingenting!</h1>

    <?php
        require "connection.php";
        require "components/company.php";
        require "components/contactPerson.php";
        require "apprenticecompany/forms.php";

        if (isset($_GET["company"])) {
            $companyFilter = $_GET["company"];
        } else {
            $companyFilter = "";
        }

        $query = "SELECT * FROM apprenticecompany";
        $result = $connection -> query($query);

        $companies = [];
        foreach ($result -> fetch_all(MYSQLI_ASSOC) as $company) {
            $id = $company['Id'];
            $name = $company['Name'];
            
            $company = new Company($id, $name);
            $companies[] = $company;
        }
        

        $query = "SELECT * FROM contactperson";
        $result = $connection -> query($query);
        $contactPersons = $result -> fetch_all(MYSQLI_ASSOC);

    ?>
    <table>
        <tr>
            <th>Company ID</th>
            <th>Name</th>
            <th>Contact Person</th>
            <th>Actions</th>
        </tr>

        <?php
            foreach($companies as $company) {
                $company -> render();
            }
        ?>

    </table>

<?php echo createForm(); ?>

    <table>
        <tr>
            <th>Contact preson ID</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Position</th>
            <th>Name</th>
            <th>Company id</th>
            <th>Actions</th>
        </tr>

        <?php
        require "contact/forms.php";

        foreach($contactPersons as $contactPerson) {
            $id = $contactPerson["Id"]; 
            $email = $contactPerson["Email"]; 
            $phonenumber = $contactPerson["Phonenumber"]; 
            $position = $contactPerson["Position"]; 
            $name = $contactPerson["Name"]; 
            $companyId = $contactPerson["Laerlingsbedrift_ID"]; 

            $contactPerson = new ContactPerson($id, $email, $phonenumber, $position, $name, $companyId);
            $contactPerson -> render($companyFilter);

        }?>

    </table>

<?php echo contactCreateForm(); ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
