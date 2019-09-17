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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/functions.js":
/*!********************************!*\
  !*** ./assets/js/functions.js ***!
  \********************************/
/*! exports provided: functions */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"functions\", function() { return functions; });\n/* harmony import */ var _validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./validation */ \"./assets/js/validation.js\");\n\r\n\r\n\r\nconst functions = {\r\n\r\n    makeRequest: function (url, method, body) {\r\n\r\n        return fetch(url, {\r\n            method: method,\r\n            headers: {\r\n                'Content-Type': 'application/json',\r\n            },\r\n            body: JSON.stringify(body),\r\n        }).then(response => response.json());\r\n    },\r\n\r\n    showResult: function (response) {\r\n        const resultUrl = response.url;\r\n\r\n        if (resultUrl) {\r\n\r\n            const result = document.getElementById('result');\r\n            const shortened = document.getElementById('shortened');\r\n\r\n            result.style.display = 'block';\r\n            shortened.innerText = resultUrl;\r\n            shortened.setAttribute('href', resultUrl);\r\n        }\r\n    },\r\n\r\n    validate: function () {\r\n        let fields = $('.js-validate');\r\n\r\n        for (let i = 0; i < fields.length; i++) {\r\n\r\n            $(fields[i]).siblings('.negative').remove();\r\n            $(fields[i]).parent().removeClass('error');\r\n\r\n\r\n            let res = this.isValid(fields[i]);\r\n\r\n            if (res !== true) {\r\n                $(fields[i]).parent().addClass('error');\r\n                $(fields[i]).parent().append(`<p class=\"negative message ui\">${res}</p>`);\r\n            }\r\n        }\r\n    },\r\n\r\n    isValid: function (field) {\r\n\r\n        let list = field.dataset.validation.split(' ');\r\n\r\n        for (let i = 0; i < list.length; i++) {\r\n            let rule = list[i];\r\n\r\n            if (_validation__WEBPACK_IMPORTED_MODULE_0__[\"rules\"][rule] && !_validation__WEBPACK_IMPORTED_MODULE_0__[\"rules\"][rule](field)) {\r\n                return _validation__WEBPACK_IMPORTED_MODULE_0__[\"rulesMessages\"][rule];\r\n            }\r\n        }\r\n\r\n        return true;\r\n    }\r\n}\r\n\r\n\n\n//# sourceURL=webpack:///./assets/js/functions.js?");

/***/ }),

/***/ "./assets/js/handlers.js":
/*!*******************************!*\
  !*** ./assets/js/handlers.js ***!
  \*******************************/
/*! exports provided: handlers */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"handlers\", function() { return handlers; });\n/* harmony import */ var _functions__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./functions */ \"./assets/js/functions.js\");\n\r\n\r\nconst handlers = {\r\n\r\n    onShortenClick: (e) => {\r\n        e.preventDefault();\r\n\r\n        _functions__WEBPACK_IMPORTED_MODULE_0__[\"functions\"].validate();\r\n        const url = $('#url');\r\n\r\n        if (!$(url).parent().hasClass('error')) {\r\n\r\n            _functions__WEBPACK_IMPORTED_MODULE_0__[\"functions\"].makeRequest('/make', 'POST', {url: $(url).val()})\r\n                .then(\r\n                    _functions__WEBPACK_IMPORTED_MODULE_0__[\"functions\"].showResult,\r\n                    error => alert(`Rejected: ${error}`)\r\n                );\r\n        }\r\n    },\r\n\r\n\r\n}\r\n\n\n//# sourceURL=webpack:///./assets/js/handlers.js?");

/***/ }),

/***/ "./assets/js/main.js":
/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _handlers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./handlers */ \"./assets/js/handlers.js\");\n\r\n\r\n\r\n// INITIALIZE EVENTS\r\n$(document).ready(function() {\r\n\r\n    $('table').tablesort();\r\n\r\n    $('#add-url').click(_handlers__WEBPACK_IMPORTED_MODULE_0__[\"handlers\"].onShortenClick);\r\n});\r\n\r\n\n\n//# sourceURL=webpack:///./assets/js/main.js?");

/***/ }),

/***/ "./assets/js/validation.js":
/*!*********************************!*\
  !*** ./assets/js/validation.js ***!
  \*********************************/
/*! exports provided: rules, rulesMessages */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"rules\", function() { return rules; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"rulesMessages\", function() { return rulesMessages; });\nconst rules = {\r\n\r\n    required: (field) => {\r\n        let val = $(field).val();\r\n\r\n        return val.length >= 1;\r\n    },\r\n\r\n    url: (field) => {\r\n        let val = $(field).val();\r\n        let regExp = /^(http|https):\\/\\/(\\w[-\\.]*)*\\.\\w{2,}\\/?$/;\r\n\r\n        return regExp.test(val);\r\n    }\r\n}\r\n\r\nconst rulesMessages = {\r\n    required : 'This attribute is required',\r\n    url : 'Value must be URL (with schema), example: http://google.com'\r\n}\n\n//# sourceURL=webpack:///./assets/js/validation.js?");

/***/ })

/******/ });