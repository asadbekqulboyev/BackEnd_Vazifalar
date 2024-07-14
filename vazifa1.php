<?php
// 3 ta sonning o'rta arfimetigini topish
$natija = 0;
if(!empty($_POST['son1']) && !empty($_POST['son2']) && !empty($_POST['son3'])){
$number1 = $_POST['son1'];
$number2 = $_POST['son2'];
$number3 = $_POST['son3'];
$natija = ($number1 + $number2 + $number3)/3 ;
};
// 2.Kvadratning tomoni a ga teng, kvadratning perimetri (P = 4*a), Yuzi (S=a*a) ni hisoblovchi dastur yarating'
$P=0;
$S=0;
if(!empty($_POST['a'])){
$a = $_POST['a'];
$P = 4*$a;
$S = $a*$a;   
}
// 3.To’g’ri to’rtburchakning tomonlari berilgan a va b, uning Perimetri va yuzini hisoblovchi dastur yarating
$TP=0;
$TY=0;
if(!empty($_POST['tomon1'])&& !empty($_POST['tomon2'])){
$tomona = $_POST['tomon1'];
$tomonb = $_POST['tomon2'];
$TP = 2*($tomona + $tomonb );
$TY = $tomona*$tomonb;   
}
// 4 5.Uchburchakning tomonlari berilgan: a , b va c. Uning perimetrini hisoblovchi dastur yarating
$uchburchakPerimetr = 0;
if(!empty($_POST['uchburchaTomon1'])&& !empty($_POST['uchburchaTomon2']) && !empty($_POST['uchburchaTomon3'])){
  $aTomon = $_POST['uchburchaTomon1'];
  $bTomon = $_POST['uchburchaTomon2'];
  $cTomon = $_POST['uchburchaTomon3'];
  $uchburchakPerimetr = $aTomon +$bTomon + $cTomon;
  }


$result1 = 0;
if(!empty($_POST['sonA'])&& !empty($_POST['sonB'])){
// var_dump 
$A = $_POST['sonA'];
$B = $_POST['sonB'];
$result1 = $A > 2 && $B < 10;
}

$Juft = 0;
if(!empty($_POST['sA'])){
$SonA = $_POST['sA'];
$Juft = ($SonA % 2 == 0);
}

$Natija = 0;
if(!empty($_POST["Ason"]) && !empty($_POST["Bson"])){
    $ex_a = $_POST["Ason"];
    $ex_b = $_POST["Bson"];
    $Natija = ($ex_a % 2 == 1 && $ex_b % 2 == 1);
}
// if else

$IfResult = 0;
if(!empty($_POST["Ason1"]) ){

    $ex1 = $_POST["Ason1"];
   if($ex1 > 0 ){
       $IfResult=$ex1 + 1;
   }else {
     $IfResult= $ex1 * 10;
   }


}

// ikkita sonni kattasini topish '
$Max = '';
if(!empty($_POST["Ason2"]) && !empty($_POST["Bson2"])){
$Ason2 = $_POST["Ason2"];
$Bson2 = $_POST["Bson2"];
// Kattasini aniqlash
if ($Ason2 > $Bson2) {
    $Max = $Ason2;
} else {
    $Max = $Bson2;
}
}
//  3 ta son ichidagi eng kichigini topish
$Min= 0;
if(!empty($_POST["C1"]) && !empty($_POST["C2"])){
$C1 = 0;
$C2 = $_POST["C1"];
$C3 = $_POST["C2"];
if ($C2 < $C1) {
    $Min = $C2;
}
if ($C3 < $C1) {
    $Min = $C3;
}
}

