<template>
    <section class="container-fluid">
        <div v-if="doctor" class="container-main row justify-content-center align-content-center">
            <!-- doctor -->
            <div class=" col-lg-4 col-md-5 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                <div class="div-img">
                <img :src="doctor.photo" alt="img">
                </div>
                <!-- specializations  -->
                <div class="specializations d-flex flex-column justify-content-center align-content-center">
                    <ul>
                        <h4>Le mie specializzazione</h4>
                        <hr>
                        <li v-for="specialization in doctor.specializations" :key="specialization.id">
                            <router-link class="router-link" :to="{name: 'doctors', params: {id: specialization.id} }" >{{specialization.name}}</router-link>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <!-- info  -->
            <div class=" info-doctor col-lg-8 col-md-7 col-sm-12 d-flex flex-column ">
                <h1><i class="fa-solid fa-user-doctor"></i> {{doctor.name}} {{doctor.surname}}
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
                <!-- <h3><i class="fa-solid fa-download"></i> Curriculum:</h3>
                <a href="#">{{doctor.curriculum_vitae}}</a> -->
                
            </div>
            
        </div>
        
        <!-- commenti  -->
        <div class="comment-container row " v-if="doctor.reviews.length >= 0">
            <!-- mostra commenti  -->
            <div class="container-commenti ">
                <h3>Commenti:</h3>
                <div class="container-commenti-info d-flex flex-column" v-for="mes in doctor.reviews" :key="mes.id">
                    <div class="col-12 p-0 utente">
                        <h4><i class="fa-solid fa-user"></i> {{mes.name}}</h4>
                    </div>
                    <div class="col-12 p-0 voto">
                        <star-rating v-model="mes.votes"
                            inactive-color="#5f4bb6"
                            :show-rating="false"
                            :read-only="true"
                            v-bind:star-size="15"
                        ></star-rating>
                    </div>
                    <div class="col-12 p-0 data">
                        <h6>{{getFormattedDate(mes.created_at)}}</h6>
                    </div>
                    <div class="col-12 p-0">
                        <p>{{ mes.comment }}</p>
                        <hr>
                    </div>
                </div>
            </div>
            <!-- aggiundi commento  -->
            <div  class=" add-comment p-0 col-12">
                
                <form @submit.prevent="addComment()">
                    <h2>Lascia una recensione</h2>
                    <!-- input name  -->
                    <div class="name-comment">
                        <label for="name">Inserisci il tuo nome</label>
                        <br>
                        <input v-model="formData.name" type="text"  minlength="1" maxlength="100" placeholder="Nome" required/>
                    </div>
                    <!-- input comment -->
                    <div class="text-comment">
                        
                        <label for="comment">Inserisci il tuo commento</label>
                        <br>
                        <textarea  name="content" id="contentEditor" cols="30" rows="10" minlength="1" maxlength="255" placeholder="Commento" v-model="formData.comment" required>
                        </textarea>
                    </div>
                    <!-- input votes  -->
                    <div class="votes-comment">
                        <label for="votes" class="form-label">Seleziona un voto da 1 a 5</label>
                        
                        <star-rating class="star" type="number" name="votes" v-model="formData.votes" 
                            v-bind:increment="1"
                            v-bind:max-rating="5"
                            inactive-color="#5f4bb6"
                            active-color="gold"
                            :show-rating="false"
                            v-bind:star-size="20"
                            >
                        </star-rating> 
                        <input type="number" v-model="formData.votes"    name="votes" min="1" max="5" placeholder="voto" required>
                        
                        
                    </div>
                    <button type="submit" >Invia</button>
                </form>
                <hr>
            </div> 
            <!-- invia un messaggio  -->
            <div class="messaggio-container">
                <button  @click="messaggio = !messaggio" >Scrivi un messaggio al dottore</button>
                <div v-if="messaggio">
                    <h3>Invia un messaggio al dottore</h3>
                    <form @submit.prevent="sendMes()">
                        <!-- nome messaggio  -->
                        <div class="username-container">
                            <label for="username">Inserisci il nome</label>
                            <br>
                            <input v-model="formMes.name" type="text" placeholder="Nome" minlength="1" maxlength="100" required/>
                        </div>
                        <!-- contenuto messaggio -->
                        <div class="content-container">
                            <label for="content">Inserisci il tuo messaggio</label>
                            <br>
                            <textarea v-model="formMes.content" type="text" placeholder="Messaggio" maxlength="255" required></textarea>
                        </div>
                        <!-- email messaggio  -->
                        <div class="email-container">
                            <label for="email">Inserisci la tua email</label>
                            <br>
                            <input type="email" v-model="formMes.email" placeholder="Email" required>
                        </div>
                        <button type="submit" @click="showComment()">Invia</button>
                        <h1 v-if="conferma" >Il tuo messaggio è stato inviato! </h1>
                    </form>
                </div>
            </div> 
                       
                    
            
        </div>
            
  </section>
