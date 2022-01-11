
require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Router import
import {routes} from './routes'

//import user class
import User from './Helpers/User'
window.User = User

//notification
// import Notification from './Helpers/Notification'
// window.Notification = Notification


const router = new VueRouter({
    routes,
    mode: 'history'
  })


  //sweet alert start
    import Swal from 'sweetalert2';
    window.Swal = Swal;

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
      })

      window.Toast = Toast;
  //sweet alert end
const app = new Vue({
    el: '#app',
    router
});
