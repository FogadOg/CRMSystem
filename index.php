<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lærling bedrifter</title>
    <link rel="stylesheet" href="style/style.css">
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

    ?>
    <table>
        <tr>
            <th>Company ID</th>
            <th>Name</th>
        </tr>

        <?php
        foreach($companies as $company) {
            echo "<tr>";
            echo "<td>".$company["Id"]."</td>"; 
            echo "<td>".$company["Name"]."</td>"; 
            // echo "<td>".slettKnapp($annsatt["id"]).oppdaterKnapp($annsatt["id"])."</td>";
            echo "</tr>";
        }?>

    </table>
</body>
</html>
