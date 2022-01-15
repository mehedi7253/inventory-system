<template>
    <div>
        <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Stock <router-link class="btn btn-primary float-right" to="/store-product">Add Products</router-link></h3>
                </div>
                <div class="card-body">
                     <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                     <br/>
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Photo</th>
                                <th>Category</th>
                                <th>Buying Price</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products" :key="product.id">
                                    <td>{{ product.product_name }}</td>
                                    <td>{{ product.product_code }}</td>
                                   <td><img :src="product.image" id="em_photo"></td>
                                    <td>{{ product.category_name }}</td>
                                    <td>{{ product.buying_price }}</td>
                                    <td v-if="product.product_quantity >= 1">
                                        <span class="badge badge-success">Available </span>
                                    </td>
                                    <td v-else><span class="badge badge-danger">Stock Out </span></td>
                                    <td>{{ product.product_quantity }}</td>
                                    <td>
                                        <router-link :to="{ name: 'edit-stock', params:{id:product.id }}" class="btn btn-info">Update</router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
     </div>
</template>

<script>
    export default {
       created(){
           if(!User.loggedIn){
               this.$router.push({name: '/'})
           }
       },

       data(){
           return{
               products: []
           }
       },

       methods:{
           allProduct(){
               axios.get('/api/stock/')
               .then(({data}) => this.products = data)
               .catch()
           }
       },

       created(){
           this.allProduct();
       }
    }
</script>

<style scoped>

</style>
