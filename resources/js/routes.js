let login = require('./components/auth/login.vue').default;
let registers = require('./components/auth/register.vue').default;
let forget    = require('./components/auth/forget.vue').default;
let home      = require('./components/home.vue').default;
let logout    = require('./components/auth/logout.vue').default;

//employee
let storeemplyee = require('./components/employee/create.vue').default;
let employee = require('./components/employee/index.vue').default;


export const routes = [
    { path: '/', component: login, name: '/' },
    { path: '/registers', component: registers, name: 'registers' },
    { path: '/forget', component: forget, name: 'forget'},
    { path: '/homes', component: home, name: 'homes'},
    { path: '/logout', component: logout, name: 'logout'},

    //employee
    { path: '/store-employee', component: storeemplyee, name: 'storeemplyee'},
    { path: '/employee', component: employee, name: 'employee'},

  ]
