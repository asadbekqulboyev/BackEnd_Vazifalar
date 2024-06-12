<?php 
$arr_numbers = [1,2,5,77,54,3,2,1,17,23]; 
$count = 0;
$count_toq = 0;
$count_toq_number = 0;
  function ArrayCount($array){
   global $count ;
    for($i=0; $i< count($array);$i++){
     $count+=$array[$i];
    }
    return "Massivdagi raqamlar yig'indisi :$count";
  }
//  toq sonlarini qo'shish va ularing sonini  chiqarish
  function ArrayToq($array){
    global $count_toq ;
    global $count_toq_number ;
     for($i=0; $i< count($array);$i++){
      if($array[$i]%2==1){
        $count_toq_number= $count_toq_number+1;
        $count_toq+=$array[$i];
      }
     }
     return "Toq sonlar yig'indisi :$count_toq  va ular  $count_toq_number  ta ";
}
// tub sonlarini chiqarish

function tubmi($n) {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}
// #2 $students = ['Bobur','Shaxriyor','Shaxobiddin','Sardor', 'Qurbon', 'Yusuf'];
// Massivi berilgan, ushbu massivni for siklidan foydalanib , ro`yxat(ul > li) ning ichiga joylang. Toq navbatda turgan talabalarga active klassini o`zlashtiring va css yordamida ularning rangini yashil rangga bo`yang.
$students = ['Bobur','Shaxriyor','Shaxobiddin','Sardor', 'Qurbon', 'Yusuf'];
// qarzlar
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

?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vazifa 4</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .student_list li.active{
                background: green !important;
            }
    </style>
</head>
<body>
  <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>To'rtinchi vazifa </h1>
            <div class="d-flex justify-content-center mt-2">
            <nav aria-label="Page navigation example ">
                <ul class="pagination ">
                  <li class="page-item "><a class="page-link " href="./vazifa1.php">1</a></li>
                  <li class="page-item"><a class="page-link" href="./vazifa2.php">2</a></li>
                  <li class="page-item"><a class="page-link" href="./vazifa3.php">3</a></li>
                  <li class="page-item active"><a class="page-link" href="./vazifa4.php">4</a></li>
                </ul>
              </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row justify-content-between">
             <!-- 1 -->
             <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header w-100">

                    <h2>#1 Masala :</h2>
                    Massiv berilgan: $sonlar = [1,2,5,77,54,3,2,1,17,23];
                     <br>
                     1. Massivdagi sonlarning yig`indisini chiqaring
                     <br>
                     2. Massivdagi toq sonlar yig`indisi va ularning soni nechtaligini
                     <br>
                     3. Massivdagi tub sonlarni ekranga chiqaruvchi
                    </div>
                    <div class="card-body">
                    <h2>Javoblar :</h2>
                    1. <?php
                     echo ArrayCount($arr_numbers);
                     ?>
                    <br />
                    2. <?php
                     echo ArrayToq($arr_numbers);
                     ?>
                    <br />
                    3. Tub sonlar: <?php 
                    for ($i = 0; $i < count($arr_numbers); $i++) {
                        if (tubmi($arr_numbers[$i])) {
                            echo  $arr_numbers[$i] . " ";
                        }
                    }
                    ?>
                    </div>
                </div>
           
             </div> 
             <!-- 2 -->
             <div class="col-md-12 mt-2 student_list">
                <h2 class="pl-2">
                #2 Studentlar toq indexdagilarga active qo'shish
                </h2>
                <ul class="">
                  <?php
                    for ($i = 0; $i < count($students); $i++) {
                        $class = ($i % 2 == 0) ? 'active' : '';
                        echo "<li class=' mt-2 p-1 $class'>{$students[$i]}</li>";
                    }
                 
                  ?>
                </ul>
             </div>
             <!-- 3 -->
              <div class="col-md-12">
                <h2 class="text-center"> 1-Darsdagi Qarzim.</h2>
                <div class="card-header ">
           Kvadrat tenglamani hisoblovchi funksiya
            </div>
            <form method="post">
                <input type="number" class="form-control m2" name="A" placeholder="A">
                <input type="number" class="form-control m2" name="B" placeholder="B">
                <input type="number" class="form-control m2" name="C" placeholder="C">
                <button class="btn btn-info">Natija</button>
            </form>
            <div class="card-footer bg-primary text-white mt-2">
                <?php echo solveQuadraticEquation($a, $b, $c); ?>
               </div>
              </div> 
              </div>
             </div>
        </div>
    </main>
</body>
</html>