<template>
    <section>
        <div v-if="doctor">
            <!-- dottore  -->
            <h3>Nome dottore: {{doctor.name}}</h3>
            <h3>Cognome:{{doctor.surname}}</h3>
            <hr>
            <!-- commenti  -->
            <!-- aggiungi commenti  -->
            <div>
                <form @submit.prevent="addComment()">
                    <label for="username">Inserisci il nome</label>
                    <input v-model="formData.name" type="text" />
                    <label for="content">Inserisci il contenuto</label>
                    <input v-model="formData.comment" type="text" />
                    <label for="votes" class="form-label">Votes</label>
                    <input type="number" v-model="formData.votes"    name="votes" min="1" max="5">
                    <button type="submit">Invia</button>
                </form>
            </div>
          <!-- mostra commenti  -->
            <div v-if="doctor.reviews.length > 0">
                <h3>Commenti:</h3>
                <div v-for="mes in doctor.reviews" :key="mes.id">
                    <h5>{{ mes.comment }}</h5>
                </div>
            </div>
        </div>
        <!-- invia messaggio al dottore  -->
        <div>
            <h1>Invia messaggio al dottore </h1>
            <form @submit.prevent="sendMes()">
                <label for="username">Inserisci il nome</label>
                    <input v-model="formMes.name" type="text" />
                    <label for="content">Inserisci il contenuto</label>
                    <input v-model="formMes.content" type="text" />
                    <label for="email">Inserisci la tua email</label>
                    <input v-model="formMes.email" type="text" />
                    <button type="submit">Invia</button>
            </form>

        </div>
  </section>
</template>
<script>
export default {
    name: 'DoctorComponent',
    data () {
        return {
            doctor: null,
            formData: {
                name: "",
                comment: "",
                votes:"",
                doctor_id: "",
            },
            formMes: {
                content: "",
                email:"",
                name: "",
                doctor_id: "",
            },
        }
    },
    methods: {
        addComment() {
            axios
            .post("/api/reviews", this.formData)
                .then((response) => {
                    console.log(response)
                this.formData.name = "",
                this.formData.comment = "",
                this.formData.votes = "",
                this.doctor.reviews.push(response.data);
                })
                .catch((error) => {
                 console.log(error);
            });
        },
        sendMes() {
            axios
            .post("/api/messages", this.formMes)
                .then((response) => {
                this.formMes.name = "",
                this.formMes.content = "",
                this.formMes.email = "",
                this.doctor.messages.push(response.data);
                })
                .catch((error) => {
                 console.log(error);
            });
        },
    },

     mounted () {
        // console.log(this.$route.params)
        const id = this.$route.params.id
        axios.get(`/api/doctors/${id}`).then((res)=>{
            this.doctor = res.data;
            this.formData.doctor_id = this.doctor.id
            this.formMes.doctor_id = this.doctor.id
        }).catch((error) => {
        this.$router.push({ name: "page-404" });
      });

    }


}
</script>
<style lang="scss">

</style>
