import $ from 'jquery'

window.toastr = require('toastr') // Require 'toastr' and make it available globally:

require('./bootstrap');
require('./app-script');

// For Admin Panel
require('./bootstrap.bundle.min');
require('./sb-admin');
require('./jquery-filestyle.min');
require('./j-confirm-action');

/*
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
*/
