<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai1_lab4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Pobrać zawartość tabeli questions
    $sth = $conn->prepare("SELECT id, email, offers, budget, comment FROM questions");
$sth->execute();

$results = $sth->fetchAll();
    

} catch (PDOException $e) {
    echo "Fail: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="pl">
  <head>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zad2</title>
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div id="inne" class="container mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-8">
                <h2>Zapytania o ofertę</h2>
                <!-- Wygenerować tabelkę HTML zawierającą wcześniej pobrane dane -->
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">email</th>
                            <th scope="col">offers</th>
                            <th scope="col">budget</th>
                            <th scope="col">comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $t): ?>
                            <tr>
                            <td scope="row"><?php print($t['id'])?></td>
                            <td scope="row"><?php print($t['email'])?></td>
                            <td scope="row"><?php print($t['offers'])?></td>
                            <td scope="row"><?php print($t['budget'])?></td>
                            <td scope="row"><?php print($t['comment'])?></td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div> 
    <script src="js/bootstrap.bundle.js"></script>
  </body>
</html>