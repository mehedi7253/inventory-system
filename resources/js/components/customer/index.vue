<template>
     <div>
         <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Customer  <router-link class="btn btn-primary float-right" to="/store-customer">Add Customer</router-link></h3>
                </div>
                <div class="card-body">
                     <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                     <br/>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                             <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers" :key="customer.id">
                                    <td>{{ customer.name }}</td>
                                    <td>{{ customer.email }}</td>
                                    <td>{{ customer.phone }}</td>
                                    <td>
                                        <img :src="customer.photo" id="em_photo">
                                    </td>
                                    <td>
                                        <router-link :to="{name: 'view-customer', params:{id:customer.id}}" class="btn btn-info">View</router-link>
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
            if(!User.loggedIn())
            {
                this.$router.push({ name: '/' })
            }
        },

        data(){
            return{
                customers: []
            }
        },

        methods:{
            allCustomers(){
                axios.get('/api/customer/')
                .then(({data}) => (this.customers = data))
                .catch()
            }
        },

        created(){
            this.allCustomers();
        }
    }
</script>

<style>

</style>
