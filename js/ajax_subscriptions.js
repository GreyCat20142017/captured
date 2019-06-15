'use strict';

/**
 * Для подключения скриптов c ajax к шаблонам,
 * необходимо в шаблон layout.php передать параметр 'js_scripts' => ['backend.php', 'ajax.php'].
 * В шаблонах для контейнеров постов со ссылками обмена данными с использованием ajax - присвоить класс js-posts-container
 */

(function () {

  var AJAX_METHODS = {POST: 'POST', GET: 'GET'};
  var BLOGGER_ID = 'data-blogger';
  var SIGN_TEXT = 'ПОДПИСАТЬСЯ';
  var UNSIGN_TEXT = 'ОТПИСАТЬСЯ';

  var getTextForm = function (sourceNumber, textForms) {
    sourceNumber = Math.abs(sourceNumber) % 100;
    var temporaryNumber = sourceNumber % 10;
    if (sourceNumber > 10 && sourceNumber < 20) {
      return textForms[2];
    }
    if (temporaryNumber > 1 && temporaryNumber < 5) {
      return textForms[1];
    }
    if (temporaryNumber === 1) {
      return textForms[0];
    }
    return textForms[2];
  };

  var changeSubscription = function (bloggerId, callFromSingle) {
    if (window.backend) {
      window.backend.getPostData(AJAX_METHODS.GET, 'api.php?change_subscription=1&call_from_single=' + callFromSingle + '&blogger=' + bloggerId, onChangeSubscriptionSuccess, onError, false);
    }
  };

  var onChangeSubscriptionSuccess = function (response) {
    pressedButton.textContent = (response['subscribed']) ? UNSIGN_TEXT : SIGN_TEXT;
    window.backend.getPostData(AJAX_METHODS.GET, 'api.php?get_subscribers_count=1&blogger=' + response['blogger'], onSuccessGetSubscriberCount, onError, false);
  };

  var onSuccessGetSubscriberCount = function (response) {
    var span = userContainer.querySelector('span[' + BLOGGER_ID + '-content="' + response['blogger'] + '"]');
    span = span || subscribersContainer.querySelector('span[' + BLOGGER_ID  + '-content="' + response['blogger'] + '"]');
    if (span) {
      span.textContent = '' + response['subscribers'];
      span.nextElementSibling.textContent = getTextForm(parseInt(response['subscribers'], 10),
        ['подписчик', 'подписчика', 'подписчиков']);
    }
  };

  var onError = function (errorMessage) {
    console.log(errorMessage);
  };

  var onSubscribersContainerClick = function (evt) {

    var element = evt.target;
    if (element.tagName.toUpperCase() !== 'A') {
      return false;
    }

    if (element.hasAttribute('href') && element.classList.contains('user__button--subscription') &&
      element.hasAttribute(BLOGGER_ID)) {
      evt.preventDefault();
      pressedButton = element;
      changeSubscription(element.getAttribute(BLOGGER_ID), 0);
    }

    return false;
  };

  var onUserButtonClick = function (evt) {
    var element = evt.target;
    if (element.hasAttribute(BLOGGER_ID)) {
      evt.preventDefault();
      pressedButton = element;
      changeSubscription(element.getAttribute(BLOGGER_ID), 1);
    }
  }

  /**
   * Если IE - то без ajax
   */
  if (navigator.userAgent.indexOf('Trident/') < 0) {
    var pressedButton  = null;
    var userContainer = document.querySelector('.user');
    var subscribersContainer = document.querySelector('.js-subscriptions-container');
    if (subscribersContainer) {
      subscribersContainer.addEventListener('click', onSubscribersContainerClick);
    }

    var userButton = userContainer ? userContainer.querySelector('.js-subscription-single') : null;
    if (userButton) {
      userButton.addEventListener('click', onUserButtonClick);
    }
  }

})();