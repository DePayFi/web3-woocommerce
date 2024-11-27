/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ 637:
/***/ (() => {

/*! matchMedia() polyfill addListener/removeListener extension. Author & copyright (c) 2012: Scott Jehl. MIT license */
(function(){
    // Bail out for browsers that have addListener support
    if (window.matchMedia && window.matchMedia('all').addListener) {
        return false;
    }

    var localMatchMedia = window.matchMedia,
        hasMediaQueries = localMatchMedia('only all').matches,
        isListening     = false,
        timeoutID       = 0,    // setTimeout for debouncing 'handleChange'
        queries         = [],   // Contains each 'mql' and associated 'listeners' if 'addListener' is used
        handleChange    = function(evt) {
            // Debounce
            clearTimeout(timeoutID);

            timeoutID = setTimeout(function() {
                for (var i = 0, il = queries.length; i < il; i++) {
                    var mql         = queries[i].mql,
                        listeners   = queries[i].listeners || [],
                        matches     = localMatchMedia(mql.media).matches;

                    // Update mql.matches value and call listeners
                    // Fire listeners only if transitioning to or from matched state
                    if (matches !== mql.matches) {
                        mql.matches = matches;

                        for (var j = 0, jl = listeners.length; j < jl; j++) {
                            listeners[j].call(window, mql);
                        }
                    }
                }
            }, 30);
        };

    window.matchMedia = function(media) {
        var mql         = localMatchMedia(media),
            listeners   = [],
            index       = 0;

        mql.addListener = function(listener) {
            // Changes would not occur to css media type so return now (Affects IE <= 8)
            if (!hasMediaQueries) {
                return;
            }

            // Set up 'resize' listener for browsers that support CSS3 media queries (Not for IE <= 8)
            // There should only ever be 1 resize listener running for performance
            if (!isListening) {
                isListening = true;
                window.addEventListener('resize', handleChange, true);
            }

            // Push object only if it has not been pushed already
            if (index === 0) {
                index = queries.push({
                    mql         : mql,
                    listeners   : listeners
                });
            }

            listeners.push(listener);
        };

        mql.removeListener = function(listener) {
            for (var i = 0, il = listeners.length; i < il; i++){
                if (listeners[i] === listener){
                    listeners.splice(i, 1);
                }
            }
        };

        return mql;
    };
}());


/***/ }),

