/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/users.js ***!
  \*******************************/
$(document).ready(function () {
  $('#create-users').on('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally
    var formData = new FormData(this);
    $.ajax({
      url: "/create-users",
      type: 'POST',
      data: formData,
      dataType: 'json',
      processData: false,
      contentType: false,
      success: function success(response) {
        $("#div-success").show();
        setTimeout(function () {
          location.reload();
        }, 3000);
      },
      error: function error(xhr) {
        // Handle any errors that occur during the AJAX request
      }
    });
  });
});
/******/ })()
;