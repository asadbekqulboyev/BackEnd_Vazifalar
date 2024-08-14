<?
// Haftaning kunlari
$days = ["Dushanba", "Seshanba", "Chorshanba", "Payshanba", "Juma", "Shanba", "Yakshanba"];

// Oylari
$months = ["Yanvar", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avgust", "Sentabr", "Oktabr", "Noyabr", "Dekabr"];
require_once('./section/header.php')

?>

<div class="continer">
<div class="row">
    <div class="col-md-6 mx-auto">
    <?php 
    echo "<h2>Haftaning kunlari</h2>";
    echo "<table>";
    echo "<tr><th>#</th><th>Kun nomi</th></tr>";
    for ($i = 0; $i < count($days); $i++) {
        echo "<tr>";
        echo "<td>" . ($i + 1) . "</td>";
        echo "<td>" . $days[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
// Oylari jadvali
echo "<h2>Oylari</h2>";
echo "<table>";
echo "<tr><th>#</th><th>Oy nomi</th></tr>";
for ($i = 0; $i < count($months); $i++) {
    echo "<tr>";
    echo "<td>" . ($i + 1) . "</td>";
    echo "<td>" . $months[$i] . "</td>";
    echo "</tr>";
}
echo "</table>";
    ?>  
    </div>
 </div>
</div>
<?php



// Xatolarni chiqarish uchun funksiya
    function showError($message) {
        echo "<p class='text-align-center d-flex justify-content-center mt-4 color-red'>Error: $message</p>";
    }

    // Formani tekshirish va faylni qabul qilish
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['fileName'])) {
        // Foydalanuvchi tomonidan kiritilgan fayl nomi
        $fileName = $_POST['fileName'];
        // Faylning vaqtinchalik saqlangan joyi
        $fileTempName = $_FILES['file']['tmp_name'];
        // Faylning turi va nomi
        $fileType = $_FILES['file']['type'];

        // Fayl kengaytmasini aniqlash
        $fileExt = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        // Qabul qilingan kengaytmalarni tekshirish
        $allowedExtensions = array('jpg', 'jpeg', 'png');

        if (in_array($fileExt, $allowedExtensions)) {
            // Fayl katalogga saqlanadi
            $destination = "" . $fileName . "." . $fileExt;
            if (move_uploaded_file($fileTempName, $destination)) {
                echo "<p class='text-align-center d-flex justify-content-center mt-4'>Fayl muvaffaqiyatli yuklandi.</p>";
            } else {
                showError("Fayl yuklashda xatolik yuz berdi.");
            }
        } else {
            showError("Faqat jpg, jpeg va png formatdagi fayllarni yuklash mumkin.");
        }
    }
    ?>
    <div class="container">
        
        <div class="row">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="w-100">
        <label for="fileName">Fayl nomi:</label>
        <input type="text" id="fileName" name="fileName" class="form-control" required><br><br>
        <label for="file">Fayl tanlang:</label>
        <input type="file" id="file" name="file" accept="image/jpeg, image/png" class="form-control"><br><br>
        <input type="submit" value="Yuklash" class="btn btn-info">
    </form>
     <form method="post" class="w-100">
        <label for="days">Kunlar soni:</label>
        <input type="number" id="days" name="days" class="form-control" required>
        <label for="direction">Yo'nalish:</label>
        <select id="direction" name="direction" class="form-control">
            <option value="future">Kelajakga</option>
            <option value="past">O'tmishga</option>
        </select>
        <input type="submit" value="Hisoblash" class="btn btn-info">
    </form>        
    </div>
    

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['days'])) {
        $days = intval($_POST['days']);
        $direction = $_POST['direction'];

        $uzbek_weekdays = ["Yakshanba", "Dushanba", "Seshanba", "Chorshanba", "Payshanba", "Juma", "Shanba"];
        $uzbek_months = [
            1 => "Yanvar", 2 => "Fevral", 3 => "Mart", 4 => "Aprel",
            5 => "May", 6 => "Iyun", 7 => "Iyul", 8 => "Avgust",
            9 => "Sentabr", 10 => "Oktabr", 11 => "Noyabr", 12 => "Dekabr"
        ];

        $current_date = new DateTime();

        if ($direction == "future") {
            $current_date->modify("+$days days");
        } else {
            $current_date->modify("-$days days");
        }

        $week_day = $uzbek_weekdays[$current_date->format('w')];
        $month = $uzbek_months[intval($current_date->format('m'))];

        echo "<p calss=''>Kun: " . $week_day . ", Oy: " . $month . "</p>";
    }
    ?>

</body>
</html>