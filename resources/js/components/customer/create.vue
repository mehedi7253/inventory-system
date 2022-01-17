<template>
   <div>
        <div class="col-md-12 mx-auto mb-5">
        <div class="card">
            <div class="card-header">
                <h3>Add Customer <router-link class="btn btn-primary float-right" to="/customer">All Customer</router-link></h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="addCustomer" enctype="multipart/form-data">
                    <div class="form-group col-md-6 float-left">
                        <label>Customer Name <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" placeholder="Enter Customer Name" class="form-control" v-model="form.name">
                        <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                    </div>
                     <div class="form-group col-md-6 float-left">
                        <label>Customer Email <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="email" placeholder="Enter Customer Email" class="form-control" v-model="form.email">
                        <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                    </div>
                     <div class="form-group col-md-6 float-left">
                        <label>Customer Phone <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" placeholder="Enter Customer Phone" class="form-control" v-model="form.phone">
                        <small class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </small>
                    </div>
                     <div class="form-group col-md-6 float-left">
                        <label>Customer Address <sup class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" placeholder="Enter Customer Address" class="form-control" v-model="form.address">
                        <small class="text-danger" v-if="errors.address"> {{ errors.address[0] }} </small>
                    </div>
                     <div class="form-group col-md-4 float-left">
                        <label>Customer Photo </label>
                        <input type="file"  class="form-control" id="customFile" @change="onFileSelected">
                        <small class="text-danger" v-if="errors.photo"> {{ errors.photo[0] }} </small>
                    </div>
                    <div class="form-group col-sm-4 float-left">
                        <label></label>
                        <img :src="form.photo" style="height: 50px; width: 50px; margin: 27px;">
                    </div>
                     <div class="form-group col-md-4 float-left">
                        <input type="submit" class="btn btn-success mt-4 btn-block" value="Submit">
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
        if(!User.loggedIn()){
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
                photo: null
            },
            errors: {}
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
                this.form.photo = event.target.result
                console.log(event.target.result);
            };
            reader.readAsDataURL(file);
            }

            },
        addCustomer(){
            axios.post('/api/customer/',this.form)
            .then(() => {
                this.$router.push({name: 'customer'})
                Toast.fire({
                    icon: 'success',
                    title: 'Added Susccessful'
                })
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style scoped>

</style>
