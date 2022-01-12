<template>
   <div>
        <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Update Employee <router-link class="btn btn-primary float-right" to="/employee">All Employee</router-link></h3>
                </div>
                <div class="card-body">
                  <form @submit.prevent="employeeUpdate" enctype="multipart/form-data">
                       <div class="form-group col-md-6 float-left">
                            <label> Name</label>
                            <input type="text" v-model="form.name" placeholder="Enter Your Name" class="form-control">
                            <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                        </div>
                         <div class="form-group col-md-6 float-left">
                            <label> Email</label>
                            <input type="email" v-model="form.email"  placeholder="Enter Your Email" class="form-control">
                            <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Phone</label>
                            <input type="text" v-model="form.phone"  placeholder="Enter Phone Number" class="form-control">
                            <span class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</span>
                        </div>
                        <div class="form-group col-md-6 float-left">
                            <label>Salary</label>
                            <input type="text" v-model="form.salary"  placeholder="Enter Salary" class="form-control">
                            <span class="text-danger" v-if="errors.salary">{{ errors.salary[0] }}</span>
                        </div>
                         <div class="form-group col-md-12 float-left">
                            <label>Address</label>
                            <textarea  v-model="form.address" placeholder="Enter Address" class="form-control"></textarea>
                            <span class="text-danger" v-if="errors.address">{{ errors.address[0] }}</span>
                        </div>
                         <div class="form-group col-md-6 float-left">
                            <label>Joinig Date</label>
                            <input type="date" v-model="form.joinig_date"  placeholder="Enter Joinig Date" class="form-control">
                            <span class="text-danger" v-if="errors.joinig_date">{{ errors.joinig_date[0] }}</span>
                        </div>
                         <div class="form-group col-md-6 float-left">
                            <label>NID</label>
                            <input type="text" v-model="form.nid"  placeholder="Enter NID Number" class="form-control">
                            <span class="text-danger" v-if="errors.nid">{{ errors.nid[0] }}</span>
                        </div>
                        <div class="form-group col-md-4 float-left">
                            <label></label>
                            <input type="submit" class="btn btn-primary btn-block" value="Update">
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        name: null,
        email: null,
        phone: null,
        salary: null,
        address: null,
        nid: null,
        joinig_date: null,
      },
      errors:{}
    }
  },

    created(){
        let id = this.$route.params.id
        axios.get('/api/employee/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },

    methods:{
       onFileSelected(event){
            // console.log(event) work it or not
            let file = event.target.files[0];
            if(file.size > 1048770){
                Toast.fire({
                icon: 'error',
                title: 'Upload Image Size Less Then 1 MB'
                })
            }else{
                let reader = new FileReader();
                 reader.onload = event =>{
                    this.form.photo = event.target.result
                    console.log(event.target.result);
                 };
                  reader.readAsDataURL(file);
            }
        },

        employeeUpdate(){
            let id = this.$route.params.id
            axios.patch('/api/employee/'+id,this.form)
            .then(() => {
                this.$router.push({ name: 'employee'})
                Toast.fire({
                    icon: 'success',
                    title: 'Susccessfully Updated'
                })
                .catch(error =>this.errors = error.response.data.errors)
            })
        },

    }
}
</script>

<style scoped>

</style>
