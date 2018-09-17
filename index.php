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
            if (!preg_match("/^[а-яА-Я\p{Cyrillic}0-9\s\-]+$/u", $name)) {
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
            mail($to, $subject, $message, $headers);

            ?>
        <div class="status flex">
            <h2>Повідомлення відправлено</h2>
            <p>Скачати <a class="download" href="" download>прайс-лист</a></p>
        </div>
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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="shortcut icon" href="/images/favicon.png" type="image/png"> -->
        <title>Ternoprof</title>
    </head>

    <body>
        <div class="wrapper">
            <header class="header flex">
                <div class="header__logo flex">
                    <div>
                        <a href="./"><img src="img/logo.png" alt="logotype"></a>
                    </div>
                    <div>
                        <a href="./">
                            <p class="title">Ternoprof</p>
                            <p>Електромонтажна фірма</p>
                        </a>
                    </div>
                </div>
                <nav class="header__nav">
                    <ul class="flex">
                        <li><a href="">Електромонтаж</a></li>
                        <li><a href="">Відеоспостереження</a></li>
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
                        <li><a href="">Електромонтаж</a></li>
                        <li><a href="">Відеоспостереження</a></li>
                        <li><a href="works.php">Наші роботи</a></li>
                    </ul>
                </nav>
                <div class="header__contacts">
                    <p><a href="tel:+380967596569">+380 96 759 6569</a></p>
                    <p><a href="tel:+380664491767">+380 66 449 1767</a></p>
                </div>
            </header>
            <main class="main col">
                <div class="row align-items-center">
                    <div class="main__content-left col-12 col-lg-5 text-center text-lg-left">
                        <svg class="pulse-button" id="play" height="512.00073pt" viewBox="0 0 512.00073 512.00073" width="512.00073pt" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="m256 0c-141.382812 0-256 114.617188-256 256 0 141.386719 114.617188 256 256 256 141.386719 0 256-114.613281 256-256-.167969-141.316406-114.683594-255.832031-256-256zm0 480c-123.710938 0-224-100.289062-224-224s100.289062-224 224-224 224 100.289062 224 224c-.132812 123.65625-100.34375 223.867188-224 224zm0 0" fill="#fff" />
                            <path d="m375.871094 242.0625-160-90.496094c-7.691406-4.347656-17.453125-1.632812-21.800782 6.058594-1.355468 2.398438-2.070312 5.109375-2.070312 7.863281v181.023438c0 8.835937 7.164062 16 16 16 2.761719.003906 5.472656-.714844 7.871094-2.078125l160-90.496094c7.695312-4.34375 10.417968-14.101562 6.074218-21.796875-1.429687-2.542969-3.53125-4.644531-6.074218-6.078125zm-151.871094 77.011719v-126.144531l111.503906 63.070312zm0 0" fill="#fff" />
                        </svg>
                        <p class="show-more">Дізнайтеся про ідеальну електрику за 4 хвилини</p>
                        <div class="close-bg">
                            <iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/MpvAbUMhkHM?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="main__content-right col-12 col-lg-7 text-center text-lg-left">
                        <h1>Робимо преміум-електромонтаж в квартирах і котеджах</h1>
                        <button class="get-price">отримати прайс-лист</button>
                        <div class="close-bg-btn" style="<?php if ($nameErr != null || $phoneErr != null) { echo " display: block ";} ?>"></div>
                        <div class="main__content_form" style="<?php if ($nameErr != null || $phoneErr != null) { echo " display: block ";} ?>">
                            <form id="form" class="form col-12" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="post">
                                <div class="form-group">
                                    <label for="name">Ім'я</label>
                                    <input class="form-control" name="name" id="name" type="text" required>
                                    <div class="invalid-feedback">This field is required.</div>
                                    <div class="">
                                        <?php echo $nameErr;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input class="form-control" name="phone" id="phone" type="tel" required value="+38">
                                    <div class="invalid-feedback">Телефон може складатися лише з цифр</div>
                                    <div class="">
                                        <?php echo $phoneErr;?>
                                    </div>
                                </div>
                                <input type="submit" value="отримати прайс-лист" name="form_submit">
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer">
                <div class="footer--mobile">
                    <p><a href="tel:+380967596569">+380 96 759 6569</a></p>
                    <p><a href="tel:+380664491767">+380 66 449 1767</a></p>
                </div>
            </footer>
            <video autoplay muted loop id="myVideo">
            <source src="assets/background.mp4" type="video/mp4">
            </video>
            <div class="layout">
            </div>
            <div class="layout-second">
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

    </html>