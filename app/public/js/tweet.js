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


eval("//文字数カウント\nvar formInput = document.getElementById(\"tweetForm\");\nvar counterSpan = document.getElementById(\"inputCounter\");\nclassDanger = \"mb-4 text-danger\";\nclassDefault = document.getElementById(\"inputCount\").className;\nformInput.addEventListener(\"keyup\", function () {\n  counterSpan.textContent = formInput.value.length;\n\n  switch (true) {\n    case counterSpan.textContent > 140:\n      document.getElementById(\"inputCount\").className = classDanger;\n      document.getElementById(\"tweetButton\").disabled = true;\n      break;\n\n    case counterSpan.textContent < 1:\n      document.getElementById(\"tweetButton\").disabled = true;\n      break;\n\n    default:\n      document.getElementById(\"inputCount\").className = classDefault;\n      document.getElementById(\"tweetButton\").disabled = false;\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdHdlZXQuanMuanMiLCJuYW1lcyI6WyJmb3JtSW5wdXQiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwiY291bnRlclNwYW4iLCJjbGFzc0RhbmdlciIsImNsYXNzRGVmYXVsdCIsImNsYXNzTmFtZSIsImFkZEV2ZW50TGlzdGVuZXIiLCJ0ZXh0Q29udGVudCIsInZhbHVlIiwibGVuZ3RoIiwiZGlzYWJsZWQiXSwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy90d2VldC5qcz8xNjA3Il0sInNvdXJjZXNDb250ZW50IjpbIi8v5paH5a2X5pWw44Kr44Km44Oz44OIXG5sZXQgZm9ybUlucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJ0d2VldEZvcm1cIik7XG5sZXQgY291bnRlclNwYW4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImlucHV0Q291bnRlclwiKTtcbmNsYXNzRGFuZ2VyID0gXCJtYi00IHRleHQtZGFuZ2VyXCJcbmNsYXNzRGVmYXVsdCA9ICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImlucHV0Q291bnRcIikuY2xhc3NOYW1lXG5cbmZvcm1JbnB1dC5hZGRFdmVudExpc3RlbmVyKFwia2V5dXBcIiwgZnVuY3Rpb24oKSB7XG4gIGNvdW50ZXJTcGFuLnRleHRDb250ZW50ID0gZm9ybUlucHV0LnZhbHVlLmxlbmd0aDtcbiAgc3dpdGNoKHRydWUpe1xuICAgIGNhc2UgY291bnRlclNwYW4udGV4dENvbnRlbnQgPiAxNDA6XG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiaW5wdXRDb3VudFwiKS5jbGFzc05hbWUgPSBjbGFzc0RhbmdlcjtcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJ0d2VldEJ1dHRvblwiKS5kaXNhYmxlZCA9IHRydWU7XG4gICAgICAgIGJyZWFrO1xuICAgIGNhc2UgY291bnRlclNwYW4udGV4dENvbnRlbnQgPCAxOlxuICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwidHdlZXRCdXR0b25cIikuZGlzYWJsZWQgPSB0cnVlO1xuICAgICAgICAgIGJyZWFrO1xuICAgICAgICAgIFxuICAgIGRlZmF1bHQ6XG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwiaW5wdXRDb3VudFwiKS5jbGFzc05hbWUgPSBjbGFzc0RlZmF1bHQ7XG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwidHdlZXRCdXR0b25cIikuZGlzYWJsZWQgPSBmYWxzZTtcbiAgfVxufSk7XG5cblxuXG4gICAgXG4gICJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQSxJQUFJQSxTQUFTLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixXQUF4QixDQUFoQjtBQUNBLElBQUlDLFdBQVcsR0FBR0YsUUFBUSxDQUFDQyxjQUFULENBQXdCLGNBQXhCLENBQWxCO0FBQ0FFLFdBQVcsR0FBRyxrQkFBZDtBQUNBQyxZQUFZLEdBQUlKLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixZQUF4QixFQUFzQ0ksU0FBdEQ7QUFFQU4sU0FBUyxDQUFDTyxnQkFBVixDQUEyQixPQUEzQixFQUFvQyxZQUFXO0VBQzdDSixXQUFXLENBQUNLLFdBQVosR0FBMEJSLFNBQVMsQ0FBQ1MsS0FBVixDQUFnQkMsTUFBMUM7O0VBQ0EsUUFBTyxJQUFQO0lBQ0UsS0FBS1AsV0FBVyxDQUFDSyxXQUFaLEdBQTBCLEdBQS9CO01BQ0lQLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixZQUF4QixFQUFzQ0ksU0FBdEMsR0FBa0RGLFdBQWxEO01BQ0FILFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixhQUF4QixFQUF1Q1MsUUFBdkMsR0FBa0QsSUFBbEQ7TUFDQTs7SUFDSixLQUFLUixXQUFXLENBQUNLLFdBQVosR0FBMEIsQ0FBL0I7TUFDTVAsUUFBUSxDQUFDQyxjQUFULENBQXdCLGFBQXhCLEVBQXVDUyxRQUF2QyxHQUFrRCxJQUFsRDtNQUNBOztJQUVOO01BQ0lWLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixZQUF4QixFQUFzQ0ksU0FBdEMsR0FBa0RELFlBQWxEO01BQ0FKLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixhQUF4QixFQUF1Q1MsUUFBdkMsR0FBa0QsS0FBbEQ7RUFYTjtBQWFELENBZkQifQ==\n//# sourceURL=webpack-internal:///./resources/js/tweet.js\n");


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