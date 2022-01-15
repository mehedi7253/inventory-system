<template>
     <div>
          <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Update product Quantity <router-link class="btn btn-primary float-right" to="/stock">Stock</router-link></h3>
                </div>
                <div class="card-body">
                   <form class="user" @submit.prevent="quantityUpdate">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Product Quantity</label>
                                    <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Quantity" v-model="form.product_quantity">
                                    <small class="text-danger" v-if="errors.product_quantity"> {{ errors.product_quantity[0] }} </small>
                                </div>
                                <div class="col-md-6 mt-4 p-2">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
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
                product_quantity: ''
            },
            errors:{},
        }
  },

  created(){
    let id = this.$route.params.id
    axios.get('/api/stock/'+id)
    .then(({data}) => (this.form = data))
    .catch(console.log('error'))

  },

   methods:{
      quantityUpdate(){
          let id = this.$route.params.id
          axios.patch('/api/stock/'+id, this.form)
          .then(() => {
              this.$router.push({ name: 'stock' })
                Toast.fire({
                    icon: 'success',
                    title: 'Update Susccessful'
                })
          })
          .catch(error => this.errors = error.response.data.errors)
      }
    },


  }

</script>

<style scoped>

</style>
