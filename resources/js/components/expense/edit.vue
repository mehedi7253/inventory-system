<template>
     <div>
          <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Update Expense <router-link class="btn btn-primary float-right" to="/expense">All Expense</router-link></h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="editExpense">
                        <div class="form-group col-6 float-left">
                            <label> Amount: <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" placeholder="Enter Amount" v-model="form.amount" class="form-control">
                            <label class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</label>
                        </div>
                        <div class="form-group col-6 float-left">
                            <label> Date: <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="date"  class="form-control" v-model="form.expense_date">
                            <label class="text-danger" v-if="errors.expense_date">{{ errors.expense_date[0] }}</label>
                        </div>
                        <div class="form-group col-12 float-left">
                            <label> Details: <sup class="text-danger font-weight-bold">*</sup></label>
                            <textarea class="form-control" id="textArea" placeholder="Enter Expense Details" v-model="form.details"></textarea>
                            <label class="text-danger" v-if="errors.details">{{ errors.details[0] }}</label>
                        </div>
                        <div class="form-group col-4 float-left">
                            <input type="submit" name="btn" value="Submit" class="btn btn-block btn-success">
                        </div>
                    </form>
                </div>
            </div>
          </div>
     </div>
</template>

<script>
    export default{
        created(){
            if(!User.loggedIn()){
                this.$router.push({ name: '/'})
            }
        },

        data(){
            return{
                form:{
                    amount: '',
                    details: '',
                    expense_date: ''
                },
                errors: {},
            }
        },

        created(){
            let id = this.$route.params.id
            axios.get('/api/expense/'+id)
            .then(({data}) => this.form = data)
            .catch(console.log('error'))
        },

        methods:{
            editExpense(){
                let id = this.$route.params.id
                axios.patch('/api/expense/'+id,this.form)
                .then(() => {
                    this.$router.push({name: 'expense'})
                     Toast.fire({
                        icon: 'success',
                        title: 'Update Susccessful'
                    })
                })
                .catch(error =>this.errors = error.response.data.errors)

            }
        },



    }
</script>

<style scoped>
    #textArea{
        height: 200px;
    }
</style>
