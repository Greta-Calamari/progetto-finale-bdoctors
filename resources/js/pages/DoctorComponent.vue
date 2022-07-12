<template>
    <section>
        <div v-if="doctor">
            <h3>Nome dottore: {{doctor.name}}</h3>
            <h3>Cognome:{{doctor.surname}}</h3>
            <hr>
            <h2>Commenti</h2>
            <div v-for="message in doctor.messages" :key="message">
                <p>Nome: {{message.name}}</p>
                <p>{{message.content}}</p>

            </div>
        </div>

  </section>
</template>

<script>
export default {
    name: 'DoctorComponent',
    data () {
        return {
            doctor: null

        }
    },

     mounted () {
        console.log(this.$route.params)
        const id = this.$route.params.id
        axios.get(`/api/doctors/${id}`).then((res)=>{
            this.doctor = res.data;
        })

    }


}
</script>
<style lang="scss">

</style>