//  6.Kvadrat tenglamani hisoblovchi dastur yarating. ax2+bx+c=0 tenglama kvadrat tenglama deyiladi. Kvadrat tenglamaning yechimlari uning diskriminantiga bog`liq. D = b2+4*a*c; Agar discriminant 0 dan kichik bo’lsa, kvadrat tenglamaning yechimlari mavjud emas, agar discriminant 0 ga teng boladigan bo`lsa, kvadrat tenglamaning yechimi bitta: 
$DescNatija ='';
if( !empty($_POST["qiymatA"]) && !empty($_POST["qiymatB"]) && !empty($_POST["qiymatC"])){
  $qiymatA = $_POST["qiymatA"];
  $qiymatB= $_POST["qiymatB"];
  $qiymatC= $_POST["qiymatC"];
  // descriminant
  // Diskriminantni hisoblash
  $D = $qiymatA * $qiymatB- 4 * $qiymatA * $qiymatC;
    
  // Diskriminant qiymatiga qarab natijani chiqarish
  if ($D > 0) {
      $root1 = (-$qiymatB + sqrt($D)) / (2 * $qiymatA);
      $root2 = (-$qiymatB - sqrt($D)) / (2 * $qiymatA);
     return $DescNatija = "Ikkita haqiqiy ildiz mavjud: x1 = $root1 va x2 = $root2";
  } elseif ($D == 0) {
      $root = -$qiymatB / (2 * $qiymatA);
     return $DescNatija = "Bitta haqiqiy ildiz mavjud: x = $root";
  } else {
     return $DescNatija = "Haqiqiy ildizlar mavjud emas.";
  }; 
  return $DescNatija;
}
// 
require_once('./section/header.php')
?>
<div class="container mt-5">
    <div class="row flex">
     <div class="col-md-5">
      <div class="card w-100">
         <div class="card-header">
            #1 . 3ta Sonning o'rta arfimetigini topish
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="Son 1.." class="form-control"  name ="son1" > 
                <input type="number" placeholder="Son 2.."class="form-control mt-2"  name ="son2">
                <input type="number" placeholder="Son 3.."class="form-control mt-2"  name ="son3">
                <hr />
                <button class="btn btn-succes">Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             O'rta arfimetigi <?php  echo  $natija

              ?>
            </div>
         </div>
         </div>
      </div>
     <div class="col-md-5">
        <div class="card w-100">
         <div class="card-header">
            #2 . Kvadratning yuzi va perimetri
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="a" > 
                <hr />
                <button class="btn btn-succes">Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Perimetr <?php  echo  $P

              ?> 
              <br>
              Yuzi <?php  echo  $S
                ?>
            </div>
         </div>
         </div>
     </div>
      <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #3.To’g’ri to’rtburchakning  Perimetri va yuzini hisoblovchi dastur :
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="tomon1" > 
                <input type="number" placeholder="B.." class="form-control mt-2"  name ="tomon2" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Perimetr: <?php  echo  $TP  ?> 
              <br>
              Yuzi : <?php  echo  $TY
                ?>
            </div>
         </div>
         </div>
     </div>
     <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #4.Uchburchakning  Perimetri :
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="uchburchaTomon1" > 
                <input type="number" placeholder="B.." class="form-control mt-2"  name ="uchburchaTomon2" > 
                <input type="number" placeholder="C.." class="form-control mt-2"  name ="uchburchaTomon3" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Perimetr: <?php  echo  $uchburchakPerimetr ?> 
            </div>
         </div>
         </div>
     </div>
     <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #1.a va b sonlari berilgan jumlani rostlikka tekshiring:  :
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="sonA" > 
                <input type="number" placeholder="B.." class="form-control mt-2"  name ="sonB" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Qiymat: <?php var_dump($result1);  ?> 
            </div>
         </div>
         </div>
     </div>
     <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #2.a soni berilgan juft bo'lsa rost qiymat qaytarsin:
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="sA" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Qiymat: <?php var_dump($Juft);  ?> 
            </div>
         </div>
         </div>
     </div>
     <!--  -->
     <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #3 .Ikkita a va b sonlari berilgan , jumlani rostlikka tekshiring : a va b sonlari toq sonlar
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="Ason" > 
                <input type="number" placeholder="B.." class="form-control mt-2"  name ="Bson" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Qiymat: <?php var_dump($Natija);  ?> 
            </div>
         </div>
         </div>
     </div>
     <!-- if else -->
     <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #4 a soni berilgan, agar shu soni musbat bo’lsa unga 1 qo’shilsin , agar manfiy bo’lsa 10 ga ko’paytirilsin. Natijasiga ekran ga chiqrilsin
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="Ason1" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Qiymat: <?php echo $IfResult;  ?> 
            </div>
         </div>
         </div>
      </div>
      <!-- if else -->
      <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #5 a soni berilgan, agar shu soni musbat bo’lsa unga 1 qo’shilsin , agar manfiy bo’lsa 10 ga ko’paytirilsin. Natijasiga ekran ga chiqrilsin
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="Ason2" > 
                <input type="number" placeholder="B.." class="form-control mt-2"  name ="Bson2" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Eng kattasi: <?php echo $Max;  ?> 
            </div>
         </div>
         </div>
      </div>
      <!-- if else -->
      <div class="col-md-5 mt-4">
        <div class="card w-100">
         <div class="card-header">
        #6  0 va a,b sonlari berilgan eng kishigini topish
         </div>
          <div class="card-body">
            <!-- 1 - form -->
            <form method="post">
                <input type="number" placeholder="A.." class="form-control"  name ="C1" > 
                <input type="number" placeholder="B.." class="form-control mt-2"  name ="C2" > 
                <hr />
                <button class="btn btn-succes bg-info" >Hisoblash</button>
            </form>
            <!-- 1 - form -->
            <div class="displa bg-info  p-2 mt-2" >
             Eng Kichigi: <?php echo $Min;  ?> 
            </div>
         </div>
         </div>
     </div>
     </div>
</body>
</html>