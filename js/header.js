'use strict';

(function () {
  var CONSIDERABLE_TAGS = ['A', 'SPAN', 'SVG', 'USE'];
  var TOGGLER_CLASSNAME = 'navbar-toggler';
  var TOGGLER_SELECTOR = '.navbar-toggler, .navbar-toggler > span';
  var TOGGLER_COLLAPSED_CLASSNAME = 'collapsed';
  var NAVBAR_SELECTOR = '.navbar-collapse.collapse';
  var DROPDOWN_ITEM_CLASSNAME = 'dropdown-item';
  var DROPDOWN_MENU_CLASSNAME = 'dropdown-menu';
  var DROPDOWN_TOGGLE_CLASSNAME = 'dropdown-toggle';
  var SHOW_CLASSNAME = 'show';
  var ESC_KEYCODE = 27;


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

  var hideDropdown = function (target) {
    if (linkContainer) {
      var clicked = target ? target.nextElementSibling : null;
      var menu = linkContainer.querySelector('.' + DROPDOWN_TOGGLE_CLASSNAME + ' + .' + DROPDOWN_MENU_CLASSNAME + '.' + SHOW_CLASSNAME);
      if (menu && menu !== clicked) {
        removeClassName(menu, SHOW_CLASSNAME);
      }
    }
  };

  var showDropdown = function (element) {
    addClassName(element.nextElementSibling, SHOW_CLASSNAME);
  };

  var onDocumentKeyDown = function (evt) {
    if (evt.keyCode === ESC_KEYCODE) {
      hideDropdown(null);
    }
  };

  var needSkip = function (element) {
    return !element['tagName'] || !element['classList'];
  };

  var onContainerClick = function (evt) {

    var element = evt.target;


    if (needSkip(element) || CONSIDERABLE_TAGS.indexOf(element.tagName.toUpperCase()) < 0 || element.classList.contains(DROPDOWN_ITEM_CLASSNAME)) {
      return false;
    }

    while (!element['classList'] || element.tagName !== 'A' && element !== linkContainer) {
      element = element.parentNode;
    }

    if (element.classList.contains(DROPDOWN_TOGGLE_CLASSNAME)) {
      evt.preventDefault();
      showDropdown(element);
      return false;
    }

    return false;
  };

  var onDocumentMouseUp = function (evt) {
    hideDropdown(evt.target);
  };

  var navbarSwitchState = function (toggler) {
    var navbar = getElementBySelector(linkContainer, NAVBAR_SELECTOR);
    if (navbar && toggler) {
      if (toggler.classList.contains(TOGGLER_COLLAPSED_CLASSNAME)) {
        removeClassName(toggler, TOGGLER_COLLAPSED_CLASSNAME);
        removeClassName(navbar, SHOW_CLASSNAME);
      } else {
        addClassName(toggler, TOGGLER_COLLAPSED_CLASSNAME);
        addClassName(navbar, SHOW_CLASSNAME);
      }
    }
  };

  var onTogglerClick = function (evt) {
    var toggler = evt.target;
    if (toggler && (toggler.classList.contains(TOGGLER_CLASSNAME) || toggler.parentElement.classList.contains(TOGGLER_CLASSNAME))) {
      toggler = toggler.classList.contains(TOGGLER_CLASSNAME) ? toggler : toggler.parentElement;
      navbarSwitchState(toggler);
    }
  };


  var linkContainer = document.querySelector('.header');
  var navbarToggler = getElementBySelector(linkContainer, TOGGLER_SELECTOR);

  if (linkContainer) {
    linkContainer.addEventListener('click', onContainerClick);
    document.addEventListener('keydown', onDocumentKeyDown);
    document.addEventListener('mouseup', onDocumentMouseUp);

    if (navbarToggler) {
      navbarToggler.addEventListener('click', onTogglerClick);
    }
  }

})();
