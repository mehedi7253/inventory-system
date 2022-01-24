<template>
    <div>
         <div class="col-md-12 mx-auto mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Today Orders </h3>
                </div>
                <div class="card-body">
                     <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                             <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Total Amount</th>
                                    <th>Pay</th>
                                    <th>Due</th>
                                    <th>Pay By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="order in orders" :key="order.id">
                                    <td>{{ order.name }}</td>
                                    <td>{{ order.total }}</td>
                                    <td>{{ order.pay }}</td>
                                    <td>{{ order.due }}</td>
                                    <td>{{ order.pay_by }}</td>
                                    <td>
                                        
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
export default {
    created(){
        if(!User.loggedIn())
        {
            this.$router.push({ name: '/' })
        }
    },

    data(){
        return{
            orders: [],
        }
    },

    methods:{
        allOrder(){
            axios.get('/api/orders/')
            .then(({data}) => (this.orders = data))
            .catch()
        }
    },

    created(){
        this.allOrder();
    }
}
</script>

<style scoped>

</style>
