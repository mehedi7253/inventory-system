<template>
    <div>
         <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>All Employee <router-link class="btn btn-primary float-right" to="/store-employee">Add Employee</router-link></h3>
                </div>
                <div class="card-body">
                     <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                     <br/>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                             <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Phone</th>
                                    <th>Salary</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="employee in filterSearch" :key="employee.id">
                                    <td>{{ employee.name }}</td>
                                    <td>
                                        <img :src="employee.photo" id="em_photo">
                                    </td>
                                    <td>{{ employee.phone }}</td>
                                    <td>{{ employee.salary }}</td>
                                    <td>{{ employee.joinig_date }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-employee', params:{id:employee.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
            if (!User.loggedIn()) {
                this.$router.push({name: '/'})
            }
        },
        data()
        {
            return{
                employees:[],
                searchTerm: ''
            }
        },
        computed:{

            filterSearch(){
                return this.employees.filter(employee => {
                    return employee.phone.match(this.searchTerm)
                })
            }
        },

        methods:
        {
            allEmployee()
            {
                axios.get('/api/employee/')
                .then(({data}) => (this.employees = data))
                .catch()
            },

            deleteEmployee(id)
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
                        axios.delete('/api/employee/'+id)
                        .then(() => {
                            this.employees = this.employees.filter(employee => {
                                return employee.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({name: 'employee'})
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
          this.allEmployee();
       }
     }
</script>

<style scoped>
    #em_photo{
        height: 40px;
        width: 40px;
    }
</style>
