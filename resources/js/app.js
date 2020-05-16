import { ValidationProvider, ValidationObserver } from 'vee-validate';
import UIkit from "uikit";
import vSelect from "vue-select";
import moment from 'moment'
import axios from 'axios'


require('./bootstrap');
require('./VeeValidateRules/Rules');

window.Vue = require('vue');

Vue.config.productionTip = false
window.moment = moment
window.axios = axios
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.prototype.moment = moment
Vue.mixin({
  methods: {
    showErrorAlert: function (message, body = { status: "danger", timeout: 3000 }) {
      UIkit.notification(
        `<div class='uk-custom-centered-notification-message error-bg uk-border-rounded uk-padding-small text-white'>${message}</div>`,
        body
      );
    },
    showWarningAlert: function (message, body = { status: "warning", pos: 'top-center', timeout: 3000 }) {
      UIkit.notification(
        `<div class='uk-custom-centered-notification-message warning-bg uk-border-rounded uk-padding-small text-white'>${message}</div>`,
        body
      );
    },
    showSuccessAlert: function (message, body = { status: "success", timeout: 3000 }) {
      UIkit.notification(
        `<div class='uk-custom-centered-notification-message success-bg uk-border-rounded uk-padding-small text-white'>${message}</div>`,
        body
      );
    },
    showInfoAlert: function (message, body = { status: "primary", timeout: 3000 }) {
      UIkit.notification(
        `<div class='uk-custom-centered-notification-message info-bg uk-border-rounded uk-padding-small text-white'>${message}</div>`,
        body
      );
    },
  }
});
Vue.component("v-select", vSelect);

Vue.component('login', require('./components/Login.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('home', require('./components/Home/Home.vue').default);
Vue.component('v-input', require('./components/Utils/VInput.vue').default);
Vue.component('qv-select', require('./components/Utils/QVSelect.vue').default);
Vue.component('navbar', require('./components/dashboard/navbar/NavBar.vue').default);
Vue.component('sales', require('./components/dashboard/Books/Sales.vue').default);
Vue.component('rent', require('./components/dashboard/Books/Rent.vue').default);
Vue.component('profile', require('./components/dashboard/Profile/Profile.vue').default);
Vue.component('my-books', require('./components/dashboard/Profile/MyBooks.vue').default);
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
});