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
                <div v-if="errors.length">
                    <b>Si sono verificati degli errori:</b>
                    <ul>
                        <li v-for="error in errors" :key="error">{{ error }}</li>
                    </ul>
                </div>
                <form @submit.prevent="addComment()">
                    <label for="name">Inserisci il nome</label>
                    <input v-model="formData.name" type="text"  minlength="1" maxlength="100" required/>
                    <label for="comment">Inserisci il contenuto</label>
                    <input v-model="formData.comment" type="text" minlength="1" maxlength="255" required/>
                    <label for="votes" class="form-label">Votes</label>
                    <input type="number" v-model="formData.votes"    name="votes" min="1" max="5" required>
                    <button type="submit" >Invia</button>
                    <!-- va nel submit v-on:click="upNota" -->
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
            <div v-if="errorsMes.length">
                    <b>Si sono verificati degli errori:</b>
                    <ul>
                        <li v-for="errore in errorsMes" :key="errore">{{ errore }}</li>
                    </ul>
                </div>
            <h1>Invia messaggio al dottore </h1>
            <form @submit.prevent="sendMes()">
                <label for="username">Inserisci il nome</label>
                    <input v-model="formMes.name" type="text" minlength="1" maxlength="100" required/>
                    <label for="content">Inserisci il contenuto</label>
                    <input v-model="formMes.content" type="text" minlength="10" maxlength="255" required/>
                    <input type="email" placeholder="Enter your email" required>
                    <!-- <label for="email">Inserisci la tua email</label>
                    <input v-model="formMes.email" type="text" /> -->
                    <button type="submit" >Invia</button>
                    <!-- va ne submit v-on:click="errorMes" -->
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
            errors: [],
            errorsMes: [],
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
        upNota: function (event) {
                if (this.formData.name && this.formData.comment && this.formData.votes) {
                    this.errors = [];
                }

                this.errors = [];
                if (!this.formData.name) {
                    this.errors.push('Nome obbligatorio');
                }
                if (this.formData.name.length > 50) {
                    this.errors.push('Nome troppo lungo');
                }
                if (!this.formData.comment) {
                    this.errors.push('Commento obbligatorio');
                }
                // if (this.formData.comment.length > 255) {
                //     this.errors.push('Commento troppo lungo');
                // }
                if (!this.formData.votes) {
                    this.errors.push('Voto obbligatorio');
                }
            },
            errorMes: function (event) {
                if (this.formMes.name && this.formMes.content && this.formMes.email) {
                    this.errorsMes = [];
                }

                this.errorsMes = [];
                if (!this.formMes.name) {
                    this.errorsMes.push('nome obbligatorio');
                }
                if (this.formMes.name.length > 50) {
                    this.errorsMes.push('nome troppo lungo');
                }


                if (!this.formMes.content) {
                    this.errorsMes.push('Messagio obbligatorio');
                }
                // if (this.formData.content.length > 255) {
                //     this.errors.push('Messagio troppo lungo');
                // }
                if (!this.formMes.email) {
                    this.errorsMes.push('Email obbligatoria');
                }
                // if (this.formMes.email.filter('@') === false ) {
                //     this.errorsMes.push('@');
                // }

                console.log(this.errorsMes)
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
