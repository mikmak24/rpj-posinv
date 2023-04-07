/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/categories.js ***!
  \************************************/
$(document).ready(function () {
  $('#create-categories').on('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally
    var formData = new FormData(this);
    var cname = $("#cname").val();
    var cdesc = $("#cdesc").val();
    $.ajax({
      url: "/create-categories",
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