
<template>
    <div>
        <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Add Supplier <router-link class="btn btn-primary float-right" to="/supplier">All Supplier</router-link></h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="addSupplier">
                        <div class="form-group col-6 float-left">
                            <label>Name: <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" placeholder="Enter Supplier Name" v-model="form.name" class="form-control">
                             <label class="text-danger" v-if="errors.name">{{ errors.name[0] }}</label>
                        </div>
                         <div class="form-group col-6 float-left">
                            <label>Email: <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="email" placeholder="Enter Supplier Email" v-model="form.email" class="form-control">
                            <label class="text-danger" v-if="errors.email">{{ errors.email[0] }}</label>
                        </div>
                         <div class="form-group col-6 float-left">
                            <label>Phone: <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="number" min="1" placeholder="Enter Supplier Phone" v-model="form.phone" class="form-control">
                             <label class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</label>
                        </div>
                         <div class="form-group col-6 float-left">
                            <label>Shop Name:</label>
                            <input type="text" placeholder="Enter Shop Name" v-model="form.shop_name" class="form-control">
                             <label class="text-danger" v-if="errors.shop_name">{{ errors.shop_name[0] }}</label>
                        </div>
                         <div class="form-group col-12 float-left">
                            <label>Address: <sup class="text-danger font-weight-bold">*</sup></label>
                            <textarea class="form-control" placeholder="Enter Supplier Address" v-model="form.address"></textarea>
                             <label class="text-danger" v-if="errors.address">{{ errors.address[0] }}</label>
                        </div>
                         <div class="form-group col-6 float-left">
                            <input type="submit" class="btn btn-success btn-block" value="Submit">
                        </div>
                    </form>
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
            this.$router.push({name: '/'})
        }
    },

    data(){
        return{
            form:{
                name: null,
                email: null,
                phone: null,
                address: null,
                shop_name: null
            },
            errors:{}
        }
    },

    methods:{
        addSupplier(){
            axios.post('/api/supplier/', this.form)
            .then(() => {
                this.$router.push({ name: 'supplier'})
                 Toast.fire({
                    icon: 'success',
                    title: 'Added Susccessful'
                })
            })
            .catch(error => this.errors = error.response.data.errors)
        },
    }
}
</script>

<style scoped>
    .error{
        color: red;
    }
</style>
