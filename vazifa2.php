<?php
// 1.Foydalanuvchidan 1 dan 7 gacha raqam kiritishini so’rang, va shu kiritilgan raqam ga 1 – Dushanba, 2 – Seshanba , … , 7 – Yakshanba yozuvlarini consolega chiqarizng;
$day = '';
 if(!empty($_POST['day'])){
   $day = $_POST['day'];
    switch ($day) {
        case 1:
            $day = 'Dushanba';
            break;
        case 2:
            $day = 'Seshanba';
            break;
        case 3:
            $day = 'Chorshanba';
            break;
        case 4:
            $day = 'Payshanba';
            break;
        case 5:
            $day = 'Juma';
            break;
        case 6:
            $day = 'Shanba';
            break;
        case 7:
            $day = 'YakShanba';
            break;
        default:
            $day = 'Raqam 7dan katta yoki 1 kichik bolmasligi kerak ! ' ;
            break;
    }
 
  
 }
// 2.Svetofor dasturini switch case yordamida yozing.
$movement = '';
if(!empty($_POST['color'])){
    $color = $_POST['color'];
     switch ($color) {
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
     }
  
   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vazifa 2 dars</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Ikkinchi vazifa </h1>
            <div class="d-flex justify-content-center mt-2">
            <nav aria-label="Page navigation example ">
                <ul class="pagination ">
                  <li class="page-item"><a class="page-link" href="./vazifa1.php">1</a></li>
                  <li class="page-item"><a class="page-link" href="./vazifa2.php">2</a></li>
                  <li class="page-item"><a class="page-link" href="./vazifa3.php">3</a></li>
                  <li class="page-item"><a class="page-link" href="./vazifa4.php">4</a></li>
                </ul>
              </nav>
            </div>
        </div>
    </header>
    <div class="container mt-2">
        <div class="col-md-12">
            <div class="card-header bg-succes">
            1 dan 7 gacha raqam kiriting 
            </div>
            <form method="post">
                <input type="number" class="form-control m2" name="day">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php echo $day?>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card-header bg-succes">
            rangni kiriting Ex: red, green, yellow
            </div>
            <form method="post">
                <input type="text" class="form-control m2" name="color">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php echo $movement?>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card-header bg-succes">
            1 dan N gacha toq va juft sonlarni tekshirish
            </div>
            <form method="post">
                <input type="text" class="form-control m2" name="N">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php 
                  if(!empty($_POST['N'])){
                  $N = $_POST['N'];
                  $i = 0;
                  while($i < $N){
                  $i++;
                   if($i % 2 == 0){
                      echo $i . "Juft" . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                   }else{
                      echo $i . "Toq" . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                   }
                  }
                  } ?>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card-header bg-succes">
            1 dan N gacha sonlar ichida 5 ga karralilarini ekranga chiqarish
            </div>
            <form method="post">
                <input type="text" class="form-control m2" name="Son">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php 
                  if (!empty($_POST['Son'])) {
                    // Foydalanuvchi kiritgan N qiymatini olish
                    $Son = $_POST['Son'];
                
                    // 1 dan boshlab N gacha bo'lgan 5ga karrali sonlarni topish
                    for ($i = 1; $i <= $Son; $i++) {
                        if ($i % 5 == 0) {
                            echo $i . "&nbsp;";
                        }
                    }
                }?>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card-header bg-succes">
            1 dan N gacha sonlar ichida 7 ga karralilarini yig'indisi ekranga chiqarish
            </div>
            <form method="post">
                <input type="text" class="form-control m2" name="S1">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php 
                    $count = 0;

                  if (!empty($_POST['S1']) ) {
                    // Foydalanuvchi kiritgan N qiymatini olish
                    $S1 = $_POST['S1'];
                    // 1 dan boshlab N gacha bo'lgan 5ga karrali sonlarni topish
                    for ($i = 1; $i <= $S1; $i++) {
                        if ($i % 7 == 0) {
                            $count+= $i ;
                        }
                    }
                    echo  $count;
                }?>
            </div>
        </div>
         <!-- 10 -->
         <div class="col-md-12 mt-5">
            <div class="card-header bg-succes">
            11 dan na gacha bo’lgan juft sonlarning kvadratlarining yig’indisini hisoblovchi dastur yarating
            </div>
            <form method="post">
                <input type="text" class="form-control m2" name="KV">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php 
                  $countKv = 0;
                  if (!empty($_POST['KV']) ) {
                    // Foydalanuvchi kiritgan N qiymatini olish
                    $KV = $_POST['KV'];
                    // 1 dan boshlab N gacha bo'lgan 5ga karrali sonlarni topish
                    for ($i = 1; $i <= $KV; $i++) {
                        if ($i % 2 == 0) {
                         $countKv = $countKv + pow($i,2);
                        }
                    }
                    echo  $countKv;
                }?>
            </div>
        </div>
        <!-- 11 -->
        <div class="col-md-12 mt-5">
            <div class="card-header bg-succes">
            #11. Kiritilgan son raqamlar sonini  va  Xonalar raqamlarining Yig'indisini Hisoblash
            </div>
            <form method="post">
                <input type="text" class="form-control m2" name="Numbers">
            </form>
            <div class="card-footer bg-dark text-white mt-2">
                <?php 
                  $natijaAll = 0;
                  if (!empty($_POST['Numbers']) ) {
                    // Foydalanuvchi kiritgan N qiymatini olish
                    $Numbers = $_POST['Numbers'];
                    $sums = 0;
                    $counts = 0;
                    while($Numbers>=1){
                        $innerNumber =  (int)$Numbers%10;
                        $sums+=$innerNumber;
                        $counts++;
                        $Numbers= (int)$Numbers/10;
                    }
                    $natijaAll = "Rqami : $counts  Raqamlar Yig'indisi: $sums ";
                    echo  $natijaAll;
                }?>
            </div>
        </div>
    </div>

</body>
</html>