<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>readme: блог, каким он должен быть</title>
    <link rel="stylesheet" href="css/main.css">
  </head>

  <body class="page <?= $body_classname; ?>">
    <?= $page_content; ?>
    <footer class="footer footer--main">
      <div class="footer__wrapper">
        <div class="footer__container container">
          <div class="footer__site-info">
            <div class="footer__site-nav">
              <ul class="footer__info-pages">
                <li class="footer__info-page">
                  <a class="footer__page-link" href="#">О проекте</a>
                </li>
                <li class="footer__info-page">
                  <a class="footer__page-link" href="#">Реклама</a>
                </li>
                <li class="footer__info-page">
                  <a class="footer__page-link" href="#">О разработчиках</a>
                </li>
                <li class="footer__info-page">
                  <a class="footer__page-link" href="#">Работа в Readme</a>
                </li>
                <li class="footer__info-page">
                  <a class="footer__page-link" href="#">Соглашение пользователя</a>
                </li>
                <li class="footer__info-page">
                  <a class="footer__page-link" href="#">Политика конфиденциальности</a>
                </li>
              </ul>
            </div>
            <p class="footer__license">
              При использовании любых материалов с сайта обязательно указание Readme в качестве источника. Все авторские и исключительные права в рамках проекта защищены в соответствии с положениями 4 части Гражданского Кодекса Российской Федерации.
            </p>
          </div>
          <div class="footer__my-info">
            <ul class="footer__my-pages">
              <li class="footer__my-page footer__my-page--feed">
                <a class="footer__page-link" href="feed.html">Моя лента</a>
              </li>
              <li class="footer__my-page footer__my-page--popular">
                <a class="footer__page-link" href="popular.html">Популярный контент</a>
              </li>
              <li class="footer__my-page footer__my-page--messages">
                <a class="footer__page-link" href="messages.html">Личные сообщения</a>
              </li>
            </ul>
            <div class="footer__copyright">
              <a class="footer__copyright-link" href="#">
                <span>Разработано HTML Academy</span>
                <svg class="footer__copyright-logo" width="27" height="34">
                  <use xlink:href="#icon-htmlacademy"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
