<template>
    <div>
         <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>All Employee <router-link class="btn btn-primary float-right" to="/store-employee">Add Employee</router-link></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                             <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Phone</th>
                                    <th>Sallery</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="employee in employees" :key="employee.id">
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
                employees:[]
            }
        },

        methods:
        {
            allEmployee()
            {
                axios.get('/api/employee/')
                .then(({data}) => (this.employees = data))
                .catch()
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
