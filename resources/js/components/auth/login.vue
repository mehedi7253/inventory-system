<template>
    <div>
        <div class="col-md-8 mx-auto mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                   <form class="user" @submit.prevent="login">
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" v-model="form.email">
                            <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password">
                            <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login </button>
                        </div>
                        <hr>
                        <div class="text-center">
                            <router-link to="/registers" class="font-weight-bold small">Create an Account!</router-link>
                        </div>
                        <div class="text-center">
                            <router-link to="/forget" class="font-weight-bold small">Forget Password</router-link>
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
