<template>
<div>
    <div v-for="doctor in doctors" :key="doctor.id">
        <h1>{{doctor.name}}</h1>

    </div>
</div>

</template>

<script>
export default {
    name: 'HelloComponent',
    data(){
        return{
            doctors:[],

        }
    },

}
</script>
<style lang="scss">

</style>
