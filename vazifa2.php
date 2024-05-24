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
<!-- 1 dan N gacha bo’lgan toq sonlarni ekranga chiqaring -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vazifa 2 dars</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
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
    </div>

</body>
</html>