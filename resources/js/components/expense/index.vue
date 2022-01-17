<template>
     <div>
          <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>All Expense List<router-link class="btn btn-primary float-right" to="/store-expense">Add Expense</router-link></h3>
                </div>
                <div class="card-body">
                    <input type="date" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                     <br/>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                             <thead class="thead-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="expense in expenses" :key="expense.id">
                                    <td>{{ expense.expense_date }}</td>
                                    <td>{{ expense.amount }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-expense', params:{id:expense.id}}" class="btn btn-info">Edit</router-link> |
                                        <a @click="deleteExpense(expense.id)" class="btn btn-danger text-white">Delete</a>
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
    export default{
         created(){
            if(!User.loggedIn())
            {
                this.$router.push({ name: '/' })
            }
        },

        data(){
            return{
                expenses: [],
                searchTerm: ''
            }
        },

        computed:{
            filtersearch(){
                return this.expenses.filter(expense => {
                    return expense.expense_date.match(this.searchTerm)
                })
            }
        },

        methods:{
            allExpenses(){
                axios.get('/api/expense/')
                .then(({data}) => (this.expenses = data))
                .catch()
            },
            deleteExpense(id){
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
                        axios.delete('/api/expense/'+id)
                        .then(() => {
                            this.expenses = this.expenses(expense => {
                                return expense.id != id
                            })
                        })
                        .catch(() => {
                            this.$router.push({name: 'expense'})
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
            this.allExpenses();
        }

    }
</script>

<style scoped>

</style>
