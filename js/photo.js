'use strict';

(function () {
  var FILE_TYPES = ['jpg', 'jpeg', 'png', 'svg'];
  var HIDDEN_CLASSNAME = 'visually-hidden';
  var MAX_SIZE = 200000;


  var getElementBySelector = function (parentObject, selector) {
    if (parentObject) {
      return parentObject.querySelector(selector);
    }
    return false;
  };

  var removeClassName = function (element, className) {
    if (element && element.classList.contains(className)) {
      element.classList.remove(className);
    }
  };

  var addClassName = function (element, className) {
    if (element && !element.classList.contains(className)) {
      element.classList.add(className);
    }
  };

  var loadPicture = function () {
    if (linkWrapper && linkUploadFile && linkImgPreview && linkFileName) {
      var file = linkUploadFile.files[0];
      var fileName = file.name.toLowerCase();
      var matches = FILE_TYPES.some(function (item) {
        return fileName.endsWith(item);
      });
      if (matches && (file.size <= MAX_SIZE)) {
        var reader = new FileReader();
        reader.addEventListener('load', function () {
          linkImgPreview.src = reader.result;
        });
        reader.readAsDataURL(file);
        linkFileName.textContent = fileName;
        removeClassName(linkWrapper, HIDDEN_CLASSNAME);
      }
    }
  };

  var clearPicture = function () {
    if (linkWrapper && linkUploadFile && linkImgPreview && linkFileName) {
      addClassName(linkWrapper, HIDDEN_CLASSNAME);
      linkImgPreview.src = '';
      linkFileName.textContent = '';
      linkUploadFile.files = {};
    }
  };

  var onUploadFileChange = function (evt) {
    evt.preventDefault();
    loadPicture();
  };

  var onClearFile = function (evt) {
    evt.preventDefault();
    clearPicture();
  };

  var endsWithSupport = function () {
    if (!String.prototype.endsWith) {
      String.prototype.endsWith = function (searchString, position) {
        var subjectString = this.toString();
        if (typeof position !== 'number' || !isFinite(position) || Math.floor(position) !== position || position > subjectString.length) {
          position = subjectString.length;
        }
        position -= searchString.length;
        var lastIndex = subjectString.indexOf(searchString, position);
        return lastIndex !== -1 && lastIndex === position;
      };
    }
  };

  endsWithSupport();

  var container = document.querySelector('.form__input-container');
  var linkImgPreview = getElementBySelector(container, '.form__image');
  var linkFileName = getElementBySelector(container, '.form__file-name');
  var linkUploadFile = getElementBySelector(container, '.form__input-file');
  var linkDeleteFile = getElementBySelector(container, '.form__delete-button');
  var linkWrapper = getElementBySelector(container, '.form__file');

  if (linkWrapper && linkUploadFile && linkImgPreview && linkFileName) {
    addClassName(linkWrapper, HIDDEN_CLASSNAME);
    linkUploadFile.addEventListener('change', onUploadFileChange);
    linkDeleteFile.addEventListener('click', onClearFile);
  }

})();