<template>
    <section class="container-fluid">
        <div v-if="doctor" class="container-main row justify-content-center align-content-center">
            <!-- doctor -->
            <div class=" col-lg-3 col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                <img :src="doctor.photo" alt="img">
                <!-- specializations  -->
                <div class="specializations d-flex flex-column justify-content-center align-content-center">
                    <ul>
                        <h4>Le mie specializzazione</h4>
                        <hr>
                        <li v-for="specia in doctor.specializations" :key="specia">
                            <a href="#">{{specia.name}}</a>
                        </li>
                </ul>
                <hr>
            </div>
            </div>
            <!-- info  -->
            <div class=" info-doctor col-lg-9 col-md-9 col-sm-12 d-flex flex-column ">
                <h1><i class="fa-solid fa-user-doctor"></i> {{doctor.name}} {{doctor.surname}}
                <a href="#" class="logo"><img src="/images/logo.png" alt="logo"></a>
                </h1>
                <hr>
                <h3><i class="fa-solid fa-stethoscope"></i>Servizio:</h3>
                <h4>{{doctor.services}}</h4>
                <hr>
                <h3><i class="fa-solid fa-map-location"></i>Indirizzo:</h3>
                <h4>{{doctor.address}}</h4>
                <hr>
                <h3><i class="fa-solid fa-phone"></i>Telefono:</h3>
                <h4> {{doctor.cell_number}}</h4>
            </div>
            
        </div>
        
        <!-- commenti  -->
        <div class="comment-container row " v-if="doctor.reviews.length > 0">
            <div  class="p-0 col-lg-8 col-md-8 col-sm-12">
                <h3>Commenti:</h3>
                <div class="comment-doctor" v-for="mes in doctor.reviews" :key="mes.id">
                    <p>{{ mes.comment }}</p>
                </div>
                <!-- invia un messaggio  -->
                <div>
                    <h3>Invia un messaggio al dottore</h3>
                    <form @submit.prevent="sendMes()">
                        <!-- nome messaggio  -->
                        <div>
                            <label for="username">Inserisci il nome</label>
                            <br>
                            <input v-model="formMes.name" type="text" minlength="1" maxlength="100" required/>
                        </div>
                        <!-- contenuto messaggio -->
                        <div>
                            <label for="content">Inserisci il contenuto</label>
                            <br>
                            <input v-model="formMes.content" type="text"  maxlength="255" required/>
                        </div>
                        <!-- email messaggio  -->
                        <div>
                            <label for="email">Inserisci la tua email</label>
                            <br>
                            <input type="email" v-model="formMes.email" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" >Invia</button>
                    </form>
                </div>
            </div> 

            <!-- aggiundi commento  -->
            <div class=" add-comment p-0 col-lg-4 col-md-4 col-sm-12">
                <form @submit.prevent="addComment()">
                    <h2>Lascia una recensione</h2>
                    <!-- name  -->
                    <div class="name-comment">
                        <label for="name">Inserisci il tuo nome</label>
                        <br>
                        <input v-model="formData.name" type="text"  minlength="1" maxlength="100" placeholder="Inserisci il tuo nome" required/>
                    </div>
                    <!-- comment  -->
                    <div class="text-comment">
                        
                        <label for="comment">Inserisci il tuo commento</label>
                        <br>
                        <textarea  name="content" id="contentEditor" cols="30" rows="10" minlength="1" maxlength="255" placeholder="Inserisci il tuo commento" required>
                        </textarea>
                    </div>
                    <!-- votes  -->
                    <div class="votes">
                        <label for="votes" class="form-label">Inscerisci un voto da 1 a 5</label>
                        <input type="number" v-model="formData.votes"    name="votes" min="1" max="5" placeholder="voto" required>
                    </div>
                    <button type="submit" >Invia</button>
                </form> 
            </div>
        </div>
            
                
            
            
            <!-- dottore  -->
            <!-- <h3>Nome dottore: {{doctor.name}}</h3>
            <h3>Cognome:{{doctor.surname}}</h3>
            <hr> -->
            <!-- commenti  -->
            <!-- aggiungi commenti  -->
            <!-- <div>
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
                     va nel submit v-on:click="upNota" 
                </form> -->
            
          <!-- mostra commenti  -->
            <!-- <div v-if="doctor.reviews.length > 0">
                <h3>Commenti:</h3>
                <div v-for="mes in doctor.reviews" :key="mes.id">
                    <h5>{{ mes.comment }}</h5>
                </div>
            </div>
        </div> -->
        <!-- invia messaggio al dottore  -->
        <!-- <div>
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
                    <input v-model="formMes.content" type="text"  maxlength="255" required/>
                    <input type="email" placeholder="Enter your email" required>
                    <label for="email">Inserisci la tua email</label>
                    <input v-model="formMes.email" type="text" /> 
                    <button type="submit" >Invia</button>
                    va ne submit v-on:click="errorMes" 
            </form>

         </div>  -->
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
@import '../../sass/variables';
section{
     background: linear-gradient(0deg, hsla(251, 42%, 50%, 1) 40%, hsla(231, 51%, 60%, 1) 100%);

    background: -moz-linear-gradient(0deg, hsla(251, 42%, 50%, 1) 40%, hsla(231, 51%, 60%, 1) 100%);
    width: 100%;
    min-height: 60vh;
    // doctor 
    .container-main{
        width: 90%;
        margin: 0 auto;
        padding: 10px;
        
        div{
            
            img{
            border-radius: 50px;
            border: 2px solid $general-violet;
            width: 200px;
            background-size: contain;
            } 
            .logo{
                img{
                    border: 0 !important;
                    width: 80px;
                    border-radius: 50px;
                }
            }
            // specializations
            .specializations{
                
                h4{
                }
                hr{
                   
                    border: 1px solid $general-violet;
                    width: 100%;

                }
                ul{
                    li{
                        padding: 2px;
                        a{
                            color: white;
                            text-decoration: none;
                            &:hover{
                                color: $general-white;
                            }
                        }
                    }
                }
                hr{
                    width: 100%;
                    margin-top: 0 !important;
                    border: 1px solid $general-violet;
                }
            }
        }
        .info-doctor{
            padding: 30px;
            i{
                
                padding: 5px;
            }
        }
        
        
    }
    
    // comment
    .comment-container {
        
        div{
            width: 100%;
            h3{
                margin-left: 5%;
            }
            .comment-doctor{
            width: 90%;
            min-height: 40px;
            margin: 10px auto;

            border: 2px solid $general-black;
            }
        }
        .add-comment{
            margin-top: 40px !important;
            width: 80%;
            margin: 0 auto;
            position: sticky;
            top: 0;
            height: 200px;
            form{
                .name-comment{
                    input{
                        margin-left: 10px;
                        width: 90%;
                    }
                }
                .text-comment{
                    textarea{
                        margin-left: 10px;
                        width: 90%;
                        
                    }
                }
                .votes{
                    margin-top: 5px;
                    input{
                        margin-left: 10px;
                        width: 50px;
                    }
                }
            }
        }
    }
    hr{
        background-color: $general-violet;
        height: 1px;
    }
    
}
</style>
