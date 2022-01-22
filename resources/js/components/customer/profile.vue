<template>
      <div>
        <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3> Customer Profile <router-link class="btn btn-primary float-right" to="/customer">All Customer</router-link></h3>
                </div>
                <div class="card-body">
                    <div class="col-md-4 col-sm-12 float-left">
                        <!-- <img :src="customer.photo" id="em_photo"> -->
                    </div>
                    <div class="col-md-4 col-sm-12 float-left">
                       <table class="table table-borderd" v-for="customer in customers" :key="customer.id">
                           <tr>
                               <th>Name:</th>
                               <td>{{ customer.name }}</td>
                           </tr>
                           <tr>
                               <th>Email:</th>
                               <td>{{ customer.email }}</td>
                           </tr>
                           <tr>
                               <th>Phone:</th>
                               <td>{{ customer.phone }}</td>
                           </tr>
                           <tr>
                               <th>Address:</th>
                               <td>{{ customer.address }}</td>
                           </tr>
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
        if(!User.loggedIn()){
            this.$router.push({name: '/'})
        }
    },

    data(){
        return{
          customers: []
        }
    },

    methods:{
        customerProfile(){
            let id = this.$route.params.id
            axios.get('/api/customer/'+id)
            .then(({data}) => (this.customers = data))
            .catch(error => this.errors = error.response.data.errors)
        },
    },

    created(){
        this.customerProfile();
    }
}
</script>

<style scoped>
    #em_photo{
        height: 300px;
        width: 100%;
    }
</style>
