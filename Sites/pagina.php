<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>



    <?php
    $user = 'grupo30';
    $password = 'grupo30';
    $databaseName = 'grupo30e2';
    $db = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");

    $query_string = "SELECT * FROM Artistas;";
    $query = $db->prepare($query_string);
    $query->execute();
    $result = $query->fetchAll();
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nacimiento</th>
            <th>Descripcion</th>
        </tr>

        <?php
        foreach ($result as $r) {
            echo "<tr><td>$r[0]</td><</tr>";
        }
        foreach ($result as $r) {
            echo "<tr><td>$r[1]</td><</tr>";
        }
        foreach ($result as $r) {
            echo "<tr><td>$r[2]</td><</tr>";
        }
        foreach ($result as $r) {
            echo "<tr><td>$r[3]</td><</tr>";
        }
        ?>
    </table>



</body>

</html>