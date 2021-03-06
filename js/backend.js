'use strict';

(function () {

  var RESPONSE_TYPE = 'json';
  var RESPONSE_TIMEOUT = 8000;
  var STATUS_OK = 200;

  var getPostData = function (method, url, onLoad, onError, data) {
    var xhr =  new XMLHttpRequest();
    xhr.responseType = RESPONSE_TYPE;

    xhr.addEventListener('load', function () {
      if (xhr.status === STATUS_OK) {
        onLoad(xhr.response);
      } else {
        onError('Статус: ' + xhr.status + ' ' + xhr.statusText);
      }
    });
    xhr.addEventListener('error', function () {
      onError('Ошибка соединения ' + xhr.status + ' ' + xhr.statusText);
    });
    xhr.addEventListener('timeout', function () {
      onError('Превышен таймаут ' + xhr.timeout + 'мс');
    });

    xhr.timeout = RESPONSE_TIMEOUT;

    xhr.open(method, url);
    if (data) {
      xhr.send(data);
    } else {
      xhr.send();
    }
  };

  window.backend = {
    getPostData: getPostData
  };

})();
