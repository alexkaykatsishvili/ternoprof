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
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/favicon-ternoprof.ico" type="image/ico">
        <title>Ternoprof | Головна сторінка</title>
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
                <div class="contacts">
                    <a href="tel:+380967596569">+380 96 759 6569</a>
                    <a href="tel:+380664491767">+380 66 449 1767</a>
                </div>
                <div class="row align-items-center">
                    <div class="main__content-left col-12 col-lg-5 text-lg-left">
                        <svg onclick="play()" class="pulse-button" id="play" height="512.00073pt" viewBox="0 0 512.00073 512.00073" width="512.00073pt" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="m256 0c-141.382812 0-256 114.617188-256 256 0 141.386719 114.617188 256 256 256 141.386719 0 256-114.613281 256-256-.167969-141.316406-114.683594-255.832031-256-256zm0 480c-123.710938 0-224-100.289062-224-224s100.289062-224 224-224 224 100.289062 224 224c-.132812 123.65625-100.34375 223.867188-224 224zm0 0" fill="#fff" />
                            <path d="m375.871094 242.0625-160-90.496094c-7.691406-4.347656-17.453125-1.632812-21.800782 6.058594-1.355468 2.398438-2.070312 5.109375-2.070312 7.863281v181.023438c0 8.835937 7.164062 16 16 16 2.761719.003906 5.472656-.714844 7.871094-2.078125l160-90.496094c7.695312-4.34375 10.417968-14.101562 6.074218-21.796875-1.429687-2.542969-3.53125-4.644531-6.074218-6.078125zm-151.871094 77.011719v-126.144531l111.503906 63.070312zm0 0" fill="#fff" />
                        </svg>
                        <p class="show-more">Дізнайтеся про ідеальну електрику за 4 хвилини</p>
                        <div id="player" class="video"></div>
                    </div>
                    <div class="main__content-right col-12 col-lg-7 text-center text-lg-left">
                        <h1>Робимо преміум-електромонтаж в квартирах і котеджах</h1>
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
            <footer class="footer flex">
                <div><a href="#" class="conf-pol">Політика конфіденційності</a></div>
                <div>
                    <p class="text-center">Україна, м. Тернопіль,
                        <br>вул. Броварна, 2</p>
                </div>
                <div><a href="mailto:ternoprof@gmail.com">ternoprof@gmail.com</a></div>
            </footer>
            <!-- <video autoplay muted loop id="myVideo">
            <source src="assets/background.mp4" type="video/mp4">
            </video> -->
            <div class="layout">
            </div>
            <div class="layout-second">
            </div>
            <div class="confidence-policy modal-w">
                <h2 class="text-center">Политика конфиденциальности персональных данных</h2>
                <p>Настоящая Политика конфиденциальности персональных данных (далее – Политика конфиденциальности) действует в отношении всей информации, которую сайт <b>Ternoprof.com.ua</b>, (далее – Сайт) расположенный на доменном имени ternoprof.com.ua (а также его субдоменах), может получить о Пользователе во время использования сайта <b>ternoprof.com.ua</b> (а также его субдоменов), его программ и его продуктов.</p>
                <h3 class="text-center">1. Определение терминов</h3>
                <p>1.1 В настоящей Политике конфиденциальности используются следующие термины:</p>
                <p>1.1.1. «Администрация сайта» (далее – Администрация) – уполномоченные сотрудники на управление сайтом Ternoprof.com.ua, которые организуют и (или) осуществляют обработку персональных данных, а также определяет цели обработки персональных данных, состав персональных данных, подлежащих обработке, действия (операции), совершаемые с персональными данными.</p>
                <p>1.1.2. «Персональные данные» - любая информация, относящаяся к прямо или косвенно определенному, или определяемому физическому лицу (субъекту персональных данных).</p>
                <p>1.1.3. «Обработка персональных данных» - любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.</p>
                <p>1.1.4. «Конфиденциальность персональных данных» - обязательное для соблюдения Оператором или иным получившим доступ к персональным данным лицом требование не допускать их распространения без согласия субъекта персональных данных или наличия иного законного основания.</p>
                <p>1.1.5. «Сайт Ternoprof.com.ua» - это совокупность связанных между собой веб-страниц, размещенных в сети Интернет по уникальному адресу (URL): ternoprof.com.ua, а также его субдоменах.</p>
                <p>1.1.6. «Субдомены» - это страницы или совокупность страниц, расположенные на доменах третьего уровня, принадлежащие сайту Ternoprof.com.ua, а также другие временные страницы, внизу который указана контактная информация Администрации</p>
                <p>1.1.5. «Пользователь сайта Ternoprof.com.ua » (далее Пользователь) – лицо, имеющее доступ к сайту Ternoprof.com.ua, посредством сети Интернет и использующее информацию, материалы и продукты сайта Ternoprof.com.ua.</p>
                <p>1.1.7. «Cookies» — небольшой фрагмент данных, отправленный веб-сервером и хранимый на компьютере пользователя, который веб-клиент или веб-браузер каждый раз пересылает веб-серверу в HTTP-запросе при попытке открыть страницу соответствующего сайта. 1.1.8. «IP-адрес» — уникальный сетевой адрес узла в компьютерной сети, через который Пользователь получает доступ на Сайт.</p>
                <h3 class="text-center">2. Общие положения</h3>
                <p>2.1. Использование сайта Ternoprof.com.ua Пользователем означает согласие с настоящей Политикой конфиденциальности и условиями обработки персональных данных Пользователя.</p>
                <p>2.2. В случае несогласия с условиями Политики конфиденциальности Пользователь должен прекратить использование сайта Ternoprof.com.ua </p>
                <p>2.3. Настоящая Политика конфиденциальности применяется к сайту Ternoprof.com.ua. Сайт не контролирует и не несет ответственность за сайты третьих лиц, на которые Пользователь может перейти по ссылкам, доступным на сайте Ternoprof.com.ua.</p>
                <p>2.4. Администрация не проверяет достоверность персональных данных, предоставляемых Пользователем.</p>
                <h3 class="text-center">3. Предмет политики конфиденциальности</h3>
                <p>3.1. Настоящая Политика конфиденциальности устанавливает обязательства Администрации по неразглашению и обеспечению режима защиты конфиденциальности персональных данных, которые Пользователь предоставляет по запросу Администрации при регистрации на сайте Ternoprof.com.ua или при подписке на информационную e-mail рассылку.</p>
                <p>3.2. Персональные данные, разрешённые к обработке в рамках настоящей Политики конфиденциальности, предоставляются Пользователем путём заполнения форм на сайте Ternoprof.com.ua и могут включать в себя следующую информацию:</p>
                <p>3.2.1. фамилию, имя, отчество Пользователя;</p>
                <p>3.2.2. контактный телефон Пользователя;</p>
                <p>3.2.3. адрес электронной почты (e-mail)</p>
                <p>3.2.4. место жительство Пользователя (при необходимости)</p>
                <p>3.2.5. фотографию (при необходимости)</p>
                <p>3.3. Сайт защищает Данные, которые автоматически передаются при посещении страниц:</p>
                <ul>
                    <li>IP адрес;</li>
                    <li>информация из cookies;</li>
                    <li>информация о браузере;</li>
                    <li>время доступа;</li>
                    <li>реферер (адрес предыдущей страницы).</li>
                </ul>
                <p>3.3.1. Отключение cookies может повлечь невозможность доступа к частям сайта, требующим авторизации.</p>
                <p>3.3.2. Сайт осуществляет сбор статистики об IP-адресах своих посетителей. Данная информация используется с целью предотвращения, выявления и решения технических проблем.</p>
                <p>3.4. Любая иная персональная информация неоговоренная выше (история посещения, используемые браузеры, операционные системы и т.д.) подлежит надежному хранению и нераспространению, за исключением случаев, предусмотренных в п.п. 5.2. настоящей Политики конфиденциальности.</p>
                <h3 class="text-center">4. Цели сбора персональной информации пользователя</h3>
                <p>4.1. Персональные данные Пользователя Администрация может использовать в целях:</p>
                <p>4.1.1. Идентификации Пользователя, зарегистрированного на сайте Ternoprof.com.ua для его дальнейшей авторизации.</p>
                <p>4.1.2. Предоставления Пользователю доступа к персонализированным данным сайта Ternoprof.com.ua.</p>
                <p>4.1.3. Установления с Пользователем обратной связи, включая направление уведомлений, запросов, касающихся использования сайта Ternoprof.com.ua, обработки запросов и заявок от Пользователя.</p>
                <p>4.1.4. Определения места нахождения Пользователя для обеспечения безопасности, предотвращения мошенничества.</p>
                <p>4.1.5. Подтверждения достоверности и полноты персональных данных, предоставленных Пользователем.</p>
                <p>4.1.6. Создания учетной записи для использования частей сайта Ternoprof.com.ua, если Пользователь дал согласие на создание учетной записи.</p>
                <p>4.1.7. Уведомления Пользователя по электронной почте.</p>
                <p>4.1.8. Предоставления Пользователю эффективной технической поддержки при возникновении проблем, связанных с использованием сайта Ternoprof.com.ua.</p>
                <p>4.1.9. Предоставления Пользователю с его согласия специальных предложений, новостной рассылки и иных сведений от имени сайта Ternoprof.com.ua.</p>
                <h3 class="text-center">5. Способы и сроки обработки персональной информации</h3>
                <p>5.1. Обработка персональных данных Пользователя осуществляется без ограничения срока, любым законным способом, в том числе в информационных системах персональных данных с использованием средств автоматизации или без использования таких средств.</p>
                <p>5.2. Персональные данные Пользователя могут быть переданы уполномоченным органам государственной власти Украины только по основаниям и в порядке, установленным законодательством Украины.</p>
                <p>5.3. При утрате или разглашении персональных данных Администрация вправе не информировать Пользователя об утрате или разглашении персональных данных.</p>
                <p>5.4. Администрация принимает необходимые организационные и технические меры для защиты персональной информации Пользователя от неправомерного или случайного доступа, уничтожения, изменения, блокирования, копирования, распространения, а также от иных неправомерных действий третьих лиц.</p>
                <p>5.5. Администрация совместно с Пользователем принимает все необходимые меры по предотвращению убытков или иных отрицательных последствий, вызванных утратой или разглашением персональных данных Пользователя.</p>
                <h3 class="text-center">6. Права и обязанности сторон</h3>
                <p>6.1. Пользователь вправе:</p>
                <p>6.1.1. Принимать свободное решение о предоставлении своих персональных данных, необходимых для использования сайта Ternoprof.com.ua, и давать согласие на их обработку.</p>
                <p>6.1.2. Обновить, дополнить предоставленную информацию о персональных данных в случае изменения данной информации.</p>
                <p>6.1.3. Пользователь имеет право на получение у Администрации информации, касающейся обработки его персональных данных, если такое право не ограничено в соответствии с законодательством. Пользователь вправе требовать от Администрации уточнения его персональных данных, их блокирования или уничтожения в случае, если персональные данные являются неполными, устаревшими, неточными, незаконно полученными или не являются необходимыми для заявленной цели обработки, а также принимать предусмотренные законом меры по защите своих прав. Для этого достаточно уведомить Администрацию по указаному E-mail адресу.</p>
                <p>6.2. Администрация обязана:</p>
                <p>6.2.1. Использовать полученную информацию исключительно для целей, указанных в п. 4 настоящей Политики конфиденциальности.</p>
                <p>6.2.2. Обеспечить хранение конфиденциальной информации в тайне, не разглашать без предварительного письменного разрешения Пользователя, а также не осуществлять продажу, обмен, опубликование, либо разглашение иными возможными способами переданных персональных данных Пользователя, за исключением п.п. 5.2. настоящей Политики Конфиденциальности.</p>
                <p>6.2.3. Принимать меры предосторожности для защиты конфиденциальности персональных данных Пользователя согласно порядку, обычно используемого для защиты такого рода информации в существующем деловом обороте.</p>
                <p>6.2.4. Осуществить блокирование персональных данных, относящихся к соответствующему Пользователю, с момента обращения или запроса Пользователя, или его законного представителя либо уполномоченного органа по защите прав субъектов персональных данных на период проверки, в случае выявления недостоверных персональных данных или неправомерных действий.</p>
                <h3 class="text-center">7. Ответственность сторон</h3>
                <p>7.1. Администрация, не исполнившая свои обязательства, несёт ответственность за убытки, понесённые Пользователем в связи с неправомерным использованием персональных данных, в соответствии с законодательством Украины, за исключением случаев, предусмотренных п.п. 5.2. и 7.2. настоящей Политики Конфиденциальности.</p>
                <p>7.2. В случае утраты или разглашения Конфиденциальной информации Администрация не несёт ответственность, если данная конфиденциальная информация:</p>
                <p>7.2.1. Стала публичным достоянием до её утраты или разглашения.</p>
                <p>7.2.2. Была получена от третьей стороны до момента её получения Администрацией Ресурса.</p>
                <p>7.2.3. Была разглашена с согласия Пользователя.</p>
                <p>7.3. Пользователь несет полную ответственность за соблюдение требований законодательства Украины, в том числе законов о рекламе, о защите авторских и смежных прав, об охране товарных знаков и знаков обслуживания, но не ограничиваясь перечисленным, включая полную ответственность за содержание и форму материалов.</p>
                <p>7.4. Пользователь признает, что ответственность за любую информацию (в том числе, но не ограничиваясь: файлы с данными, тексты и т. д.), к которой он может иметь доступ как к части сайта Ternoprof.com.ua, несет лицо, предоставившее такую информацию.</p>
                <p>7.5. Пользователь соглашается, что информация, предоставленная ему как часть сайта Ternoprof.com.ua, может являться объектом интеллектуальной собственности, права на который защищены и принадлежат другим Пользователям, партнерам или рекламодателям, которые размещают такую информацию на сайте Ternoprof.com.ua. </p>
                <p>Пользователь не вправе вносить изменения, передавать в аренду, передавать на условиях займа, продавать, распространять или создавать производные работы на основе такого Содержания (полностью или в части), за исключением случаев, когда такие действия были письменно прямо разрешены собственниками такого Содержания в соответствии с условиями отдельного соглашения.</p>
                <p>7.6. В отношение текстовых материалов (статей, публикаций, находящихся в свободном публичном доступе на сайте Ternoprof.com.ua) допускается их распространение при условии, что будет дана ссылка на Сайт.</p>
                <p>7.7. Администрация не несет ответственности перед Пользователем за любой убыток или ущерб, понесенный Пользователем в результате удаления, сбоя или невозможности сохранения какого-либо Содержания и иных коммуникационных данных, содержащихся на сайте Ternoprof.com.ua или передаваемых через него.</p>
                <p>7.8. Администрация не несет ответственности за любые прямые или косвенные убытки, произошедшие из-за: использования либо невозможности использования сайта, либо отдельных сервисов; несанкционированного доступа к коммуникациям Пользователя; заявления или поведение любого третьего лица на сайте.</p>
                <p>7.9. Администрация не несет ответственность за какую-либо информацию, размещенную пользователем на сайте Ternoprof.com.ua, включая, но не ограничиваясь: информацию, защищенную авторским правом, без прямого согласия владельца авторского права.</p>
                <h3 class="text-center">8. Разрешение споров</h3>
                <p>8.1. До обращения в суд с иском по спорам, возникающим из отношений между Пользователем и Администрацией, обязательным является предъявление претензии (письменного предложения или предложения в электронном виде о добровольном урегулировании спора).</p>
                <p>8.2. Получатель претензии в течение 30 календарных дней со дня получения претензии, письменно или в электронном виде уведомляет заявителя претензии о результатах рассмотрения претензии.</p>
                <p>8.3. При не достижении соглашения спор будет передан на рассмотрение соответствующим уполномоченным органам, предусмотренных законодательством Украины.</p>
                <p>8.4. К настоящей Политике конфиденциальности и отношениям между Пользователем и Администрацией применяется действующее законодательство Украины.</p>
                <h3 class="text-center">9. Дополнительные условия</h3>
                <p>9.1. Администрация вправе вносить изменения в настоящую Политику конфиденциальности без согласия Пользователя.</p>
                <p>9.2. Новая Политика конфиденциальности вступает в силу с момента ее размещения на сайте Ternoprof.com.ua, если иное не предусмотрено новой редакцией Политики конфиденциальности.</p>
                <p>9.3. Все предложения или вопросы касательно настоящей Политики конфиденциальности следует сообщать по адресу: ternoprof@gmail.com</p>
                <p>9.4. Действующая Политика конфиденциальности размещена на странице по адресу http://ternoprof.com.ua/</p>
            </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
            <script src="js/main.js"></script>
            <script>
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;

            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: 'MpvAbUMhkHM',
                });
            }

            function play() {
                player.playVideo();
            }

            function pause() {
                player.pauseVideo();
            }
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

    </html>