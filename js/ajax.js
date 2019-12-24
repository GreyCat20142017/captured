'use strict';

/**
 * Для подключения скриптов c ajax к шаблонам,
 * необходимо в шаблон layout.php передать параметр 'js_scripts' => ['backend.php', 'ajax.php'].
 * В шаблонах для контейнеров постов со ссылками обмена данными с использованием ajax - присвоить класс js-posts-container
 */


(function () {

  var AJAX_METHODS = {POST: 'POST', GET: 'GET'};
  var POST_ID = 'data-post';
  var CONSIDERABLE_TAGS = ['A', 'SPAN', 'SVG', 'USE', 'PATH'];

  var notIE = (navigator.userAgent.indexOf('Trident/') < 0);

  var changeLike = function (postId) {
    if (window.backend) {
      window.backend.getPostData(AJAX_METHODS.GET, 'api.php?change_like=1&post=' + postId, onChangeLikeSuccess, onError, false);
    }
  };

  var onChangeLikeSuccess = function (response) {
    if (response) {
      window.backend.getPostData(AJAX_METHODS.GET, 'api.php?get_likes_count=1&post=' + response['post'], onSuccessGetLikesCount, onError, false);
    }
  };

  var onSuccessGetLikesCount = function (response) {
    if (response) {
      var span = linkContainer.querySelector('span[' + POST_ID + '-like="' + response['post'] + '"]');
      if (span) {
        span.textContent = '' + response['likes'];
      }
    }
  };

  var changeRepost = function (postId) {
    if (window.backend) {
      window.backend.getPostData(AJAX_METHODS.GET, 'api.php?change_repost=1&post=' + postId, onChangeRepostSuccess, onError, false);
    }
  };

  var onChangeRepostSuccess = function (response) {
    window.backend.getPostData(AJAX_METHODS.GET, 'api.php?get_reposts_count=1&post=' + response['post'], onSuccessGetRepostsCount, onError, false);
  };

  var onSuccessGetRepostsCount = function (response) {
    var span = linkContainer.querySelector('span[' + POST_ID + '-repost="' + response['post'] + '"]');
    if (span) {
      span.textContent = '' + response['reposts'];
    }
  };

  var onError = function (errorMessage) {
    console.log(errorMessage);
  };

  var createVideo = function (id) {
    var video = document.createElement('iframe');
    var ref = 'https://www.youtube.com/embed/' + id + '?autoplay=0';
    video.setAttribute('src', ref);
    video.setAttribute('id', id);
    video.setAttribute('class', 'video-play video-iframe');
    return video;
  };

  var setPlayer = function (id, element, videoContainer) {
    if (videoContainer.classList.contains('video-container')) {
      element.classList.add('visually-hidden');
      videoContainer.appendChild(createVideo(id));
    }
  };

  var needSkip = function (element) {
    return !element['tagName'] || !element['classList'];
  };

  var onContainerClick = function (evt) {

    var element = evt.target;

    if (CONSIDERABLE_TAGS.indexOf(needSkip(element)|| element.tagName.toUpperCase()) < 0 || element.classList.contains('comments__button')) {
      return false;
    }

    while (!element['classList'] || !element.classList.contains('js-indicator') && element !== linkContainer) {
      element = element.parentNode;
    }

    if (element.hasAttribute('href') && element.classList.contains('js-indicator--likes') && element.parentElement.hasAttribute(POST_ID)) {
      if (notIE) {
        evt.preventDefault();
        changeLike(element.parentElement.getAttribute(POST_ID));
      }
      return false;
    }

    if (element.hasAttribute('href') && element.classList.contains('js-indicator--repost') && element.parentElement.hasAttribute(POST_ID)) {
      if (notIE) {
        evt.preventDefault();
        changeRepost(element.parentElement.getAttribute(POST_ID));
      }
      return false;
    }

    if (element.classList.contains('js-indicator--video') && element.hasAttribute('data-youtube-id')) {
      evt.preventDefault();
      setPlayer(element.getAttribute('data-youtube-id'), element, element.parentElement);
      return false;
    }

    if (element.hasAttribute('href') &&
      element.classList.contains('js-indicator--comments') && element.parentElement.hasAttribute(POST_ID)) {
      evt.preventDefault();
      window.location = '/' + element.getAttribute('href');
    }

    return false;
  };

  var linkContainer = document.querySelector('.js-posts-container');

  if (linkContainer) {
    linkContainer.addEventListener('click', onContainerClick);
  }
})();
