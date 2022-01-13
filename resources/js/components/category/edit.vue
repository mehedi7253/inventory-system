<template>
      <div>
          <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category <router-link class="btn btn-primary float-right" to="/category">All Categories</router-link></h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="updateCategory">
                       <div class="form-group col-6 float-left">
                            <label>Category Name: <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" placeholder="Enter Category Name" v-model="form.category_name" class="form-control">
                            <label class="text-danger" v-if="errors.category_name">{{ errors.category_name[0] }}</label>
                        </div>
                         <div class="form-group col-md-3 p-2 float-left">
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
        if(!User.loogedIn())
        {
            this.$router.push({ name: '/' })
        }
    },

    data(){
        return{
            form:{
                category_name: ''
            },
            errors: {}
        }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/category/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },

    methods:{
        updateCategory(){
                let id = this.$route.params.id
            axios.patch('/api/category/'+id,this.form)
            .then(() => {
                this.$router.push({ name: 'category' })
                Toast.fire({
                    icon: 'success',
                    title: 'Update Susccessful'
                })
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    }

}
</script>

<style>

</style>
