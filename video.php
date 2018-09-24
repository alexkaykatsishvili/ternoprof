<?php 

// define variables and set to empty values
$name = $phone = "";
$nameErr = $phoneErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['form_submit'])) {

        if (empty($_POST["name"])) {
            $nameErr = "Поле повинно бути заповнене";
        } else {
            $name = checkInput($_POST["name"]);
            if (!preg_match("/^[а-яА-Я\p{Cyrillic}\s\-]+$/u", $name)) {
                $nameErr = "Ім'я може складатися лише з літер української мови"; 
            }
        }

        if (empty($_POST["phone"])) {
            $phoneErr = "Поле повинно бути заповнене";
        } else {
            $phone = checkInput($_POST["phone"]);
            if (!preg_match("/^[\+0-9\-\(\)\s]*$/", $phone)) {
                $phoneErr = "Телефон може складатися лише з цифр"; 
            }
            if (strlen($phone) < 13) {
                $phoneErr = "Телефон може складатися не менше ніж з 12 цифр"; 
            }
            if (strlen($phone) > 13) {
                $phoneErr = "Телефон може складатися не більш ніж з 12 цифр"; 
            }
        }

        //Add the recipient email to a variable
        $to = "alexander.kaykatsishvili@gmail.com";

        //Create a subject
        $subject = "$name відправив Вам лист через контактну форму на сайті Ternoprof";

        //Construct the message
        $message = "Ім'я: " . $name . "\r\n";
        $message.= "Номер телефону: $phone\r\n";

        $message = wordwrap($message, 72);

        // Set the mail headers into a variable
        $headers = "MIME-Version: 1.0\r\n";
        // $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "Від: " . $name . "\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n\r\n";

        if ($nameErr == null && $phoneErr == null) {

            //Send the email
            $send = mail($to, $subject, $message, $headers);

        ?>
        <div class="status flex modal-w">
            <p>Дякую Вам! Прайс-лист доступний до завантаження:</p>
            <a class="download" href="#" download>Скачати прайс-лист</a>
        </div>
        <div class="status-close"></div>
        <?php

        } 

    }

}

function checkInput($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

// print_r($_POST);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon-ternoprof.ico" type="image/ico">
    <title>Ternoprof | Відеоспостереження</title>
</head>

<body>
    <div class="wrapper">
        <header class="header flex">
            <div class="header__logo">
                <a href="./" class="flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="999.92" height="999.92" viewBox="0 0 2081 2081">
                            <defs>
                                <style>
                                .cls-1 {
                                    fill: #fff;
                                    fill-rule: evenodd;
                                }
                                </style>
                            </defs>
                            <path id="logos" class="cls-1" d="M1060.5,20C1635.15,20,2101,485.848,2101,1060.5S1635.15,2101,1060.5,2101,20,1635.15,20,1060.5,485.848,20,1060.5,20Zm92.27,97.443C1156.61,131.976,987.78,428.609,962,462.63l-140.8-2.271,2.27-2.27Q988.1,287.782,1152.77,117.443ZM416.953,485.34H1659.21V735.146H1180.02V871.4L893.872,807.817V735.146H416.953V485.34ZM532.777,757.856H793.946q-11.355,22.707-22.711,45.42Q1276.488,917.948,1781.85,1032.64l-2.27,2.27q-287.265,289.53-574.58,579.1-1.125-157.815-2.27-315.66,34.065-62.445,68.13-124.91-465.51-105.585-931.122-211.2ZM1180.02,1670.79H893.872V1109.86q143.061,31.785,286.148,63.58v497.35Zm-195.307,22.7,140.807,2.28c-0.76.75-1.52,1.51-2.27,2.27q-153.285,152.13-306.594,304.31Q900.677,1847.94,984.713,1693.49Z" transform="translate(-20 -20)" />
                        </svg>
                    </div>
                    <div>
                        <p class="title">Ternoprof</p>
                        <p>Електромонтажна фірма</p>
                    </div>
                </a>
            </div>
            <nav class="header__nav">
                <ul class="flex">
                    <li><a href="./">Електромонтаж</a></li>
                    <li><a href="video.php" class="active">Відеоспостереження</a></li>
                    <li><a href="works.php">Наші роботи</a></li>
                </ul>
            </nav>
            <div class="header__nav_icon order-1">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
            </div>
            <nav class="header__nav--mobile">
                <ul class="flex">
                    <li><a href="./">Електромонтаж</a></li>
                    <li><a href="video.php">Відеоспостереження</a></li>
                    <li><a href="works.php">Наші роботи</a></li>
                </ul>
            </nav>
            <div class="header__contacts">
                <p><a href="tel:+380967596569">+380 96 759 6569</a></p>
                <p><a href="tel:+380664491767">+380 66 449 1767</a></p>
            </div>
        </header>
        <main class="main col">
            <div class="contacts">
                <a href="tel:+380967596569">+380 96 759 6569</a>
                <a href="tel:+380664491767">+380 66 449 1767</a>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-5 main__slider">
                    <div><img src="img/camera-1.png" alt=""></div>
                    <div><img src="img/camera-2.png" alt=""></div>
                    <div><img src="img/camera-3.png" alt="" style="zoom:.8;"></div>
                    <div><img src="img/camera-4.png" alt=""></div>
                </div>
                <div class="main__content-right col-12 col-lg-7 text-center text-lg-left">
                    <h1>Монтуємо високоякісний відеонагляд в часному секторі та
на територіях підприємств</h1>
                    <button class="get-price">отримати прайс-лист</button>
                    <div class="close-bg" style="<?php if ($nameErr != null || $phoneErr != null) { echo " display: block ";} ?>"></div>
                    <div class="main__content_form modal-w" style="<?php if ($nameErr != null || $phoneErr != null) { echo " display: block ";} ?>">
                        <form id="form" class="form col-12" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="post">
                            <p class="proposition">Заповніть форму та завантажте прайс-лист!</p>
                            <div class="form-group">
                                <label for="name">Ім'я</label>
                                <input class="form-control" name="name" id="name" type="text" placeholder="Петро" required>
                                <div class="invalid-feedback">This field is required.</div>
                                <div class="error">
                                    <?php echo $nameErr;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input class="form-control" name="phone" id="phone" type="tel" value="+38" placeholder="+380 96 759 6569" required>
                                <div class="invalid-feedback">Телефон може складатися лише з цифр</div>
                                <div class="error">
                                    <?php echo $phoneErr;?>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Завантажити" name="form_submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- <footer class="footer flex">
            <div><a href="#" class="conf-pol">Політика конфіденційності</a></div>
            <div>
                <p class="text-center">Україна, м. Тернопіль,
                    <br>вул. Броварна, 2</p>
            </div>
            <div><a href="mailto:ternoprof@gmail.com">ternoprof@gmail.com</a></div>
        </footer> -->
        <!-- <video autoplay muted loop id="myVideo">
        <source src="assets/background.mp4" type="video/mp4">
        </video> -->
        <div class="layout">
        </div>
        <div class="layout-second">
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>