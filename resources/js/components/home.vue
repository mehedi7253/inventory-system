<template>
<div>
    <h1>Home Component</h1>
    <router-link to="/logout">Logout</router-link>
</div>


</template>

<script>
export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

}
</script>

<style scoped>

</style>
