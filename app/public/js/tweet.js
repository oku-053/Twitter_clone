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

eval("//文字数カウント\nvar formInput = document.getElementById(\"tweetForm\");\nvar counterSpan = document.getElementById(\"inputCounter\");\nclassDanger = \"mb-4 text-danger\";\nclassDefault = document.getElementById(\"inputCount\").className;\nformInput.addEventListener(\"keyup\", function () {\n  counterSpan.textContent = formInput.value.length;\n\n  switch (true) {\n    case counterSpan.textContent > 140:\n      document.getElementById(\"inputCount\").className = classDanger;\n      document.getElementById(\"tweetButton\").disabled = true;\n      break;\n\n    default:\n      document.getElementById(\"inputCount\").className = classDefault;\n      document.getElementById(\"tweetButton\").disabled = false;\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJmb3JtSW5wdXQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiY291bnRlclNwYW4iLCJjbGFzc0RhbmdlciIsImNsYXNzRGVmYXVsdCIsImNsYXNzTmFtZSIsImFkZEV2ZW50TGlzdGVuZXIiLCJ0ZXh0Q29udGVudCIsInZhbHVlIiwibGVuZ3RoIiwiZGlzYWJsZWQiXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3R3ZWV0LmpzPzE2MDciXSwic291cmNlc0NvbnRlbnQiOlsiLy/mloflrZfmlbDjgqvjgqbjg7Pjg4hcbmxldCBmb3JtSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInR3ZWV0Rm9ybVwiKTtcbmxldCBjb3VudGVyU3BhbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiaW5wdXRDb3VudGVyXCIpO1xuY2xhc3NEYW5nZXIgPSBcIm1iLTQgdGV4dC1kYW5nZXJcIlxuY2xhc3NEZWZhdWx0ID0gIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiaW5wdXRDb3VudFwiKS5jbGFzc05hbWVcblxuZm9ybUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXl1cFwiLCBmdW5jdGlvbigpIHtcbiAgY291bnRlclNwYW4udGV4dENvbnRlbnQgPSBmb3JtSW5wdXQudmFsdWUubGVuZ3RoO1xuICBzd2l0Y2godHJ1ZSl7XG4gICAgY2FzZSBjb3VudGVyU3Bhbi50ZXh0Q29udGVudCA+IDE0MDpcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbnB1dENvdW50XCIpLmNsYXNzTmFtZSA9IGNsYXNzRGFuZ2VyO1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInR3ZWV0QnV0dG9uXCIpLmRpc2FibGVkID0gdHJ1ZTtcbiAgICAgICAgYnJlYWs7XG4gICAgICAgICAgXG4gICAgZGVmYXVsdDpcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbnB1dENvdW50XCIpLmNsYXNzTmFtZSA9IGNsYXNzRGVmYXVsdDtcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJ0d2VldEJ1dHRvblwiKS5kaXNhYmxlZCA9IGZhbHNlO1xuICB9XG59KTtcblxuXG5cbiAgICBcbiAgIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBLElBQUlBLFNBQVMsR0FBR0MsUUFBUSxDQUFDQyxjQUFULENBQXdCLFdBQXhCLENBQWhCO0FBQ0EsSUFBSUMsV0FBVyxHQUFHRixRQUFRLENBQUNDLGNBQVQsQ0FBd0IsY0FBeEIsQ0FBbEI7QUFDQUUsV0FBVyxHQUFHLGtCQUFkO0FBQ0FDLFlBQVksR0FBSUosUUFBUSxDQUFDQyxjQUFULENBQXdCLFlBQXhCLEVBQXNDSSxTQUF0RDtBQUVBTixTQUFTLENBQUNPLGdCQUFWLENBQTJCLE9BQTNCLEVBQW9DLFlBQVc7RUFDN0NKLFdBQVcsQ0FBQ0ssV0FBWixHQUEwQlIsU0FBUyxDQUFDUyxLQUFWLENBQWdCQyxNQUExQzs7RUFDQSxRQUFPLElBQVA7SUFDRSxLQUFLUCxXQUFXLENBQUNLLFdBQVosR0FBMEIsR0FBL0I7TUFDSVAsUUFBUSxDQUFDQyxjQUFULENBQXdCLFlBQXhCLEVBQXNDSSxTQUF0QyxHQUFrREYsV0FBbEQ7TUFDQUgsUUFBUSxDQUFDQyxjQUFULENBQXdCLGFBQXhCLEVBQXVDUyxRQUF2QyxHQUFrRCxJQUFsRDtNQUNBOztJQUVKO01BQ0lWLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixZQUF4QixFQUFzQ0ksU0FBdEMsR0FBa0RELFlBQWxEO01BQ0FKLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixhQUF4QixFQUF1Q1MsUUFBdkMsR0FBa0QsS0FBbEQ7RUFSTjtBQVVELENBWkQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdHdlZXQuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/tweet.js\n");

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