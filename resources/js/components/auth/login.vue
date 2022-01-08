<template>
    <div>
        <div class="col-md-8 mx-auto mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form @submit.prevent="login">
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="email" v-model="form.email" placeholder="Enter Email" class="form-control">
                            <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label>Password: </label>
                            <input type="password" v-model="form.password" placeholder="Enter Email" class="form-control">
                            <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                        </div>
                        <div class="form-group ml-4">
                             <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Login</button>
                            <router-link to="/forget" class="btn btn-link">Forgot Your Password?</router-link>
                        </div>
                    </form>
                </div>
                 <div class="card-footer">
                   <router-link to="/registers" class="btn float-right btn-info">Create New Account</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
 export default {
    created(){
      if (User.loggedIn()) {
        this.$router.push({name: 'homes'})
      }
    },

    data(){
    return {
      form:{
        email: null,
        password: null
      },
      errors:{}
    }
  },
  methods:{
    login(){
      axios.post('/api/auth/login',this.form)
      .then(res => {
        User.responseAfterLogin(res)
        Toast.fire({
          icon: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({ name: 'homes'})
      })

       .catch(error =>this.errors = error.response.data.errors)
       .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid Email or Password'
            })
        )
    }
  }


  }

</script>

<style scoped>

</style>
