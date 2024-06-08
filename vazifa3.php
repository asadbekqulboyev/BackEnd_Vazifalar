<?php
// # 1.Uchburchak funksiyasini yarating va 3 ta parameter(tomonlari) qabul qilsin, Funksiyada:
// a.Uchburchkani mavjudlikka tekshiring
// b.Uning perimetri va yuzasini hisoblang
// c.Uchburchakni to’g’ri burchakli ekanligiga tekshiring
// Funksiyani qiymatlari ko'rish
$Uch1 = 3;
$Uch2 = 4;
$Uch3 = 5;
if(!empty($_POST['Uch1'])){
$Uch1 =$_POST['Uch1'];
}
if(!empty($_POST['Uch2'])){
    $Uch2 =$_POST['Uch2'];
}
if(!empty($_POST['Uch3'])){
    $Uch3 =$_POST['Uch3'];
}

// a :
function isTriangle($a, $b, $c) {
    return ($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a);
}
// b :
function calculatePerimeter($a, $b, $c) {
    return $a + $b + $c;
}

function calculateArea($a, $b, $c) {
    $s = ($a + $b + $c) / 2; // Yarim perimetr
    return sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
}

function isRightTriangle($a, $b, $c) {
    // Tomonlarni tartiblang, shunda c eng katta bo'ladi
    $sides = [$a, $b, $c];
    sort($sides);
    return pow($sides[0], 2) + pow($sides[1], 2) == pow($sides[2], 2);
}

$uchburchakTomon = '';
$Perimetr = '';
$Yuza = '';
$togri = '';
if (isTriangle($Uch1, $Uch2, $Uch3)) {
    $perimeter = calculatePerimeter($Uch1, $Uch2, $Uch3);
    $area = calculateArea($Uch1, $Uch2, $Uch3);
    $uchburchakTomon = "Ushbu tomonlar uchburchak hosil qiladi.\n";
    $Perimetr =  "Perimetri: $perimeter\n";
    $Yuza = "Yuzasi: $area\n";
    $togri = isRightTriangle($Uch1, $Uch2, $Uch3) ? 'ha' : 'yo\'q';
} else {
    $uchburchakTomon = "Ushbu tomonlar uchburchak hosil qilmaydi.";
}

$Natija = '';
function solveQuadraticEquation($a, $b, $c) {
 global $Natija;
    // Diskriminantni hisoblash
    $D = $b * $b - 4 * $a * $c;
    
    // Diskriminant qiymatiga qarab natijani chiqarish
    if ($D > 0) {
        $root1 = (-$b + sqrt($D)) / (2 * $a);
        $root2 = (-$b - sqrt($D)) / (2 * $a);
       return $Natija = "Ikkita haqiqiy ildiz mavjud: x1 = $root1 va x2 = $root2";
    } elseif ($D == 0) {
        $root = -$b / (2 * $a);
       return $Natija = "Bitta haqiqiy ildiz mavjud: x = $root";
    } else {
       return $Natija = "Haqiqiy ildizlar mavjud emas.";
    }; 
    return $Natija;
}
$a = 1;
$b= 2;
$c = 4;
if(!empty($_POST['A']) ){
 $a = $_POST['A'];
};
if(!empty( $_POST['B'])){
    $b = $_POST['B'];
};
if(!empty($_POST['C']) ){
    $c = $_POST['C'];
};
// 3.Svetofor dasturini funksiya yordamida ifodalang. Ya’ni parameter sifatida rang nomi uzatilsa, nima qilish kerakligi ekranga chiqsin.
$chroqRangi = '';
if(!empty($_POST['Ranggi'])){
$chroqRangi = $_POST['Ranggi'];
};
$movement = '';
function SvetoforFunc($chroqRangi, $movement){
 switch ($chroqRangi) {
    case 'red':
     $movement = 'Stop !';
     break;     
     case 'green':
    $movement = 'Go !';
     break;    
     case 'yellow':
     $movement = 'prepare';
     break;
    default:
     $movement = ' Bunday rang yoq ' ;
     break;
    };
 return $movement;
 }
