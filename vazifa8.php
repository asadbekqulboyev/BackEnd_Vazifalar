<?php  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vazifa 8</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
$players = file('players.txt', FILE_IGNORE_NEW_LINES);
?>
<div class="container">
    <div class="row">
    <div class="col-md-12 mx-auto"> 
    <form method="POST" action="" class="w-100">
    <label for="player">Futbolchini tanlang:</label>
    <select name="player" id="player" class="form-control">
        <?php foreach ($players as $player): ?>
            <option value="<?= $player ?>"><?= $player ?></option>
        <?php endforeach; ?>
    </select>
    <label for="team">Jamoani tanlang:</label>
    <select name="team" id="team" class="form-control">
        <option value="churvaqalar">Churvaqalar</option>
        <option value="chuvalchanglar">Chuvalchanglar</option>
    </select>
    <button class="btn btn-secondary mt-2">Qo'shish</button>
     </form>


<?php
// Jamoalarga ajratilgan futbolchilarni o'qish
$churvaqalar = file('churvaqalar.txt', FILE_IGNORE_NEW_LINES);
$chuvalchanglar = file('chuvalchanglar.txt', FILE_IGNORE_NEW_LINES);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['player']) && !empty($_POST['team'])) {
    $selectedPlayer = $_POST['player'];
    $selectedTeam = $_POST['team'];

    if ($selectedTeam == 'churvaqalar') {
        file_put_contents('churvaqalar.txt', $selectedPlayer . PHP_EOL, FILE_APPEND);
    } else {
        file_put_contents('chuvalchanglar.txt', $selectedPlayer . PHP_EOL, FILE_APPEND);
    }

    // players.txt dan o'chirish
    $updatedPlayers = array_filter($players, function($player) use ($selectedPlayer) {
        return $player !== $selectedPlayer;
    });

    file_put_contents('players.txt', implode(PHP_EOL, $updatedPlayers));

    // Jamoalarga ajratilgan futbolchilarni yangilash
    $churvaqalar = file('churvaqalar.txt', FILE_IGNORE_NEW_LINES);
    $chuvalchanglar = file('chuvalchanglar.txt', FILE_IGNORE_NEW_LINES);
}

// Futbolchilarni jadvalga chiqarish
echo "<h2>Churvaqalar</h2>";
echo "<table border='1' class='table table-hover mt-5'>";

echo "<tr><th>Ismlar</th></tr>";

foreach ($players as $player) {
    echo "<tr><td>$player</td></tr>";
}

echo "</table>";

// Churvaqalar jadvali
echo "<h2>Churvaqalar</h2>";
echo "<table border='1' class='table table-hover'>";
echo "<tr><th>Ismlar</th></tr>";

foreach ($churvaqalar as $player) {
    echo "<tr><td>$player</td></tr>";
}

echo "</table>";

// Chuvalchanglar jadvali
echo "<h2>Chuvalchanglar</h2>";
echo "<table border='1' class='table table-hover'>";
echo "<tr><th>Ismlar</th></tr>";

foreach ($chuvalchanglar as $player) {
    echo "<tr><td>$player</td></tr>";
}

echo "</table>";
?>
        </div>
        </div>
</body>
</html>