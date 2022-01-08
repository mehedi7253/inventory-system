<template>
   <div>
        <div class="col-md-8 mx-auto mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Registration Form</h1>
                </div>
                <div class="card-body">
                    <form @submit.prevent="signup">
                        <div class="form-group">
                            <label> Name</label>
                            <input type="text" v-model="form.name" placeholder="Enter Your Name" class="form-control">
                            <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label> Email</label>
                            <input type="email" v-model="form.email"  placeholder="Enter Your Email" class="form-control">
                            <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" v-model="form.password"  placeholder="Enter Password" class="form-control">
                            <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" v-model="form.password_confirmation"  placeholder="Confirm Password" class="form-control">
                            <span class="text-danger" v-if="errors.password_confirmation">{{ errors.password[0] }}</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                   <router-link to="/" class="btn btn-primary float-right">All Ready have Account</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">

  export default {
    created(){
      if (User.loggedIn()) {
        this.$router.push({name: 'homes'})
      }
    },

    data(){
    return {
      form:{
        name: null,
        email: null,
        password: null,
        confirm_password: null
      },
      errors:{}
    }
  },
  methods:{
    signup(){
      axios.post('/api/auth/signup',this.form)
      .then(res => {
        User.responseAfterLogin(res)
        Toast.fire({
          icon: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({ name: 'homes'})
      })

       .catch(error =>this.errors = error.response.data.errors)

    }
  }


  }
</script>

<style scoped>

</style>
