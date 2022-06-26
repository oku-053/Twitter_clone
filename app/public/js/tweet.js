/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/tweet.js":
/*!*******************************!*\
  !*** ./resources/js/tweet.js ***!
  \*******************************/
/***/ (() => {

eval("//文字数カウント\nvar formInput = document.getElementById(\"tweetForm\");\nvar counterSpan = document.getElementById(\"inputCounter\");\nclass_danger = \"mb-4 text-danger\";\nclass_default = document.getElementById(\"inputCount\").className;\nformInput.addEventListener(\"keyup\", function () {\n  counterSpan.textContent = formInput.value.length;\n\n  switch (true) {\n    case counterSpan.textContent > 140:\n      document.getElementById(\"inputCount\").className = class_danger;\n      document.getElementById(\"tweetButton\").disabled = true;\n      break;\n\n    default:\n      document.getElementById(\"inputCount\").className = class_default;\n      document.getElementById(\"tweetButton\").disabled = false;\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdHdlZXQuanMuanMiLCJuYW1lcyI6WyJmb3JtSW5wdXQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiY291bnRlclNwYW4iLCJjbGFzc19kYW5nZXIiLCJjbGFzc19kZWZhdWx0IiwiY2xhc3NOYW1lIiwiYWRkRXZlbnRMaXN0ZW5lciIsInRleHRDb250ZW50IiwidmFsdWUiLCJsZW5ndGgiLCJkaXNhYmxlZCJdLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3R3ZWV0LmpzPzE2MDciXSwic291cmNlc0NvbnRlbnQiOlsiLy/mloflrZfmlbDjgqvjgqbjg7Pjg4hcbnZhciBmb3JtSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInR3ZWV0Rm9ybVwiKTtcbnZhciBjb3VudGVyU3BhbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiaW5wdXRDb3VudGVyXCIpO1xuY2xhc3NfZGFuZ2VyID0gXCJtYi00IHRleHQtZGFuZ2VyXCJcbmNsYXNzX2RlZmF1bHQgPSAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbnB1dENvdW50XCIpLmNsYXNzTmFtZVxuXG5mb3JtSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImtleXVwXCIsIGZ1bmN0aW9uKCkge1xuICBjb3VudGVyU3Bhbi50ZXh0Q29udGVudCA9IGZvcm1JbnB1dC52YWx1ZS5sZW5ndGg7XG4gIHN3aXRjaCh0cnVlKXtcbiAgICBjYXNlIGNvdW50ZXJTcGFuLnRleHRDb250ZW50ID4gMTQwOlxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImlucHV0Q291bnRcIikuY2xhc3NOYW1lID0gY2xhc3NfZGFuZ2VyO1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInR3ZWV0QnV0dG9uXCIpLmRpc2FibGVkID0gdHJ1ZTtcbiAgICAgICAgYnJlYWs7XG4gICAgZGVmYXVsdDpcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbnB1dENvdW50XCIpLmNsYXNzTmFtZSA9IGNsYXNzX2RlZmF1bHQ7XG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwidHdlZXRCdXR0b25cIikuZGlzYWJsZWQgPSBmYWxzZTtcbiAgfVxufSk7XG5cblxuXG4gICAgXG4gICJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQSxJQUFJQSxTQUFTLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixXQUF4QixDQUFoQjtBQUNBLElBQUlDLFdBQVcsR0FBR0YsUUFBUSxDQUFDQyxjQUFULENBQXdCLGNBQXhCLENBQWxCO0FBQ0FFLFlBQVksR0FBRyxrQkFBZjtBQUNBQyxhQUFhLEdBQUlKLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixZQUF4QixFQUFzQ0ksU0FBdkQ7QUFFQU4sU0FBUyxDQUFDTyxnQkFBVixDQUEyQixPQUEzQixFQUFvQyxZQUFXO0VBQzdDSixXQUFXLENBQUNLLFdBQVosR0FBMEJSLFNBQVMsQ0FBQ1MsS0FBVixDQUFnQkMsTUFBMUM7O0VBQ0EsUUFBTyxJQUFQO0lBQ0UsS0FBS1AsV0FBVyxDQUFDSyxXQUFaLEdBQTBCLEdBQS9CO01BQ0lQLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixZQUF4QixFQUFzQ0ksU0FBdEMsR0FBa0RGLFlBQWxEO01BQ0FILFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixhQUF4QixFQUF1Q1MsUUFBdkMsR0FBa0QsSUFBbEQ7TUFDQTs7SUFDSjtNQUNJVixRQUFRLENBQUNDLGNBQVQsQ0FBd0IsWUFBeEIsRUFBc0NJLFNBQXRDLEdBQWtERCxhQUFsRDtNQUNBSixRQUFRLENBQUNDLGNBQVQsQ0FBd0IsYUFBeEIsRUFBdUNTLFFBQXZDLEdBQWtELEtBQWxEO0VBUE47QUFTRCxDQVhEIn0=\n//# sourceURL=webpack-internal:///./resources/js/tweet.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/tweet.js"]();
/******/ 	
/******/ })()
;