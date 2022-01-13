<template>
     <div>
         <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>All Supplier <router-link class="btn btn-primary float-right" to="/store-supplier">Add Supplier</router-link></h3>
                </div>
                <div class="card-body">
                     <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                     <br/>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                             <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Shop Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="supplier in filtersearch" :key="supplier.id">
                                    <td>{{ supplier.name }}</td>
                                    <td>{{ supplier.phone }}</td>
                                    <td>{{ supplier.email }}</td>
                                    <td>
                                        <span v-if="supplier.shop_name == ''">NULL</span>
                                       <span v-else></span> {{ supplier.shop_name }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-supplier', params:{id:supplier.id}}" class="btn btn-info">Edit</router-link> |
                                        <a @click="deleteSupplier(supplier.id)" class="btn btn-danger text-white">Delete</a>
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
        if(!User.loggedIn()){
            this.$router.push({name: '/'})
        }
    },

    data(){
        return{
            suppliers: [],
            searchTerm: ''
        }
    },
    computed:{
        filtersearch(){
        return this.suppliers.filter(supplier => {
            return supplier.name.match(this.searchTerm)
        })
      }
    },
    methods:{
        allSupplier(){
            axios.get('/api/supplier/')
            .then(({data}) => (this.suppliers = data))
            .catch()
        },

         deleteSupplier(id)
            {
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value){
                        axios.delete('/api/supplier/'+id)
                        .then(() => {
                            this.suppliers = this.suppliers.filter(supplier => {
                                return supplier.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({name: 'supplier'})
                        })
                        Swal.fire(
                            'Deleted!',
                            'Data Deleted Successful!',
                            'success'
                    )}
                })

            }
    },
    created(){
        this.allSupplier();
    }
}

</script>


<style  scoped>

</style>>

