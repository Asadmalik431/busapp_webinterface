
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import NProgress from 'nprogress';
import router from './routes';
import swal from 'sweetalert2'
import VueProgressBar from 'vue-progressbar'
import '../../node_modules/bootstrap/dist/css/bootstrap.min.css'
import '../../node_modules/nprogress/nprogress.css'
import { Form, HasError, AlertError } from 'vform';
import DataTable from 'laravel-vue-datatable';
import Vue from 'vue'
import * as VueGoogleMaps from "vue2-google-maps";
import VueSession from 'vue-session'
Vue.use(VueSession)
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyCIw1JOs79P8RDv3iwcDJc_4kRizJxFpiE",
        libraries: "places"
    },
});
window.form = Form;
Vue.use(VueRouter);
Vue.use(DataTable);
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue')
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

router.beforeResolve((to, from, next) => {
  if (to.name) {
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  NProgress.done()
})

Vue.use(VueProgressBar, {
	color: 'rgb(143, 255, 199)',
	failedColor: 'red',
	height: '3px'
})

window.swal = swal;
window.base_url = document.head.querySelector('meta[name="base-url"]').content;
window.api_url = document.head.querySelector('meta[name="APP_URL"]').content;
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

window.dataTable = DataTable;

window.Fire =  new Vue();
import NotifyComponent from './components/NotificationsComponent.vue'
import NotifyContentComponent from './components/NotificationcontentComponent.vue'

import NotificationFooterComponent from './components/NotificationFooterComponent.vue'



if (process.env.MIX_APP_ENV === 'production') {
  Vue.config.devtools = false;
  Vue.config.debug = false;
  Vue.config.silent = true; 
}
window._this = this;
window.message_count    = '';
window.message_context  = '';
window.mesage_body  = '';
var config = {
  title: 'My App',
  message_content : 'sdds'
}


console.log(config.message_content)
function call_component(data){
  // alert('dd')
  Vue.component('my-checkbox', {
    template: message_context,
    data() {
      return {
        messages : mesage_body
      }
    },
    mounted(){
      console.log(config.title)
    },
    methods: {
      
    }
  });
}

 

$(document).on({
  click : function(){
    var notyId     = $(this).attr('notyId');
    var login_user = document.querySelector("meta[name='user-id']").getAttribute('content');
    axios({
      method: 'post',
      url: api_url +'/read_notification',
      data: {
        'notyId'     : notyId,
        'login_user' : login_user
      },
    })
    .then(function (response) {
      
      message_context = '';
      mesage_body     = JSON.parse(response.data.notification_cntxt);
      if(response.data.notification_count != 0){
        message_count   = response.data.notification_count;
      }
      
      message_context = '';
      $.each(mesage_body, function( index, value ) {
        let notyid       = value['id'];
        message_context += '<a  class="dropdown-item notification_click" notyId = "'+notyid+'">';
        message_context += '<i class="fas fa-envelope mr-2"></i>';
        message_context += value["name"];
        message_context += ' Starts Trip';
        message_context += '</a>';  
      });
      $(".badg_count").html(message_count);
      $(".message_context").html(message_context);
      $(".message_count_custom").html(message_count+' Notifications');
      
      
    })
    .catch(function (response) {
    });
    // alert($(this).attr('notyId'));
    // router.push({ name: 'parents', params: { notiid: notyId } })
    // router.push({ path: 'parents' ,params: { userId: '123' } })
  }
},'.notification_click');
const app = new Vue({
    vm : this,
    el: '#app',
    router,
    components: {
      'notification-component' : NotifyComponent, 
      'notification-contetnt'  : NotifyContentComponent,
      'notification-footer'    : NotificationFooterComponent
    },
    data() {
      return {
        counter : 1,
        config : window.config
        // message : message,
      }
    },
});
