<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lærling bedrifter</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>Lærling Bedrift</h1>

    <?php
        require "connection.php";
        require "components/company.php";
        $company = new Company(1, "name");

        $query = "SELECT * FROM apprenticecompany";
        $result = $connection -> query($query);
        $companies = $result -> fetch_all(MYSQLI_ASSOC);

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
        require "apprenticecompany/forms.php";
        foreach($companies as $company) {
            echo "<tr>";
            echo "<td>".$company["Id"]."</td>"; 
            echo "<td>".$company["Name"]."</td>"; 
            echo "<td>
                <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton_".$company["Id"]."' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        View
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton_".$company["Id"]."'>";
                        $contactPersonsQuery = "SELECT * FROM contactperson WHERE Lærlingsbedrift_ID = '".$company["Id"]."'";
                        $contactPersonsResult = mysqli_query($connection, $contactPersonsQuery);
                    
                        if (mysqli_num_rows($contactPersonsResult) > 0) {
                            while ($contactPerson = mysqli_fetch_assoc($contactPersonsResult)) {
                                echo "<a class='dropdown-item' href='#'>".$contactPerson["Name"]."</a>";
                            }
                        } else {
                            echo "<span class='dropdown-item'>No contact persons found</span>";
                        }

            echo "</div>
                </div>
            </td>";
            echo "<td>".deleteForm($company["Id"]);
            echo updateForm($company["Id"])."</td>";
            echo "</tr>";
        }?>

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
        </tr>

        <?php
        foreach($contactPersons as $contactPerson) {
            echo "<tr>";
            echo "<td>".$contactPerson["Id"]."</td>"; 
            echo "<td>".$contactPerson["Email"]."</td>"; 
            echo "<td>".$contactPerson["Phonenumber"]."</td>"; 
            echo "<td>".$contactPerson["Position"]."</td>"; 
            echo "<td>".$contactPerson["Name"]."</td>"; 
            echo "<td>".$contactPerson["Lærlingsbedrift_ID"]."</td>"; 
            echo "</tr>";
        }?>

    </table>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
