
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.config.devtools = true

$(document).ready(function () {
  $('.alert').delay(3000).fadeOut('slow');

  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    $(this).toggleClass('active');
  });
});
