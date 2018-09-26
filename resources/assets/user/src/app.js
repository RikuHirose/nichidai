import jQuery from "jquery";
import 'bootstrap';
import "chart.js";
import "hchs-vue-charts";
import axios from 'axios';
window.$ = window.jQuery = jQuery;


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
}

Vue.use(window.VueCharts);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('evaluate-chart', require('../components/lesson/evaluate_chart.vue'));
Vue.component('favorite-lesson', require('../components/lesson/favorite_lesson.vue'));

const app = new Vue({
    el: '#app'
});