// # 4.Funksiya yarating, funksiyada foydalanuvchidan uning yoshini so’rang va yoshiga qarab, agar 18 dan kichik bo’ladigan bo’lsa , “balog’at yoshiga yetmabsiz”, 18 va 30 orasida bo’lsa - “Hali yosh ekansiz”, 30 – 40 orasida bo’lsa – “Ga’yrat qiling!”, 40-50 – “Hali hammasi oldinda” , 50-70 – “Nevaralardan nechta?”, 70-80 – “Pensiya qancha?”, “80-100” – “Ehee to’y qachon?”. Larni Ekranga chiqaring chiqazing.
$yosh = 0;
$result = '';
if(!empty($_POST['Yosh'])){
   $yosh = $_POST['Yosh'];
}
function Age ($age, $resultAge){
 switch($age){
    case $age > 18 && $age <= 30 :
        $resultAge = 'Hali yosh ekansiz';
    break;
    case $age > 30  && $age <= 40 :
        $resultAge = 'Ga’yrat qiling!';
    break;
    case $age > 40  && $age <= 50 :
        $resultAge = 'Hali hammasi oldinda';
    break;
    case $age > 50  && $age  <=70 :
        $resultAge = 'Nevaralardan nechta?';
    break;
    case $age > 70  && $age  <=80 :
        $resultAge = '“Pensiya qancha?”';
    break;
    case $age > 80  && $age  <= 100 :
        $resultAge = 'Ehee to’y qachon?';
    break;
    default :
    $resultAge = 'balog’at yoshiga yetmabsiz';
    break;
 }
 return $resultAge;
}
// strt varible
$endNumber = 0;
if(!empty($_POST['RecursivNumber'])){
$endNumber = $_POST['RecursivNumber'];
}
function factorial($endNumber) {
    // Bazaviy holat: 1 yoki 0 bo'lsa, natija 1
    if ($endNumber <= 1) {
        return 1;
    } else {
        // Rekursiv chaqiriq
        return $endNumber * factorial($endNumber - 1);
    }
}
// 10 gacha bo'lgan sonlarning ko'paytmasi
$result = factorial($endNumber);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vazifa 3</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
       <div class="col-md-6 mt-5 mx-auto ">
           <h2>#1</h2>
            <div class="card-header bg-primary ">
            Uchburchak funksiyasi
            </div>
            <form method="post">
                <input type="number" class="form-control m2" name="Uch1" placeholder="A">
                <input type="number" class="form-control m2" name="Uch2" placeholder="B">
                <input type="number" class="form-control m2" name="Uch3" placeholder="C">
                <button class="btn btn-info">Natija</button>
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php echo 'A:' . $uchburchakTomon . "B:" .  $Perimetr. $Yuza . "C " .$togri?>
            </div>
        </div> 
      <div class="col-md-6 mt-5 mx-auto ">
           <h2>#2</h2>
            <div class="card-header bg-primary ">
           Kvadrat tenglamani hisoblovchi funksiya
            </div>
            <form method="post">
                <input type="number" class="form-control m2" name="A" placeholder="A">
                <input type="number" class="form-control m2" name="B" placeholder="B">
                <input type="number" class="form-control m2" name="C" placeholder="C">
                <button class="btn btn-info">Natija</button>
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php echo solveQuadraticEquation($a, $b, $c); ?>
            </div>
        </div>

       <div class="col-md-6 mx-auto mt-5 ">
       <h2>#3</h2>

            <div class="card-header bg-primary ">
           Svetofor
            </div>
            <form method="post">
                <input type="text" class="form-control m2" name="Ranggi" placeholder="Svetofor">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php echo svetoforFunc($chroqRangi, $movement); ?>
            </div>
        </div>
        <div class="col-md-6 mt-5 mx-auto">
           <h2>#4</h2>

            <div class="card-header bg-warning">
           Yoshingizni krirting : 
            </div>
            <form method="post">
                <input type="number" class="form-control m2" name="Yosh" placeholder="Yosh">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php echo Age($yosh, $result); ?>
            </div>
        </div>

        <div class="col-md-6 mt-5 mx-auto ">
           <h2>#5</h2>
            <div class="card-header bg-primary ">
            N gacha bo’lgan sonlar ko’paytmasini hisoblang Rekursiv funksiya yordamida
            </div>
            <form method="post">
                <input type="number" class="form-control m2" name="RecursivNumber" placeholder="N - son">
                <button class="btn btn-info">Natija</button>
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php echo "1 dan $endNumber gacha bo'lgan sonlarning ko'paytmasi: " . $result; ?>
            </div>
        </div>

</body>
</html>