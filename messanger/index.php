<?php  
    require_once "functions.php";
    require_once "controller.php";
    // print_r($allMessage)
?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uz Chat</title>
    <link rel="stylesheet" href="./assets/style/index.css">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card"> 
                    <div class="card-body">
                        <!-- message item -->
                        <?php if (!empty($allMessage)):?>
                            <?php foreach($allMessage as $message):?>
                        <div class="message_item">
                        <div class="avatar">
                            <img src="" alt="">
                        </div>
                        <div class="message_body">
                            <div class="meta">
                                <span class="username">John</span>
                                <span class="date">
                                    18:38
                                </span>
                            </div>
                            <div class="text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident beatae nobis ea vitae aliquid voluptate molestias exercitationem praesentium iusto quo?
                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>
                   <?php  endif;?>  
                    </div>
                    <div class="card-body">
                        <textarea name="" id="" cols="30" rows="5" class='form-controll'></textarea>
                        <button class="btn btn-success">
                            Yuborish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
