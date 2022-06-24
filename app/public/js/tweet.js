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

eval("//文字数カウント\nvar input = document.getElementById(\"tweetForm\");\nvar span = document.getElementById(\"inputCounter\");\nclass2 = \"mb-4 text-danger\";\nclass1 = document.getElementById(\"inputCount\").className;\ninput.addEventListener(\"keyup\", function () {\n  span.textContent = input.value.length;\n\n  switch (true) {\n    case span.textContent > 140:\n      document.getElementById(\"inputCount\").className = class2;\n      document.getElementById(\"tweetButton\").disabled = true;\n      break;\n\n    default:\n      document.getElementById(\"inputCount\").className = class1;\n      document.getElementById(\"tweetButton\").disabled = false;\n  }\n});\nconsole.log(\"test1\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdHdlZXQuanMuanMiLCJuYW1lcyI6WyJpbnB1dCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJzcGFuIiwiY2xhc3MyIiwiY2xhc3MxIiwiY2xhc3NOYW1lIiwiYWRkRXZlbnRMaXN0ZW5lciIsInRleHRDb250ZW50IiwidmFsdWUiLCJsZW5ndGgiLCJkaXNhYmxlZCIsImNvbnNvbGUiLCJsb2ciXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy90d2VldC5qcz8xNjA3Il0sInNvdXJjZXNDb250ZW50IjpbIi8v5paH5a2X5pWw44Kr44Km44Oz44OIXG52YXIgaW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInR3ZWV0Rm9ybVwiKTtcbnZhciBzcGFuID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbnB1dENvdW50ZXJcIik7XG5jbGFzczIgPSBcIm1iLTQgdGV4dC1kYW5nZXJcIlxuY2xhc3MxID0gIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiaW5wdXRDb3VudFwiKS5jbGFzc05hbWVcblxuaW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImtleXVwXCIsIGZ1bmN0aW9uKCkge1xuICBzcGFuLnRleHRDb250ZW50ID0gaW5wdXQudmFsdWUubGVuZ3RoO1xuICBzd2l0Y2godHJ1ZSl7XG4gICAgY2FzZSBzcGFuLnRleHRDb250ZW50ID4gMTQwOlxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImlucHV0Q291bnRcIikuY2xhc3NOYW1lID0gY2xhc3MyO1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInR3ZWV0QnV0dG9uXCIpLmRpc2FibGVkID0gdHJ1ZTtcbiAgICAgICAgYnJlYWs7XG4gICAgZGVmYXVsdDpcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJpbnB1dENvdW50XCIpLmNsYXNzTmFtZSA9IGNsYXNzMTtcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJ0d2VldEJ1dHRvblwiKS5kaXNhYmxlZCA9IGZhbHNlO1xuICB9XG59KTtcblxuY29uc29sZS5sb2coXCJ0ZXN0MVwiKVxuXG5cblxuICAgIFxuICAiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0EsSUFBSUEsS0FBSyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsV0FBeEIsQ0FBWjtBQUNBLElBQUlDLElBQUksR0FBR0YsUUFBUSxDQUFDQyxjQUFULENBQXdCLGNBQXhCLENBQVg7QUFDQUUsTUFBTSxHQUFHLGtCQUFUO0FBQ0FDLE1BQU0sR0FBSUosUUFBUSxDQUFDQyxjQUFULENBQXdCLFlBQXhCLEVBQXNDSSxTQUFoRDtBQUVBTixLQUFLLENBQUNPLGdCQUFOLENBQXVCLE9BQXZCLEVBQWdDLFlBQVc7RUFDekNKLElBQUksQ0FBQ0ssV0FBTCxHQUFtQlIsS0FBSyxDQUFDUyxLQUFOLENBQVlDLE1BQS9COztFQUNBLFFBQU8sSUFBUDtJQUNFLEtBQUtQLElBQUksQ0FBQ0ssV0FBTCxHQUFtQixHQUF4QjtNQUNJUCxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsWUFBeEIsRUFBc0NJLFNBQXRDLEdBQWtERixNQUFsRDtNQUNBSCxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsYUFBeEIsRUFBdUNTLFFBQXZDLEdBQWtELElBQWxEO01BQ0E7O0lBQ0o7TUFDSVYsUUFBUSxDQUFDQyxjQUFULENBQXdCLFlBQXhCLEVBQXNDSSxTQUF0QyxHQUFrREQsTUFBbEQ7TUFDQUosUUFBUSxDQUFDQyxjQUFULENBQXdCLGFBQXhCLEVBQXVDUyxRQUF2QyxHQUFrRCxLQUFsRDtFQVBOO0FBU0QsQ0FYRDtBQWFBQyxPQUFPLENBQUNDLEdBQVIsQ0FBWSxPQUFaIn0=\n//# sourceURL=webpack-internal:///./resources/js/tweet.js\n");

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