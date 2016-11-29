<?php
require_once('lib/PHPMailer/class.phpmailer.php');

// echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
// print_r($_FILES);
// $is_uploaded = false;
if(isset($_FILES['azfile']['name'])){
  
  $tel = isset($_POST['phone'])?$_POST['phone']:"";
  // $text = isset($_POST['text'])?$_POST['text']:"";
  // $email2 =  isset($_POST['email'])?(!($_POST['email']==="noemail@noemail.ru")?$_POST['email']:""):"";
  $popup =  isset($_POST['popup'])?$_POST['popup']:"";

  $msg  = "<html><body>";
  $msg .= "<h2>Новое сообщение</h2>\r\n";
  if($popup!==""){$msg .= "<p><strong>Заявка:</strong> ".$popup."</p>\r\n";}

  if($tel!==""){$msg .= "<p><strong>Телефон:</strong> ".$tel."</p>\r\n";}
  // // $msg .= "<p><strong>Имя:</strong> ".$uname."</p>\r\n";
  // if($email2!==""){$msg .= "<p><strong>Email:</strong> ".$email2."</p>\r\n";}
  // if($text!==""){$msg .= "<p><strong>Сообщение:</strong> ".$text."</p>\r\n";}
  // // $msg .= "<p><strong>UTM-метка:</strong> ".$utm."</p>\r\n";

  $msg .= "</body></html>";

  $email = new PHPMailer();
  $email->From      = 'admin@loftkirpich.ru';//'you@example.com';//admin@loftkirpich.ru';
  $email->FromName  = 'loftkirpich';//'Your Name';//loftkirpich';
  $email->Subject   = 'Message Subject';
  $email->Body      = $msg;//$bodytext;
  $email->AddAddress( 'loftkirpich@yandex.ru' );//loftkirpich@yandex.ru' );  destinationaddress@example.com

  // $uploaddir = '/uploadfiles/';

  // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  // $file_to_attach = 'PATH_OF_YOUR_FILE_HERE';

  $uploadfile = $_FILES['azfile']['tmp_name'];

  // $email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );
  $email->AddAttachment( $uploadfile , $_FILES['azfile']['name'] );
  // echo $email->Send();
  if($email->Send()){
    $is_uploaded = true;
    // echo "true";
  } else {
    // echo "false";
  }
  // print_r($_FILES);
}


?>

<!doctype html>
<html lang="en" class="no-js">
<head>
  <!-- saved from url=(0014)about:internet -->
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> </title>

  <!-- icons -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- css + javascript -->
  <link rel="stylesheet" href="css/main.css" media="all">
  <link rel="stylesheet" href="css/style.css" media="all">
  <link rel="stylesheet" href="css/style2.css" media="all">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

