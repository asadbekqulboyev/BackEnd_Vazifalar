<?php
$students = ['Abduvahob', 'Bobur', 'Shaxriyor', 'Shaxobiddin', 'Sardor', 'Muhammadjon'];
$selected_student = '';
$selected_color = '#00ff00';

    if(!empty($_POST['student'] && $_POST['colorPicker'])){
     $selected_student = $_POST['student'];
    $selected_color = $_POST['colorPicker'];   
    }
    require_once('./section/header.php')

?>

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($students as $student) {
                        $style = $student === $selected_student ? "background-color: $selected_color;" : "";
                        echo "<tr style='$style'><td>$student</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <form method="POST" action="">
            <div class="form-group">
                <label for="studentSelect">Select a student:</label>
                <select class="form-control" id="studentSelect" name="student">
                    <?php
                        foreach ($students as $student) {
                            $selected = $student === $selected_student ? "selected" : "";
                            echo "<option value='$student' $selected>$student</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="colorPicker">Choose background color:</label>
                <input type="color" class="form-control" id="colorPicker" name="colorPicker" value="<?php echo htmlspecialchars($selected_color); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Highlight Student</button>
        </form>
    </div>

    <div class="container mt-5 py-2">
    <h2>Matnni kiritish</h2>
    <form method="post" action="">
        <textarea name="userInput" class="form-control" rows="10" cols="50" placeholder="Matnni kiritishingiz mumkin. Masalan: [qalin]bu qalin matn[/qalin]"></textarea>
        <br>
        <button type="submit" class="btn btn-succes">Yuborish</button>
    </form>

    <?php
    $userInput= '';
    if (!empty( $_POST['userInput'])) {
        $userInput = $_POST['userInput'];
        // Past chiziq
        $userInput = str_replace('[pastchiziq]', '<u>', $userInput);
        $userInput = str_replace('[/pastchiziq]', '</u>', $userInput);

        // Qalin
        $userInput = str_replace('[qalin]', '<b>', $userInput);
        $userInput = str_replace('[/qalin]', '</b>', $userInput);

        // Yotqizilgan
        $userInput = str_replace('[alkash]', '<i>', $userInput);
        $userInput = str_replace('[/alkash]', '</i>', $userInput);

        // O'rtasidan chiziq
        $userInput = str_replace('[orachiziq]', '<s>', $userInput);
        $userInput = str_replace('[/orachiziq]', '</s>', $userInput);

        echo "<h2>Formatlangan matn:</h2>";
        echo "<p>$userInput</p>";
    }
    ?>
    </div>
    <div class="container">
    <?php
    // 1. Stringdan massiv yasash
    $teams_string = "Real Madrid, Barcelona,Juventus,Chelsea";
    $teams_array = array_map('trim', explode(',', $teams_string));

    // 2. Massiv boshidan va ohiridan elementlar qo'shish
    array_unshift($teams_array, "Inter", "Liverpool");
    array_push($teams_array, "Atletico");

    // 3. Massivni jadval ko'rinishida ekranga chiqarish
    echo "<table border='1' width=100% class='mt-5'>";
    echo "<tr><th>#</th><th>Team</th></tr>";
    foreach ($teams_array as $index => $team) {
        echo "<tr><td>" . ($index + 1) . "</td><td>" . $team . "</td></tr>";
    }
    echo "</table>";

    // 4. Massivni stringga aylantirish va H3 tegi ichida chiqarish
    $teams_string_with_separator = implode('-|-', $teams_array);
    echo "<h3 class='mt-5'>$teams_string_with_separator</h3>";
    ?>
    </div>
</body>
</html>