</template>
<script>
import StarRating from 'vue-star-rating';

import moment from 'moment';
export default {
    components: {
    StarRating
    },
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
            comment: false,
            messaggio: false,
            specializations: [],
            conferma: false,
            
        }
    },
    methods: {
        
        getFormattedDate(date) {
            return moment(date).format("DD-MM-YYYY")
        },
    
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
        // function show div 
        showComment() {
            if(this.formMes.email.length > 0){
                return this.conferma = !this.conferma;
            }
            
        },
        
    },

    mounted () {
        const id = this.$route.params.id
        axios.get(`/api/doctors/${id}`).then((res)=>{
            this.doctor = res.data;
            this.formData.doctor_id = this.doctor.id
            this.formMes.doctor_id = this.doctor.id
        }).catch((error) => {
        this.$router.push({ name: "page-404" });
        });
        axios.get('/api/specializations').then((response)=>{ 
        this.specializations = response.data;
      })
    },
    created(){
        
    }
    



}
</script>
<style lang="scss" scoped>
@import '../../sass/variables'; 
section{
    background: white;
    width: 100%;
    height: 100%;
    // doctor 
    .container-main{
        width: 90%;
        margin: 0 auto;
        padding: 10px;
        
        div{
            .div-img{
            width: 300px;
            height: 300px;
            overflow: hidden;
            border: 2px solid $general-violet;
            border-radius: 50px;
            margin-bottom:20px;
                img{
                width: 100%;
                background-size: contain;
                } 
            }
            
            // specializations
            .specializations{
                hr{
                    border: 1px solid $general-violet;
                    width: 100%;
                }
                ul{
                    li{
                        padding: 2px;
                        a{
                            color: $general-violet;
                            text-decoration: none;
                            &:hover{
                                color: $general-light-blue;
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
    // servizi-curriculum 
    .container-servizi-curriculum{
        width: 80%;
        margin: 0 auto;
    }
    
    // comment
    .comment-container {
        width: 90%;
        margin: 0 auto;
        .container-commenti {
            width: 100%;
            margin-bottom: 30px ;
            padding:0 ;
            
        }
        .add-comment{
            form{
                .name-comment{
                    input{
                        width: 100%;
                        border: 2px solid $general-violet;
                    }
                }
                .text-comment{
                    textarea{
                        width: 100%;
                        height: 100px;
                        border: 2px solid $general-violet;
                    }
                }
                .votes-comment{
                    margin-top: 5px;
                    position: relative;
                    .star{
                    margin-bottom: 5px;
                    }
                    input{
                        height: 1px;
                        width: 1px;
                        position: absolute;
                        left: 10px;
                        border: 0px solid;
                    }
                }
            }
        }   
    }
    .messaggio-container{
        width: 100%;
            margin-bottom: 20px ;
        div{
            width: 100%;
            .username-container{
                input{
                    width: 100%;
                    border: 2px solid $general-violet;
                }
            }
            
            .content-container{
                textarea{
                    width: 100%;
                    border: 2px solid $general-violet;
                }
            }
            .email-container{
                input{
                    width: 100%;
                    border: 2px solid $general-violet;
                }
            }
            button{
                width: 80px;
                margin-top: 20px;
            }
        }
    }
   
    button{
        
        border: 1px solid $general-violet;
        background-color: $general-violet;
        color: white;
        padding: 5px;
        margin-top: 10px;
        min-width: 60px;
        border-radius: 5px;
        &:hover{
            background-color: $general-light-blue;
            color: black;
        }
    }
    
    hr{
        background-color: $general-violet;
        height: 1px;
    }
    
    h5{
        font-size: 1rem;
    }
    h6{
        font-size: 0.8rem;
    }
}

</style>
