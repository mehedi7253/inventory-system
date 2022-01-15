<template>
     <div>
          <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product <router-link class="btn btn-primary float-right" to="/product">All Products</router-link></h3>
                </div>
                <div class="card-body">
                   <form class="user" @submit.prevent="ProductUpdate" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Product Name</label>
                                <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Product Name" v-model="form.product_name">
                                <small class="text-danger" v-if="errors.product_name"> {{ errors.product_name[0] }} </small>
                                </div>
                                <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Product Code</label>
                                    <input type="text" class="form-control" disabled id="exampleInputFirstName" placeholder="Enter Your Product Code" v-model="form.product_code">
                                    <small class="text-danger" v-if="errors.product_code"> {{ errors.product_code[0] }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Product Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" v-model="form.category_id">
                                        <option :value="category.id" v-for="category in categories" :key="category">{{ category.category_name }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Product Supplier</label>
                                    <select class="form-control" id="exampleFormControlSelect1" v-model="form.supplier_id">
                                        <option :value="supplier.id" v-for="supplier in suppliers" :key="supplier">{{ supplier.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="exampleFormControlSelect1">Product Root</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName"  v-model="form.root">
                                    <small class="text-danger" v-if="errors.root"> {{ errors.root[0] }} </small>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlSelect1">Buying Price</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName"  v-model="form.buying_price">
                                    <small class="text-danger" v-if="errors.buying_price"> {{ errors.buying_price[0] }} </small>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleFormControlSelect1">Selling Price</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" v-model="form.selling_price">
                                    <small class="text-danger" v-if="errors.selling_price"> {{ errors.selling_price[0] }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Buying Date</label>
                                    <input type="date" class="form-control" id="exampleInputFirstName" v-model="form.buying_date">
                                    <small class="text-danger" v-if="errors.buying_date"> {{ errors.buying_date[0] }} </small>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Product Quantity</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Quantity" v-model="form.product_quantity">
                                    <small class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                                    <small class="text-danger" v-if="errors.image"> {{ errors.image[0] }} </small>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>

                                <div class="col-md-6">
                                    <img :src="form.image" style="height: 40px; width: 40px;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
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

    data(){
        return {
        form:{
            product_name: '',
            product_code: '',
            category_id: '',
            supplier_id: '',
            root: '',
            buying_price: '',
            selling_price: '',
            buying_date: '',
            image: '',
            product_quantity: ''
        },
        errors:{},
        categories:{},
        suppliers:{},
        }
  },

methods:{
    onFileSelected(event){
     let file = event.target.files[0];
     if (file.size > 1048770) {
      Notification.image_validation()
     }else{
      let reader = new FileReader();
      reader.onload = event =>{
        this.form.newimage = event.target.result

      };
      reader.readAsDataURL(file);
     }

    },

    ProductUpdate(){
  	  let id = this.$route.params.id
       axios.patch('/api/product/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'product'})
            Toast.fire({
                icon: 'success',
                title: 'Update Susccessful'
            })
       })
       .catch(error =>this.errors = error.response.data.errors)
     },

},

  created(){
    let id = this.$route.params.id
    axios.get('/api/product/'+id)
    .then(({data}) => (this.form = data))
    .catch(console.log('error'))

    // Category Collected
    axios.get('/api/category/')
    .then(({data}) => (this.categories = data))

    // Supplier Collected
    axios.get('/api/supplier/')
    .then(({data}) => (this.suppliers = data))

  },


  }

</script>

<style scoped>

</style>
