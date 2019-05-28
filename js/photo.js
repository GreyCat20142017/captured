'use strict';

(function () {
  var PHOTO_KEY = 'data-id';
  var FILE_TYPES = ['jpg', 'jpeg', 'png'];
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
    if (links.wrapper && links.uploadFile && links.imgPreview && links.fileName) {
      var file = links.uploadFile.files[0];
      var fileName = file.name.toLowerCase();
      var matches = FILE_TYPES.some(function (item) {
        return fileName.endsWith(item);
      });
      if (matches && (file.size <= MAX_SIZE)) {
        var reader = new FileReader();
        reader.addEventListener('load', function () {
          links.imgPreview.src = reader.result;
        });
        reader.readAsDataURL(file);
        links.fileName.textContent = fileName;
        removeClassName(links.wrapper, HIDDEN_CLASSNAME);
      }
    }
  };

  var clearPicture = function () {
    if (links.wrapper && links.uploadFile && links.imgPreview && links.fileName) {
    addClassName(links.wrapper, HIDDEN_CLASSNAME);
      links.imgPreview.src = '';
      links.fileName.textContent = '';
      links.uploadFile.files = {};
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

  var main = document.body;
  var container = getElementBySelector(main, '.adding-post__input-file-container.form__input-container');

  var links = {
    imgPreview: getElementBySelector(container, '.adding-post__image'),
    fileName: getElementBySelector(container, '.adding-post__file-name'),
    uploadFile: getElementBySelector(container, '.adding-post__input-file'),
    deleteFile: getElementBySelector(container, '.adding-post__delete-button'),
    wrapper: getElementBySelector(container, '.adding-post__file')
  };

  main = null;
  container = null;

  if (links.wrapper && links.uploadFile && links.imgPreview && links.fileName) {
    addClassName(links.wrapper, HIDDEN_CLASSNAME);
    links.uploadFile.addEventListener('change', onUploadFileChange);
    links.deleteFile.addEventListener('click', onClearFile);
  };


})();