/***/ 733:
/***/ (() => {

/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas, David Knight. MIT license */

window.matchMedia || (window.matchMedia = function() {
    "use strict";

    // For browsers that support matchMedium api such as IE 9 and webkit
    var styleMedia = (window.styleMedia || window.media);

    // For those that don't support matchMedium
    if (!styleMedia) {
        var style       = document.createElement('style'),
            script      = document.getElementsByTagName('script')[0],
            info        = null;

        style.type  = 'text/css';
        style.id    = 'matchmediajs-test';

        if (!script) {
          document.head.appendChild(style);
        } else {
          script.parentNode.insertBefore(style, script);
        }

        // 'style.currentStyle' is used by IE <= 8 and 'window.getComputedStyle' for all other browsers
        info = ('getComputedStyle' in window) && window.getComputedStyle(style, null) || style.currentStyle;

        styleMedia = {
            matchMedium: function(media) {
                var text = '@media ' + media + '{ #matchmediajs-test { width: 1px; } }';

                // 'style.styleSheet' is used by IE <= 8 and 'style.textContent' for all other browsers
                if (style.styleSheet) {
                    style.styleSheet.cssText = text;
                } else {
                    style.textContent = text;
                }

                // Test if media query is true or false
                return info.width === '1px';
            }
        };
    }

    return function(media) {
        return {
            matches: styleMedia.matchMedium(media || 'all'),
            media: media || 'all'
        };
    };
}());


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";

;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/modules/General.js
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var General = /*#__PURE__*/function () {
  function General() {
    _classCallCheck(this, General);
    this.html = document.querySelector("html");
    this.body = document.body;
    this.events();
    this.preloader();
    this.masonry();
    this.menuAccessibility();
    this.mobileAccessibility();
    this.responsiveTables();
  }
  _createClass(General, [{
    key: "events",
    value: function events() {
      window.addEventListener("load", this.triggerResize);
    }
  }, {
    key: "triggerResize",
    value: function triggerResize() {
      var resizeEvent = window.document.createEvent("UIEvents");
      resizeEvent.initUIEvent("resize", true, false, window, 0);
      window.dispatchEvent(resizeEvent);
    }
  }, {
    key: "preloader",
    value: function preloader() {
      var loaderMask = document.querySelector(".loader-mask");
      var loader = document.querySelector(".loader");
      if (loader) {
        loaderMask.addEventListener("transitionend", function () {
          loaderMask.remove();
          loaderMask.classList.add("preloader--loaded");
        });
        loader.style.opacity = "0";
        setTimeout(function () {
          loaderMask.style.opacity = "0";
        }, 350);
        loaderMask.style.opacity = "0";
      }
    }
  }, {
    key: "masonry",
    value: function masonry() {
      var grid = document.getElementById("masonry-grid");
      if (!grid) {
        return;
      }
      var masonry = new Masonry(grid, {
        columnWidth: ".masonry-item",
        itemSelector: ".masonry-item",
        percentPosition: true
      });
      imagesLoaded(grid).on("progress", function () {
        masonry.layout();
      });
    }
  }, {
    key: "menuAccessibility",
    value: function menuAccessibility() {
      // Get all the link elements within the primary menu.
      var i,
        links = document.querySelectorAll(".eversor-nav-menu__item, .nav__menu a"),
        menu = document.querySelectorAll(".eversor-nav-menu__list, .nav__menu");
      if (0 === menu.length) {
        return false;
      }

      // Each time a menu link is focused or blurred, toggle focus.
      for (i = 0; i < links.length; i++) {
        links[i].addEventListener("focus", toggleFocus, true);
        links[i].addEventListener("blur", toggleFocus, true);
      }
      function hasClass(element, className) {
        return (" " + element.className + " ").indexOf(" " + className + " ") > -1;
      }

      // Sets or removes the .focus class on an element.
      function toggleFocus() {
        var self = this;
        menu = hasClass(self, "eversor-nav-menu__item") ? "eversor-nav-menu__list" : "nav__menu";

        // Move up through the ancestors of the current link until we hit menu list class.
        while (-1 === self.className.indexOf(menu)) {
          // On li elements toggle the class .focus.
          if ("li" === self.tagName.toLowerCase()) {
            if (-1 !== self.className.indexOf("focus")) {
              self.className = self.className.replace(" focus", "");
            } else {
              self.className += " focus";
            }
          }
          self = self.parentElement;
        }
      }
    }
  }, {
    key: "mobileAccessibility",
    value: function mobileAccessibility() {
      document.addEventListener("keydown", function (e) {
        var tabKey, shiftKey, selectors, elements, mobileMenu, activeEl, lastEl, firstEl;
        if (this.body.classList.contains("showing-modal")) {
          var trapFocus = function trapFocus(firstEl, lastEl) {
            tabKey = e.key === "Tab" || e.keyCode === 9;
            shiftKey = e.shiftKey;
            if (!shiftKey && tabKey && lastEl === activeEl) {
              e.preventDefault();
              firstEl.focus();
            }
            if (shiftKey && tabKey && firstEl === activeEl) {
              e.preventDefault();
              lastEl.focus();
            }
          };
          selectors = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
          activeEl = document.activeElement;

          // Search
          if (this.body.classList.contains("showing-search-modal")) {
            var search = document.querySelectorAll(".xhibiter-menu-search");
            for (var i = 0; i < search.length; i++) {
              firstEl = search[i].querySelector(".search-input");
              lastEl = search[i].querySelector(".search-button");
              trapFocus(firstEl, lastEl);
            }
          }

          // Nav
          if (this.body.classList.contains("showing-nav-modal")) {
            mobileMenu = document.querySelector(".nav__wrap");
            firstEl = document.querySelector("#nav__icon-toggle");
            elements = mobileMenu.querySelectorAll(selectors);
            elements = Array.prototype.slice.call(elements);
            elements = elements.filter(function (element) {
              return null !== element.offsetParent;
            });
            lastEl = elements[elements.length - 1];
            trapFocus(firstEl, lastEl);
          }
        }
      });
    }
  }, {
    key: "responsiveTables",
    value: function responsiveTables() {
      var tables = document.querySelectorAll(".wp-block-table");
      if (!tables.length > 0) {
        return;
      }
      for (var i = 0; i < tables.length; i++) {
        var table = tables[i].innerHTML;
        var tableResponsive = '<div class="table-responsive">' + table + "</div>";
        tables[i].innerHTML = tableResponsive;
      }
    }
  }]);
  return General;
}();
/* harmony default export */ const modules_General = (General);
;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/modules/Header.js
function Header_typeof(obj) { "@babel/helpers - typeof"; return Header_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, Header_typeof(obj); }
function Header_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function Header_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, Header_toPropertyKey(descriptor.key), descriptor); } }
function Header_createClass(Constructor, protoProps, staticProps) { if (protoProps) Header_defineProperties(Constructor.prototype, protoProps); if (staticProps) Header_defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function Header_toPropertyKey(arg) { var key = Header_toPrimitive(arg, "string"); return Header_typeof(key) === "symbol" ? key : String(key); }
function Header_toPrimitive(input, hint) { if (Header_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (Header_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var Header = /*#__PURE__*/function () {
  function Header() {
    Header_classCallCheck(this, Header);
    this.header = document.querySelector(".js-page-header");
    this.stickyHeader = document.querySelector(".js-page-header--sticky");
    this.headerPlaceholder = document.querySelector(".js-header-placeholder");
    if (this.header) {
      this.initStickyNavbar();
      this.events();
    }
  }
  Header_createClass(Header, [{
    key: "initStickyNavbar",
    value: function initStickyNavbar() {
      if (window.scrollY > 0) {
        this.header.classList.add("js-page-header--is-sticky");
      } else {
        this.header.classList.remove("js-page-header--is-sticky");
      }
      if (!this.stickyHeader) {
        return;
      }
      this.headerPlaceholder.style.height = this.stickyHeader.offsetHeight + "px";
    }
  }, {
    key: "events",
    value: function events() {
      var _this = this;
      window.addEventListener("scroll", function (e) {
        return _this.initStickyNavbar(e);
      });
    }
  }]);
  return Header;
}();
/* harmony default export */ const modules_Header = (Header);
;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/modules/MobileMenu.js
function MobileMenu_typeof(obj) { "@babel/helpers - typeof"; return MobileMenu_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, MobileMenu_typeof(obj); }
function MobileMenu_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function MobileMenu_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, MobileMenu_toPropertyKey(descriptor.key), descriptor); } }
function MobileMenu_createClass(Constructor, protoProps, staticProps) { if (protoProps) MobileMenu_defineProperties(Constructor.prototype, protoProps); if (staticProps) MobileMenu_defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function MobileMenu_toPropertyKey(arg) { var key = MobileMenu_toPrimitive(arg, "string"); return MobileMenu_typeof(key) === "symbol" ? key : String(key); }
function MobileMenu_toPrimitive(input, hint) { if (MobileMenu_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (MobileMenu_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
__webpack_require__(733);
__webpack_require__(637);
var MobileMenu = /*#__PURE__*/function () {
  function MobileMenu() {
    MobileMenu_classCallCheck(this, MobileMenu);
    this.mobileToggle = document.querySelector(".js-mobile-toggle");
    this.mobileMenu = document.querySelector(".js-mobile-menu");
    this.mobileMenuClose = document.querySelector(".js-mobile-close");
    this.pageHeader = document.querySelector(".js-page-header");
    this.navDropdown = document.querySelectorAll(".nav__dropdown");
    if (!this.mobileToggle) return;
    this.events();
  }
  MobileMenu_createClass(MobileMenu, [{
    key: "events",
    value: function events() {
      var _this = this;
      this.belowMobile = window.matchMedia("(max-width: 1024px)");
      this.aboveMobile = window.matchMedia("(min-width: 1025px)");
      this.mobileToggle.addEventListener("click", function (e) {
        _this.toggleMobileMenu(e);
        _this.mobileAccessibility();
        _this.mobileMenuClose.focus();
      });
      this.mobileMenuClose.addEventListener("click", function (e) {
        return _this.toggleMobileMenu(e);
      });
      this.belowMobile.addEventListener("change", function (e) {
        if (e.matches) {
          _this.mobileMenu.classList.remove("nav-menu--is-open");
        }
      });
      this.aboveMobile.addEventListener("change", function (e) {
        if (e.matches) {
          document.body.classList.remove("nav-open-noscroll");
          _this.pageHeader.classList.remove("h-full");
          _this.mobileMenu.classList.remove("nav-menu--is-open");
        }
      });
      this.navDropdown.forEach(function (dropdown) {
        dropdown.addEventListener("mouseenter", function (e) {
          return _this.toggleAriaExpanded(e);
        });
        dropdown.addEventListener("mouseleave", function (e) {
          return _this.toggleAriaExpanded(e);
        });
      });
    }
  }, {
    key: "toggleAriaExpanded",
    value: function toggleAriaExpanded(e) {
      if (e.type === "mouseenter") {
        e.target.firstElementChild.setAttribute("aria-expanded", true);
      } else if (e.type === "mouseleave") {
        e.target.firstElementChild.setAttribute("aria-expanded", false);
      }
    }
  }, {
    key: "toggleMobileMenu",
    value: function toggleMobileMenu(e) {
      document.body.classList.toggle("nav-open-noscroll");
      this.pageHeader.classList.toggle("h-full");
      this.pageHeader.classList.toggle("sticky");
      this.pageHeader.classList.toggle("fixed");
      this.mobileMenu.classList.toggle("nav-menu--is-open");
    }
  }, {
    key: "mobileAccessibility",
    value: function mobileAccessibility() {
      var _this2 = this;
      document.addEventListener("keydown", function (e) {
        var tabKey, shiftKey, selectors, elements, activeEl, lastEl, firstEl;
        if (document.body.classList.contains("nav-open-noscroll")) {
          var trapFocus = function trapFocus(firstEl, lastEl) {
            tabKey = e.key === "Tab" || e.keyCode === 9;
            shiftKey = e.shiftKey;
            if (!shiftKey && tabKey && lastEl === activeEl) {
              e.preventDefault();
              firstEl.focus();
            }
            if (shiftKey && tabKey && firstEl === activeEl) {
              e.preventDefault();
              lastEl.focus();
            }
          };
          selectors = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
          activeEl = document.activeElement;
          firstEl = _this2.mobileMenuClose;
          elements = _this2.mobileMenu.querySelectorAll(selectors);
          elements = Array.prototype.slice.call(elements);
          elements = elements.filter(function (element) {
            return null !== element.offsetParent;
          });
          lastEl = elements[elements.length - 1];
          trapFocus(firstEl, lastEl);
        }
      });
    }
  }]);
  return MobileMenu;
}();
/* harmony default export */ const modules_MobileMenu = (MobileMenu);
;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/modules/Utils.js
function getSiblings(element) {
  var siblings = [];
  if (!element.parentNode) {
    return siblings;
  }
  var sibling = element.parentNode.firstChild;
  while (sibling) {
    if (sibling.nodeType === 1 && sibling !== element) {
      siblings.push(sibling);
    }
    sibling = sibling.nextSibling;
  }
  return siblings;
}
var DOMAnimations = {
  /**
  * SlideUp
  *
  * @param {HTMLElement} element
  * @param {Number} duration
  * @returns {Promise<boolean>}
  */
  slideUp: function slideUp(element) {
    var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
    return new Promise(function (resolve, reject) {
      element.style.height = element.offsetHeight + "px";
      element.style.transitionProperty = "height, margin, padding";
      element.style.transitionDuration = duration + "ms";
      element.offsetHeight;
      element.style.overflow = "hidden";
      element.style.height = 0;
      element.style.paddingTop = 0;
      element.style.paddingBottom = 0;
      element.style.marginTop = 0;
      element.style.marginBottom = 0;
      window.setTimeout(function () {
        element.style.display = "none";
        element.style.removeProperty("height");
        element.style.removeProperty("padding-top");
        element.style.removeProperty("padding-bottom");
        element.style.removeProperty("margin-top");
        element.style.removeProperty("margin-bottom");
        element.style.removeProperty("overflow");
        element.style.removeProperty("transition-duration");
        element.style.removeProperty("transition-property");
        resolve(false);
      }, duration);
    });
  },
  /**
  * SlideDown
  *
  * @param {HTMLElement} element
  * @param {Number} duration
  * @returns {Promise<boolean>}
  */
  slideDown: function slideDown(element) {
    var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
    return new Promise(function (resolve, reject) {
      element.style.removeProperty("display");
      var display = window.getComputedStyle(element).display;
      if (display === "none") display = "block";
      element.style.display = display;
      var height = element.offsetHeight;
      element.style.overflow = "hidden";
      element.style.height = 0;
      element.style.paddingTop = 0;
      element.style.paddingBottom = 0;
      element.style.marginTop = 0;
      element.style.marginBottom = 0;
      element.offsetHeight;
      element.style.transitionProperty = "height, margin, padding";
      element.style.transitionDuration = duration + "ms";
      element.style.height = height + "px";
      element.style.removeProperty("padding-top");
      element.style.removeProperty("padding-bottom");
      element.style.removeProperty("margin-top");
      element.style.removeProperty("margin-bottom");
      window.setTimeout(function () {
        element.style.removeProperty("height");
        element.style.removeProperty("overflow");
        element.style.removeProperty("transition-duration");
        element.style.removeProperty("transition-property");
      }, duration);
    });
  },
  /**
  * SlideToggle
  *
  * @param {HTMLElement} element
  * @param {Number} duration
  * @returns {Promise<boolean>}
  */
  slideToggle: function slideToggle(element) {
    var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
    if (window.getComputedStyle(element).display === "none") {
      return this.slideDown(element, duration);
    } else {
      return this.slideUp(element, duration);
    }
  }
};
;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/modules/Dropdowns.js
function Dropdowns_typeof(obj) { "@babel/helpers - typeof"; return Dropdowns_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, Dropdowns_typeof(obj); }
function Dropdowns_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function Dropdowns_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, Dropdowns_toPropertyKey(descriptor.key), descriptor); } }
function Dropdowns_createClass(Constructor, protoProps, staticProps) { if (protoProps) Dropdowns_defineProperties(Constructor.prototype, protoProps); if (staticProps) Dropdowns_defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function Dropdowns_toPropertyKey(arg) { var key = Dropdowns_toPrimitive(arg, "string"); return Dropdowns_typeof(key) === "symbol" ? key : String(key); }
function Dropdowns_toPrimitive(input, hint) { if (Dropdowns_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (Dropdowns_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }

var Dropdowns = /*#__PURE__*/function () {
  function Dropdowns() {
    Dropdowns_classCallCheck(this, Dropdowns);
    this.html = document.querySelector("html");
    this.body = document.body;
    this.navDropdown = document.querySelector(".nav__dropdown");
    this.navDropdownMenu = document.querySelector(".nav__dropdown-menu");
    this.navDropdownTrigger = document.querySelectorAll(".nav__dropdown-trigger");
    this.toggleDropdown();
  }
  Dropdowns_createClass(Dropdowns, [{
    key: "toggleDropdown",
    value: function toggleDropdown() {
      if (this.navDropdownTrigger) {
        for (var i = 0; i < this.navDropdownTrigger.length; i++) {
          this.navDropdownTrigger[i].addEventListener("click", function () {
            this.classList.toggle("nav__dropdown-trigger--is-open");
            var menuSiblings = getSiblings(this.parentElement);
            menuSiblings.forEach(function (sibling) {
              var trigger = sibling.querySelector(".nav__dropdown-trigger");
              if (trigger) {
                trigger.classList.remove("nav__dropdown-trigger--is-open");
                DOMAnimations.slideUp(trigger.nextElementSibling);
                trigger.setAttribute("aria-expanded", "false");
              }
            });
            DOMAnimations.slideToggle(this.nextElementSibling);
            var attr = this.getAttribute("aria-expanded");
            if (attr == "true") {
              this.setAttribute("aria-expanded", "false");
            } else {
              this.setAttribute("aria-expanded", "true");
            }
          });
        }
      }
    }
  }]);
  return Dropdowns;
}();
/* harmony default export */ const modules_Dropdowns = (Dropdowns);
;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/modules/MasonryGrid.js
function MasonryGrid_typeof(obj) { "@babel/helpers - typeof"; return MasonryGrid_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, MasonryGrid_typeof(obj); }
function MasonryGrid_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function MasonryGrid_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, MasonryGrid_toPropertyKey(descriptor.key), descriptor); } }
function MasonryGrid_createClass(Constructor, protoProps, staticProps) { if (protoProps) MasonryGrid_defineProperties(Constructor.prototype, protoProps); if (staticProps) MasonryGrid_defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function MasonryGrid_toPropertyKey(arg) { var key = MasonryGrid_toPrimitive(arg, "string"); return MasonryGrid_typeof(key) === "symbol" ? key : String(key); }
function MasonryGrid_toPrimitive(input, hint) { if (MasonryGrid_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (MasonryGrid_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var MasonryGrid = /*#__PURE__*/function () {
  function MasonryGrid() {
    MasonryGrid_classCallCheck(this, MasonryGrid);
    this.grid = document.getElementById("masonry-grid");
    if (this.grid) {
      this.initMasonry();
    }
  }
  MasonryGrid_createClass(MasonryGrid, [{
    key: "initMasonry",
    value: function initMasonry() {
      var masonry = new Masonry(this.grid, {
        columnWidth: ".masonry-item",
        itemSelector: ".masonry-item",
        percentPosition: true
      });
      imagesLoaded(this.grid).on("progress", function () {
        masonry.layout();
      });
    }
  }]);
  return MasonryGrid;
}();
/* harmony default export */ const modules_MasonryGrid = (MasonryGrid);
;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/modules/ScrollToTop.js
function ScrollToTop_typeof(obj) { "@babel/helpers - typeof"; return ScrollToTop_typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, ScrollToTop_typeof(obj); }
function ScrollToTop_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function ScrollToTop_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, ScrollToTop_toPropertyKey(descriptor.key), descriptor); } }
function ScrollToTop_createClass(Constructor, protoProps, staticProps) { if (protoProps) ScrollToTop_defineProperties(Constructor.prototype, protoProps); if (staticProps) ScrollToTop_defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function ScrollToTop_toPropertyKey(arg) { var key = ScrollToTop_toPrimitive(arg, "string"); return ScrollToTop_typeof(key) === "symbol" ? key : String(key); }
function ScrollToTop_toPrimitive(input, hint) { if (ScrollToTop_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (ScrollToTop_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var ScrollToTop = /*#__PURE__*/function () {
  function ScrollToTop() {
    ScrollToTop_classCallCheck(this, ScrollToTop);
    this.backToTop = document.getElementById("back-to-top");
    this.scrollToTop();
    this.events();
  }
  ScrollToTop_createClass(ScrollToTop, [{
    key: "events",
    value: function events() {
      var _this = this;
      window.addEventListener("scroll", function (e) {
        return _this.onScroll(e);
      });
    }
  }, {
    key: "onScroll",
    value: function onScroll() {
      var scroll = window.scrollY;
      if (!this.backToTop) {
        return;
      }
      if (scroll >= 50) {
        this.backToTop.classList.add("show");
      } else {
        this.backToTop.classList.remove("show");
      }
    }
  }, {
    key: "scrollToTop",
    value: function scrollToTop() {
      if (!this.backToTop) {
        return;
      }
      this.backToTop.addEventListener("click", function (e) {
        e.preventDefault();
        if (document.scrollingElement.scrollTop === 0) return;
        var totalScrollDistance = document.scrollingElement.scrollTop;
        var scrollY = totalScrollDistance,
          oldTimestamp = null;
        function step(newTimestamp) {
          if (oldTimestamp !== null) {
            scrollY -= totalScrollDistance * (newTimestamp - oldTimestamp) / 350;
            if (scrollY <= 0) return document.scrollingElement.scrollTop = 0;
            document.scrollingElement.scrollTop = scrollY;
          }
          oldTimestamp = newTimestamp;
          window.requestAnimationFrame(step);
        }
        window.requestAnimationFrame(step);
      });
    }
  }]);
  return ScrollToTop;
}();
/* harmony default export */ const modules_ScrollToTop = (ScrollToTop);
;// CONCATENATED MODULE: ./wp-content/themes/xhibiter/assets/js/src/main.js
// Modules







// Initialize
new modules_General();
new modules_Header();
new modules_MobileMenu();
new modules_Dropdowns();
new modules_MasonryGrid();
new modules_ScrollToTop();
})();

/******/ })()
;