</head>
<body>

  <header role="banner">
    <div class="header--logo">
      <img src="img/logo.png" alt="" title="">
    </div>
    <nav class="header--nav" role="navigation">
      <ul class="headnav">
        <li><a href="/">старинный<span>кирпич</span></a></li>
        <li><a href="/plitkaloft.php">плитка<span>из кирпича</span></a></li>
        <li><a href="/design.php">дизайнерские<span>решения (Loft)</span></a></li>
        <li><a href="/works.php">наши<span>работы</span></a></li>
      </ul>
    </nav>
    <a class="header--phone" href="tel:88002001183">8 800 200 11 83<span>звонок по России бесплатно</span></a>
  </header>

  <div class="ah-bufer"></div>
  <div class="mainbag">

    <div class="mainview home-first">
      <div class="vs-center-wrap">
        <div class="vs-center">
          <h1 class="home-first--title">подлинный старинный кирпич 18-19 века</h1>
          <h2 class="home-first--subtitle">напрямую с мест разбора старинных зданий</h2>

          <form method="post" class="red-form ah-red-form">
            <h6 class="red-form--title">До 31 декабря скидка</h6>
            <h6 class="red-form--subtitle">на весь кирпич с клеймом</h6>
            <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="номер телефона">
            <input type="hidden" name="popup" value="До 31 декабря скидка">
            <!-- <input type="hidden" name="name" value="Без имени"> -->
            <input type="hidden" name="email" value="noemail@noemail.ru">
            <!-- <input type="hidden" name="company" value="noname"> -->
            <button>получить скидку</button>
            <span class="discount">30<span>%</span></span>
            <span class="form-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
          </form>

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

    <div class="mainview home-second arrow-bottom">
      <div class="vs-center-wrap">
        <div class="vs-center">
          <h1 class="home-second--title arrow-top">мы предлагаем</h1>

          <div class="weoffer">
            <img src="img/weoffer-1.jpg" alt="">
            <h2 class="weoffer--title">кирпич старинный ручной формовки</h2>
            <h3 class="weoffer--subtitle">полнотелый, возраст более 100 лет</h3>
            <ul class="weoffer-list">
              <li>Длина: 240-285 мм</li>
              <li>Ширина: 60-80 мм</li>
              <li>Толщина: от 15 мм</li>
            </ul>
            <a href="#" class="btn btn-red az-btn5">получить оптовый прайс</a>
          </div><!-- /.weoffer -->
          <div class="weoffer">
            <img src="img/weoffer-2.jpg" alt="">
            <h2 class="weoffer--title">кирпич старинный с клеймом</h2>
            <h3 class="weoffer--subtitle">ручной формовки, возраст более 100 лет</h3>
            <ul class="weoffer-list">
              <li>Длина: 240-285 мм</li>
              <li>Ширина: 60-80 мм</li>
              <li>Толщина: от 15 мм</li>
            </ul>
            <a href="#" class="btn btn-red az-btn5">получить оптовый прайс</a>
          </div><!-- /.weoffer -->
          <div class="weoffer">
            <img src="img/weoffer-3.jpg" alt="">
            <h2 class="weoffer--title">плитка из царского кирпича</h2>
            <h3 class="weoffer--subtitle"></h3>
            <ul class="weoffer-list">
              <li>Длина: 240-285 мм</li>
              <li>Ширина: 60-80 мм</li>
              <li>Толщина: от 15 мм</li>
            </ul>
            <a href="#" class="btn btn-red az-btn5">получить оптовый прайс</a>
          </div><!-- /.weoffer -->

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

    <div class="mainview home-third arrow-bottom">
      <div class="vs-center-wrap arrow-top">
        <div class="vs-center">

          <div class="fogged">
            <h1 class="home-third--title">Скачайте</h1>
            <h2 class="home-third--subtitle">полный каталог</h2>
            <h3 class="home-third--thirdtitle">старинного кирпича<span>с оптовыми ценами</span></h3>
            <h4 class="home-third--description">ознакомьтесь подробнее с описанием исторической ценности и качества имперского кирпича</h4>
            <a href="#" class="btn btn-red az-btn3">скачать полный каталог</a>
          </div><!-- /.fogged -->

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

    <div class="mainview home-fourth">
      <div class="vs-center-wrap">
        <div class="vs-center">
        <h1 class="home-fourth--title arrow-top">факты о нас</h1>

        <div class="home-fourth--facts">
          <span class="facts--image">
            <img src="img/facts--image-1.png" alt="">
          </span>
          <span class="facts--descr">
            <span class="facts--count">7лет</span>
            За 7 лет работы продали более 1000000 кирпичей в 51 регион россии
          </span>
        </div><!-- /.home-fourth--facts -->
        <div class="home-fourth--facts">
          <span class="facts--image">
            <img src="img/facts--image-2.png" alt="">
          </span>
          <span class="facts--descr">
            <span class="facts--count">50К</span>
            всегда в наличии более 50000 кирпичей на нашем складе
          </span>
        </div><!-- /.home-fourth--facts -->
        <div class="home-fourth--facts">
          <span class="facts--image">
            <img src="img/facts--image-3.png" alt="">
          </span>
          <span class="facts--descr">
            <span class="facts--count">17<span>памятников</span></span>
            с помощью нашего кирпича было восстановлено 17 памятников архитектуры
          </span>
        </div><!-- /.home-fourth--facts -->

        <h1 class="home-fourth--subtitle arrow-top">преимущества работы с нами</h1>

        <div class="advantages-container">
          <div class="advantages">
            <h4 class="advantages--title">доставка по всей россии и снг</h4>
            <h5 class="advantages--description">мы сможем доставить кирпич  в любую точку России и СНГ.</h5>
          </div><!-- /.advantages -->
          <div class="advantages">
            <h4 class="advantages--title">мы продаем подлинный старинный кирпич</h4>
            <h5 class="advantages--description">весь кирпич, продаваемы нами, мы получаем, разбирая старинные здания, возрастом более 100 лет по всей россии.</h5>
          </div><!-- /.advantages -->
          <div class="advantages">
            <h4 class="advantages--title">мы сами добываем старинный кирпич</h4>
            <h5 class="advantages--description">нет наценки перекупщиков.</h5>
          </div><!-- /.advantages -->
          <div class="advantages">
            <h4 class="advantages--title">наш кирпич идеально подходит для изготовления плитки</h4>
            <h5 class="advantages--description">плитку вы можете заказать у нас или изготовить самостоятельно.</h5>
          </div><!-- /.advantages -->
        </div><!-- /.advantages-container -->

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

    <div class="mainview home-five arrow-bottom">
      <div class="vs-center-wrap arrow-top">
        <div class="vs-center">

          <div class="fogged">
            <h1 class="home-five--title">закажите</h1>
            <h2 class="home-five--subtitle">расчет стоимости партии кирпича</h2>
            <h3 class="home-five--thirdtitle"><span>по SMS</span></h3>
            <h4 class="home-five--description">введите данные в форме ниже и мы пришлем вам расчет стоимости партии кирпича в sms</h4>
            <a href="#" class="btn btn-red az-btn6">получить расчет по sms</a>
          </div><!-- /.fogged -->

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

    <div class="mainview home-six arrow-bottom">
      <div class="vs-center-wrap">
        <div class="vs-center">

          <h1 class="home-six--title arrow-top">преимущества старинного кирпича 18-19 века</h1>

          <div class="fogged">
            <div class="home-six--item">
              <h5 class="home-six--item-t">подлинность</h5>
              <h6 class="home-six--item-d">настоящий стиль <span>LOFT</span> только из этого кирпича</h6>
            </div><!-- /.home-six--item -->
            <div class="home-six--item">
              <h5 class="home-six--item-t">ручная работа</h5>
              <h6 class="home-six--item-d">каждый кирпич неповторим, т.к. создавался вручную</h6>
            </div><!-- /.home-six--item -->
            <div class="home-six--item">
              <h5 class="home-six--item-t">Экологичность</h5>
              <h6 class="home-six--item-d">глина и вода — весь состав старинного кирпича</h6>
            </div><!-- /.home-six--item -->
            <div class="home-six--item">
              <h5 class="home-six--item-t">уникальность</h5>
              <h6 class="home-six--item-d">рисунок и фактура созданы самим временем</h6>
            </div><!-- /.home-six--item -->
            <div class="home-six--item">
              <h5 class="home-six--item-t">качество</h5>
              <h6 class="home-six--item-d">на каждый кирпич наносили клеймо-знак качества конкретного кирпичного завода</h6>
            </div><!-- /.home-six--item -->
            <div class="home-six--item">
              <h5 class="home-six--item-t">прочность</h5>
              <h6 class="home-six--item-d">характеристики старинного кирпича превосходят современные стандарты кирпича М-150</h6>
            </div><!-- /.home-six--item -->
          </div><!-- /.fogged -->

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

    <div class="mainview home-seven arrow-bottom" id="sendfile">
      <div class="vs-center-wrap arrow-top">
        <div class="vs-center">

          <div class="fogged">
            <h1 class="home-seven--title">есть готовый  эскиз вашего проекта?</h1>
            <h2 class="home-seven--subtitle">узнайте стоимость</h2>
            <h3 class="home-seven--thirdtitle">партии материала для него</h3>
            <h4 class="home-seven--fourthtitle">прямо сейчас</h4>
            <h5 class="home-seven--description">загрузите фотографию или эскиз проекта и мы сообщим примерную стоимость материала за 20 минут</h5>
            <div class="form-container">
              <div class="ah-imgbox">
                <img src="img/home-seven-1.png" alt="">
              </div>
              <?php //if($is_uploaded): ?>
              <form class="common-form" enctype="multipart/form-data" action="/#sendfile" method="post">
              <?php if(!$is_uploaded): ?>
                <input type="hidden" name="popup" value="загрузите фотографию или эскиз проекта и мы сообщим примерную стоимость материала за 20 минут">
                <input type="hidden" name="email" placeholder="E-mail" value="noemail@noemail.ru">
                <input type="text" name="phone" placeholder="номер телефона">
                <input type="file" name="azfile" class="az-file" id="az-file"><input class="az-file2" type="text" placeholder="прикрепить файл">
                <button class="btn btn-red">узнать стоимость</button>
              <?php else: ?>
                <!-- form-sended -->
                <span class="az-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
              <?php endif; ?>
              </form>
              
              <div class="ah-imgbox">
                <img src="img/home-seven-2.png" alt="">
              </div>
            </div><!-- /.form-container -->
          </div><!-- /.fogged -->

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

    <div class="mainview home-eight arrow-bottom">
      <div class="vs-center-wrap arrow-top">
        <div class="vs-center">

          <div class="fogged">
            <h1 class="home-eight--title">доставим старинный кирпич</h1>
            <h2 class="home-eight--subtitle">в любую точку россии и снг</h2>
            <h3 class="home-eight--thirdtitle">узнайте стоимость партии с доставкой до порога</h3>
            <a href="#" class="btn btn-red az-btn7">узнать стоимость</a>
            <h5 class="home-eight--description">остались вопросы?</h5>
            <a href="#" class="ah-linkmen az-btn4"><h4 class="home-eight--fourthtitle"><span>задайте их менеджеру</span></h4></a>
          </div><!-- /.fogged -->

        </div><!-- vs-center -->
      </div><!-- vs-center-wrap -->
    </div><!-- mainview -->

  </div><!-- mainbag -->
  <div class="modalbg modal-ancient-offer">
    <div class="modal-c">
      <h5>получите полный каталог</h5>
      <h6>заполните поля ниже и мы вышлем вам полный каталог старинного кирпича</h6>
      <form method="post">
        <input type="hidden" name="popup" value="заполните поля ниже и мы вышлем вам полный каталог старинного кирпича">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="номер телефона">
        <button class="btn btn-red">получить полный каталог</button>
      </form>
      <span class="form-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
      <span class="close"></span>
    </div><!-- /.modal-c -->
  </div><!-- /.modalbg -->

  <div class="modalbg modal-ancient-sms">
    <div class="modal-c">
      <h6>введите данные в форму ниже мы свяжемся с вами и обсудим детли вашего проекта </h6>
      <form method="post">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="номер телефона">
        <button class="btn btn-red">получить полный каталог</button>
      </form>
      <span class="form-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
      <span class="close"></span>
    </div><!-- /.modal-c -->
  </div><!-- /.modalbg -->

  <div class="modalbg">
    <div class="modal-c">
      <h5>получите полный каталог</h5>
      <h6>заполните поля ниже и мы вышлем вам полный каталог старинного кирпича</h6>
      <form action="">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="номер телефона">
        <button class="btn btn-red">получить полный каталог</button>
      </form>
      <span class="close"></span>
    </div><!-- /.modal-c -->
  </div><!-- /.modalbg -->

  <div class="modalbg modal-star-kirpich">
    <div class="modal-c">
      <h5>получите оптовую цену на старинный кирпич</h5>
      <h6>заполните поля ниже и мы вышлем вам оптовый прайс на старинный кирпич</h6>
      <form action="">
        <input type="hidden" name="popup" value="получите оптовую цену на старинный кирпич">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="номер телефона">
        <button class="btn btn-red">получить полный каталог</button>
      </form>
      <span class="form-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
      <span class="close"></span>
    </div><!-- /.modal-c -->
  </div><!-- /.modalbg -->

  <div class="modalbg modal-star-kirpich2">
    <div class="modal-c">
      <h5>получите полный каталог</h5>
      <h6>заполните поля ниже и мы вышлем вам расчет стоимости партии старинного кирпича по sms</h6>
      <form action="">
        <input type="hidden" name="popup" value="заполните поля ниже и мы вышлем вам расчет стоимости партии старинного кирпича по sms">
        <input type="hidden" name="email" placeholder="E-mail" value="noemail@noemail.ru">
        <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="НОМЕР ТЕЛЕФОНА">
        <textarea name="text" id="" cols="30" rows="10" class="az-textarea" placeholder="ОБЪЕМ ЗАКАЗА, НАПРИМЕР КИРПИЧ - 7000ШТ ИЛИ S ОБЛИЦОВКИ ИЛИ ОТДЕЛКИ - 150КВ.М."></textarea>
        <button class="btn btn-red">получить полный каталог</button>
      </form>
      <span class="form-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
      <span class="close"></span>
    </div><!-- /.modal-c -->
  </div><!-- /.modalbg -->

  <div class="modalbg modalbg-manager">
    <div class="modal-c">
      <h5>задайте ваш вопрос менеджеру</h5>
      <h6>заполните поля ниже и наш менеджер ответит вам в ближайшее время</h6>
      <form action="">
        <input type="hidden" name="popup" value="заполните поля ниже и наш менеджер ответит вам в ближайшее время">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="номер телефона">
        <textarea name="text" id="" cols="30" rows="10" class="az-textarea" placeholder="ОБЪЕМ ЗАКАЗА, НАПРИМЕР КИРПИЧ - 7000ШТ ИЛИ S ОБЛИЦОВКИ ИЛИ ОТДЕЛКИ - 150КВ.М."></textarea>
        <button class="btn btn-red">задать вопрос</button>
      </form>
      <span class="form-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
      <span class="close"></span>
    </div><!-- /.modal-c -->
  </div><!-- /.modalbg -->

  <div class="modalbg modalbg-deliver">
    <div class="modal-c">
      <h5>узнайте стоимость с доставкой</h5>
      <h6>заполните поля ниже и мы сделаем расчет партии материалов с доставкой до вашей двери</h6>
      <form action="">
        <input type="hidden" name="popup" value="заполните поля ниже и мы сделаем расчет партии материалов с доставкой до вашей двери">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="phone" data-inputmask="'alias': 'phone'" placeholder="номер телефона">
        <textarea name="text" id="" cols="30" rows="10" class="az-textarea" placeholder="ОБЪЕМ ЗАКАЗА, НАПРИМЕР КИРПИЧ - 7000ШТ ИЛИ S ОБЛИЦОВКИ ИЛИ ОТДЕЛКИ - 150КВ.М."></textarea>
        <button class="btn btn-red">задать вопрос</button>
      </form>
      <span class="form-sended">ваша заяка принята<span>мы свяжемся с вами в ближайшее время</span></span>
      <span class="close"></span>
    </div><!-- /.modal-c -->
  </div><!-- /.modalbg -->

  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <script type="text/javascript" src="js/script2.js"></script>

</body>
</html>
