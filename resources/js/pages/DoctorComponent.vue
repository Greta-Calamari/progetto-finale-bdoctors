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
                        <li v-for="specia in doctor.specializations" :key="specia">
                            <a href="#">{{specia.name}}</a>
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
            </div>
            
        </div>
        <!-- servizi   e curriculum-->
        <div class="container-servizi-curriculum   row">
            <div class="col-lg-6 ">
                <h3><i class="fa-solid fa-download"></i> Curriculum:</h3>
                <a href="#">{{doctor.curriculum_vitae}}</a>
            </div>
            <div class="col-lg-6  ">
                <h3><i class="fa-solid fa-star"></i> Media voti:</h3>
                <h4> </h4>
            </div>

        </div>
        <!-- commenti  -->
        <div class="comment-container row " v-if="doctor.reviews.length >= 0">
            <!-- mostra commenti  -->
            <div class="container-commenti ">
                <h3>Commenti:</h3>
                <div class="container-commenti-info d-flex flex-column" v-for="mes in doctor.reviews" :key="mes.id">
                    <div class="col-12 p-0 utente">
                        <h5><i class="fa-solid fa-user"></i> {{mes.name}}</h5>
                    </div>
                    <div class="col-12 p-0 voto">
                        <h6><i class="fa-solid fa-star"></i> {{mes.votes}}</h6>
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
            <div class=" add-comment p-0 col-12">
                <form @submit.prevent="addComment()">
                    <h2>Lascia una recensione</h2>
                    <!-- input name  -->
                    <div class="name-comment">
                        <label for="name">Inserisci il tuo nome</label>
                        <br>
                        <input v-model="formData.name" type="text"  minlength="1" maxlength="100" placeholder="Inserisci il tuo nome" required/>
                    </div>
                    <!-- input comment -->
                    <div class="text-comment">
                        
                        <label for="comment">Inserisci il tuo commento</label>
                        <br>
                        <textarea  name="content" id="contentEditor" cols="30" rows="10" minlength="1" maxlength="255" placeholder="Inserisci il tuo commento" v-model="formData.comment" required>
                        </textarea>
                    </div>
                    <!-- input votes  -->
                    <div class="votes">
                        <label for="votes" class="form-label">Inscerisci un voto da 1 a 5</label>
                        <!-- <input type="number" v-model="formData.votes"    name="votes" min="1" max="5" placeholder="voto" required>   -->
                        <!-- <star-rating type="number" name="votes" v-model="formData.votes" required></star-rating> -->
                        <star-rating type="number" name="votes" v-model="formData.votes" required
                            v-bind:increment="1"
                            v-bind:max-rating="5"
                            inactive-color="grey"
                            active-color="gold"
                            :show-rating="false"
                            v-bind:star-size="20">
                        </star-rating> 
                    </div>
                    <button type="submit" >Invia</button>
                </form>
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
    },
    computed: {
        
    },


}
</script>
<style lang="scss">
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
                            color: $general-violet;
                            text-decoration: none;
                            &:hover{
                                color: $general-violet;
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
