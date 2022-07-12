<template>
    <div>
        <h1>I nostri Dottori</h1>
    </div>
</template>

<script>
export default {
    name: 'ProvaComponent',
    data(){
        return{
            doctors:[],

        }
    },
    // created(){
    //     axios.get('/api/doctors').then((el)=>{
    //         this.doctors= el.data;
    //     })
    // }
}
</script>
<style lang="scss">

</style>
