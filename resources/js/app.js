import 'es6-promise/auto'
import axios from 'axios'
// import './bootstrap'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import router from './router'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

//global registration
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
Vue.use(VueFormWizard)

// Set Vue globally
window.Vue = Vue

// Set Vue router
Vue.router = router
Vue.use(VueRouter)


// Set Vue SweetAlert2
Vue.use(VueSweetalert2);

// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `/api`
// axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)

// Load Index
Vue.component('index', Index)

import Notifications from 'vue-notification'
Vue.use(Notifications)

// register jw pagination component globally
import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);






const app = new Vue({
  el: '#app',
  router,
});

  $(document).ready(function() {
    // document is loaded and DOM is ready
    $(".se-pre-con").fadeOut("slow");
});


$('#menu-action').click(function() {
  $('.sidebar').toggleClass('active');
  $('.main').toggleClass('active');
  $(this).toggleClass('active');

  if ($('.sidebar').hasClass('active')) {
    $(this).find('i').addClass('fa-close');
    $(this).find('i').removeClass('fa-bars');
  } else {
    $(this).find('i').addClass('fa-bars');
    $(this).find('i').removeClass('fa-close');
  }
});

// Add hover feedback on menu
$('#menu-action').hover(function() {
    $('.sidebar').toggleClass('hovered');
});

