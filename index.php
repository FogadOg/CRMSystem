<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>Lærling Bedrift</h1>

    <?php
        require "components/company.php";
        $company = new Company(1, "name");
        $companyContacts = $company->getAllContactPersons();
    ?>
    <table>
        <tr>
            <th>Email</th>
            <th>Phone</th>
            <th>Name</th>
            <th>Position</th>
            <th>Company ID</th>
        </tr>
        <?php foreach ($companyContacts as $dict): ?>
            <tr>
                <?php foreach ($dict as $value): ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
