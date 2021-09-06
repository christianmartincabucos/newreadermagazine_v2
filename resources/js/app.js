/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

Vue.component("create-blog", require("./admincomponents/CreateBlog.vue").default);
Vue.component("magazine-blog", require("./admincomponents/MagazineBlog.vue").default);
Vue.component("reference", require("./admincomponents/Reference.vue").default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
});
