
<template>
    <div>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">POS</li>
            </ol>
          </div>


          <div class="row mb-3">
              <div class="col-md-6 col-sm-12 float-left">
                  <div class="card">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
					        <a class="btn btn-sm btn-info" to="/store-customer"><font color="#ffffff">Add Customer</font></a>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive" style="font-size: 12px;">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="cart in carts" :key="cart.id">
                                    <td>{{ cart.pro_name }}</td>
                                    <td>
                                        <input type="text" readonly="" style="width: 15px;" :value="cart.pro_quantity">
                                        <button @click.prevent="increment(cart.id)" class="btn btn-sm btn-success">+</button>
                                        <button  @click.prevent="decrement(cart.id)" class="btn btn-sm btn-danger" v-if="cart.pro_quantity >= 2">-</button>
                                        <button class="btn btn-sm btn-danger" v-else disabled="">-</button>
                                    </td>
                                    <td>{{ cart.product_price }}</td>
                                    <td>{{ cart.sub_total }}</td>
                                    <td><a @click="RemoveItem(cart.id)" class="btn btn-sm btn-primary">X</a></td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                      </div>
                      <div class="card-footer">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
                            <strong>{{ qty }}</strong>
                            </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
                            <strong>562 $</strong>
                            </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">Vat:
                            <strong>{{ vats.vat }} %</strong>
                            </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Total :
                            <strong>5456 $</strong>
                            </li>
                        </ul>
                        <br>
                        <form>
                            <label>Customer Name</label>
                            <select class="form-control" v-model="customer_id">
                                    <option v-for="customer in customers" :key="customer.id" >{{ customer.name }}</option>
                            </select>
                            <label>Pay</label>
                            <input type="text" class="form-control" required="" v-model="pay">
                            <label>Due</label>
                            <input type="text" class="form-control" required="" v-model="due">
                            <label>Pay By</label>
                            <select class="form-control" v-model="customer_id">
                                    <option value="HandCash">Hand Cash </option>
                                    <option value="Cheaque">Cheaque </option>
                                    <option value="GiftCard">Gift Card </option>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>

                      </div>
                  </div>
              </div>
              <div class="col-md-6 col-sm-12 float-left">
                    <div class="card">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                      </div>
                      <div class="card-body">
                          <!--  Category Wise Product -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Product </a>
                                </li>
                                <li class="nav-item" v-for="category in categories" :key="category.id">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subproduct(category.id)" >{{ category.category_name }}</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

					                <div class="card-body">
					                    <input type="text" v-model="searchTerm" class="form-control"  placeholder="Search Product">
                                        <div class="col-md-4 col-sm-12 float-left" v-for="product in filtersearch" :key="product.id">

                                                <div class="card mt-2">
                                                    <img :src="product.image" id="em_photo" class="card-img-top">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{ product.product_name }}</h6>
                                                        <span class="badge badge-success" v-if="product.product_quantity  >= 1 ">Available {{ product.product_quantity }}  </span>
                                                        <span class="badge badge-danger" v-else>Stock Out </span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button @click.prevent="AddToCart(product.id)" class="btn btn-success btn-block">AddTo Cart</button>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

					                <div class="card-body">
					                    <input type="text" v-model="searchTerm" class="form-control" style="width: 560px;" placeholder="Search Product">
                                        <div class="col-md-4 col-sm-12 float-left" v-for="product in filtersearch" :key="product.id">
                                            <a href="#">
                                                <div class="card mt-2">
                                                    <img :src="product.image" id="em_photo" class="card-img-top">
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{ product.product_name }}</h6>
                                                        <span class="badge badge-success" v-if="product.product_quantity  >= 1 ">Available {{ product.product_quantity }}  </span>
                                                        <span class="badge badge-danger" v-else>Stock Out </span>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    </div>

                                </div>

                            </div>


                      </div>
                      <div class="card-footer">

                      </div>
                  </div>
              </div>
          </div>

        </div>
    </div>
</template>



<script type="text/javascript">
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    created(){
        this.allProduct();
        this.allCategory();
        this.allCustomer();
        this.cartProduct();
        Reload.$on('AfterAdd', () => {
            this.cartProduct();
        });
        this.vat();
    },

    data(){
      return{
        products:[],
        categories:'',
        getproducts:[],
        customers: [],
        searchTerm:'',
        getsearchTerm:'',
        carts: [],
        vats: '',

      }
    },

    computed:{
        filtersearch(){
            return this.products.filter(product => {
                return product.product_name.match(this.searchTerm)
                })
            },
            getfiltersearch(){
            return this.getproducts.filter(getproduct => {
                return getproduct.product_name.match(this.getsearchTerm)
            })
        },
    },

    qty(){
    let sum = 0;
        for(let i = 0; i < this.carts.length; i++){
            sum += (parseFloat(this.carts[i].pro_quantity));
        }
        return sum;
    },

     methods:{
        allProduct(){
            axios.get('/api/product/')
            .then(({data}) => (this.products = data))
            .catch()
          },
        allCategory(){
            axios.get('/api/category/')
            .then(({data}) => (this.categories = data))
            .catch()
        },
         allCustomer(){
            axios.get('/api/customer/')
            .then(({data}) => (this.customers = data))
            .catch()
        },
        subproduct(id){
            axios.get('/api/getting/product/'+id)
            .then(({data}) => (this.getproducts = data))
            .catch()
        },

        //add cart
        AddToCart(id){
             axios.get('/api/AddToCart/'+id)
            .then(() => {
                Reload.$emit('AfterAdd');
                Toast.fire({
                    icon: 'success',
                    title: 'Add To Cart Susccessful'
                })
            })
            .catch()
        },
        cartProduct(){
             axios.get('/api/cart/product/')
            .then(({data}) => (this.carts = data))
            .catch()
        },
        RemoveItem(id){
            axios.get('/api/remove/cart/'+id)
                .then(() => {
                    Reload.$emit('AfterAdd');
                    Toast.fire({
                        icon: 'success',
                        title: 'Remove Item Succssful'
                    })
                })
                .catch()
        },
        increment(id){
            axios.get('/api/increment/'+id)
                .then(() => {
                    Reload.$emit('AfterAdd');
                    Toast.fire({
                        icon: 'success',
                        title: 'Quantity Susccessful'
                    })
                })
            .catch()
        },
        decrement(id){
            axios.get('/api/decrement/'+id)
                .then(() => {
                    Reload.$emit('AfterAdd');
                    Toast.fire({
                        icon: 'success',
                        title: 'Quantity Susccessful'
                    })
                })
            .catch()
        },
        vat(){
            axios.get('/api/vat/')
            .then(({data}) => (this.vats = data))
            .catch()
        }

    }
}
</script>


<style type="text/css" scoped>
  #em_photo{
    height: 100px;
    width: 100%;
  }
</style>
