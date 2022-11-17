/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./client/src/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./client/src/app.js":
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _ToggleNavigation = __webpack_require__("./client/src/components/ToggleNavigation.js");

var _ToggleNavigation2 = _interopRequireDefault(_ToggleNavigation);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

window.document.addEventListener('DOMContentLoaded', function () {
  (0, _ToggleNavigation2.default)();
});

/***/ }),

/***/ "./client/src/components/ToggleNavigation.js":
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

exports.default = function () {
  var mainMenu = document.getElementById('mainMenu');
  var toggleNavigation = document.getElementById('toggleNavigation');
  var toggleSearch = document.getElementById('toggleSearch');
  var toggleSubnavs = document.getElementsByClassName('op-header__toggle-subnav');
  var searchForm = document.getElementById('searchForm');
  var updateBody = function updateBody() {
    if (mainMenu.classList.contains('active') || searchForm.classList.contains('active')) {
      document.body.classList.add('navigationActive');
    } else {
      document.body.classList.remove('navigationActive');
    }
  };
  var toggleItemActive = function toggleItemActive(item, remove) {
    if (remove) {
      item.classList.toggle('active');
    } else {
      item.classList.remove('active');
    }
    if (item.classList.contains('active')) {
      item.parentElement.classList.add('childActive');
    } else {
      item.parentElement.classList.remove('childActive');
    }
  };
  if (toggleSearch) {
    toggleSearch.addEventListener('click', function () {
      mainMenu.classList.remove('active');
      mainMenu.classList.toggle('searchActive');
      searchForm.classList.toggle('active');
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = toggleSubnavs[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var toggleSubnav = _step.value;

          toggleItemActive(toggleSubnav.parentElement, false);
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }

      updateBody();
    });
  }
  toggleNavigation.addEventListener('click', function () {
    if (toggleSearch) {
      searchForm.classList.remove('active');
      mainMenu.classList.remove('searchActive');
    }
    mainMenu.classList.toggle('active');
    updateBody();
  });

  var _loop = function _loop(toggleSubnav) {
    toggleSubnav.addEventListener('click', function () {
      var parent = toggleSubnav.parentElement;
      var parentList = parent.parentElement;
      var _iteratorNormalCompletion3 = true;
      var _didIteratorError3 = false;
      var _iteratorError3 = undefined;

      try {
        for (var _iterator3 = parentList.children[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
          var subnav = _step3.value;

          if (subnav !== parent) {
            toggleItemActive(subnav, false);
          }
        }
      } catch (err) {
        _didIteratorError3 = true;
        _iteratorError3 = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion3 && _iterator3.return) {
            _iterator3.return();
          }
        } finally {
          if (_didIteratorError3) {
            throw _iteratorError3;
          }
        }
      }

      toggleItemActive(parent, true);
      searchForm.classList.remove('active');
      mainMenu.classList.remove('searchActive');
    });
  };

  var _iteratorNormalCompletion2 = true;
  var _didIteratorError2 = false;
  var _iteratorError2 = undefined;

  try {
    for (var _iterator2 = toggleSubnavs[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
      var toggleSubnav = _step2.value;

      _loop(toggleSubnav);
    }
  } catch (err) {
    _didIteratorError2 = true;
    _iteratorError2 = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion2 && _iterator2.return) {
        _iterator2.return();
      }
    } finally {
      if (_didIteratorError2) {
        throw _iteratorError2;
      }
    }
  }
};

/***/ })

/******/ });
//# sourceMappingURL=bundle.js.map