let login = require('./components/auth/login.vue').default;
let registers = require('./components/auth/register.vue').default;
let forget    = require('./components/auth/forget.vue').default;
let home      = require('./components/home.vue').default;
let logout    = require('./components/auth/logout.vue').default;

//employee
let storeemplyee = require('./components/employee/create.vue').default;
let employee = require('./components/employee/index.vue').default;
let editemployee = require('./components/employee/edit.vue').default;

//suppliers
let storesupplier = require('./components/suppllier/create.vue').default;
let supplier      = require('./components/suppllier/index.vue').default;
let editsupplier  = require('./components/suppllier/edit.vue').default;

//category
let storecategory = require('./components/category/create.vue').default;
let category      = require('./components/category/index.vue').default;
let editcategory  = require('./components/category/edit.vue').default;

//products
let storeproduct  = require('./components/product/create.vue').default;
let product       = require('./components/product/index.vue').default;
let editproduct   = require('./components/product/edit.vue').default;

//product stock
let stock         = require('./components/stock/index.vue').default;
let editstock     = require('./components/stock/edit.vue').default;

//expense
let storeexpense  = require('./components/expense/create.vue').default;
let expense       = require('./components/expense/index.vue').default;
let editexpense   = require('./components/expense/edit.vue').default;

//customer
let storecustomer = require('./components/customer/create.vue').default;
let customer      = require('./components/customer/index.vue').default;
let viewcustomer  = require('./components/customer/profile.vue').default;

//pos
let pos = require('./components/pos/pointofsale.vue').default;


export const routes = [
    { path: '/', component: login, name: '/' },
    { path: '/registers', component: registers, name: 'registers' },
    { path: '/forget', component: forget, name: 'forget'},
    { path: '/homes', component: home, name: 'homes'},
    { path: '/logout', component: logout, name: 'logout'},

    //employee
    { path: '/store-employee', component: storeemplyee, name: 'storeemplyee'},
    { path: '/employee', component: employee, name: 'employee'},
    { path: '/edit-employee/:id', component: editemployee, name:'edit-employee'},

    //supplier
    { path: '/store-supplier', component: storesupplier, name: 'store-supplier'},
    { path: '/supplier', component: supplier, name: 'supplier'},
    { path: '/edit-supplier/:id', component: editsupplier, name: 'edit-supplier'},

    //category
    { path: '/store-category', component: storecategory, name: 'store-category'},
    { path: '/category', component: category, name: 'category'},
    { path: '/edit-category/:id', component: editcategory, name: 'edit-category'},

    //products
    { path: '/store-product', component: storeproduct, name: 'store-product' },
    { path: '/product', component: product, name: 'product' },
    { path: '/edit-product/:id', component: editproduct, name: 'edit-product' },

    //stock
    { path: '/stock', component: stock, name: 'stock'},
    { path: '/edit-stock/:id', component: editstock, name: 'edit-stock'},

    //expense
    { path: '/store-expense', component: storeexpense, name: 'store-expense'},
    { path: '/expense', component: expense, name: 'expense'},
    { path: '/edit-expense/:id', component: editexpense, name: 'edit-expense'},

    //customer
    { path: '/store-customer', component: storecustomer, name: 'store-customer'},
    { path: '/customer', component: customer, name: 'customer'},
    { path: '/view-customer/:id', component: viewcustomer, name: 'view-customer'},

    //pos
    { path: '/pos', component: pos, name: 'pos'},
  ]
