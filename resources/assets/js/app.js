import $ from 'jquery'

window.toastr = require('toastr') // Require 'toastr' and make it available globally:

require('./bootstrap');
require('./app-script');
require('./scriptbreaker-multiple-accordion-1');

// For Admin Panel
require('./bootstrap.bundle.min');
require('./sb-admin');
require('./jquery-filestyle.min');
require('./j-confirm-action');

// For image magnifier glass
require('./image-magnifier-glass');

/*
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
*/
