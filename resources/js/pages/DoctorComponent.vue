<template>
    <section  class="container-fluid">
        <div  v-if="doctor" class="container-main row justify-content-center align-content-center">
            <!-- logo  per inviare messaggio-->
            <div @click="logo = !logo" class="fix-logo">
                <i class="fa-solid fa-message"></i>
            </div>
            <!-- container per l'animazione  -->
            <div  class="animation-border"></div>
            <!-- container con il form per inviare un messaggio  -->
            <div v-if="logo" class="ghost-fix-container d-flex flex-column">
                <div class="messaggio-container">
                    <div>
                        <i @click="logo = false" class="fa-solid fa-circle-xmark close-chat float-right"></i>
                        <h3>Invia un messaggio al dottore</h3>
                        <!-- form per inviare il messaggio  -->
                        <form @submit.prevent="sendMes()">
                            <!-- nome utente per il form  messaggio  -->
                            <div class="username-container">
                                <label for="username"> Inserisci il tuo nome</label>
                                <br>
                                <input v-model="formMes.name" type="text" placeholder="Nome" minlength="1" maxlength="100" required/>
                            </div>
                            <!-- contenuto per il form messaggio -->
                            <div class="content-container">
                                <label for="content"> Inserisci il tuo messaggio</label>
                                <br>
                                <textarea v-model="formMes.content" type="text" placeholder="Messaggio" maxlength="255" required></textarea>
                            </div>
                            <!-- email per il form messaggio  -->
                            <div class="email-container">
                                <label for="email"> Inserisci la tua email</label>
                                <br>
                                <input type="email" v-model="formMes.email" placeholder="Email" required>
                            </div>
                            <button type="submit" @click="showComment()">Invia</button>
                            <h4 class="invio-messaggio" v-if="conferma" >Il tuo messaggio è stato inviato! </h4>
                        </form>
                    </div>
                </div> 
            </div>
            <!-- curriculum container  -->
            <div v-if="seen" class="curriculum d-flex justify-content-center align-items-center">
                <embed class="mt-5" type="text/html" :src="`/storage/${doctor.curriculum_vitae}`"  width="800px" height="900px">
                <div v-on:click="seen = !seen" class="close">
                    <h3>Chiudi <i class="fa-solid fa-xmark"></i></h3>
                </div>
            </div>
            <!-- foto del dottore e specializzazione -->
            <div @click="logo = false" class="dottore-img col-lg-4 col-md-5 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                <!-- foto del dottore -->
                <div class="div-img">
                    <!-- <img :src="`/storage/${doctor.photo}`" alt="img"> -->
                    <img v-if="doctor.photo" :src="`/storage/${doctor.photo}`" :alt="doctor.name" />
                    <img v-else src="http://mascitelliandpartners.com/map/wp-content/uploads/2015/03/placeholder_user.png" :alt="doctor.name" />
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
            <!-- info del dottore name/services/address/phone/curriculum  -->
            <div @click="logo = false" class=" info-doctor col-lg-8 col-md-7 col-sm-12 d-flex flex-column ">
                <h1><i class="fa-solid fa-user-doctor"></i> {{doctor.name}} {{doctor.surname}}
                    <star-rating v-model="average"
                        inactive-color="#5f4bb6"
                        :read-only="true" 
                        :increment="0.01"
                        :show-rating="false"
                        v-bind:star-size="20"
                    ></star-rating>
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
                <!-- icona che apre il div del curriculum  -->
                <hr>
                <div class="curriculum-container">
                    <div  v-if="doctor.curriculum_vitae == null">
                    </div>
                    <div class="i-curriculum" v-else>
                        <h4  v-on:click="seen = !seen"><i  class="fa-regular fa-file-pdf"></i> Curriculum </h4>
                    </div>
                </div>
            </div>
            <!-- button che apre il form invia un messaggio  -->
            <div class=" col-lg-4 col-md-5 col-sm-12 d-flex "></div>
            <div  class="button-messaggio-div col-lg-8 col-md-7 col-sm-12 d-flex">
                <button class="button-messaggio"  @click="logo = true" > Scrivi un messaggio al dottore</button>
            </div>
        </div>
        
        <!--container dei commenti  -->
        <div @click="logo = false" class="comment-container row " v-if="doctor.reviews.length >= 0">
            <!-- commenti del dottore  -->
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
            <!-- form per aggiungere un commento  -->
            <div  class=" add-comment p-0 col-12">
                <form @submit.prevent="addComment()">
                    <h2>Lascia una recensione</h2>
                    <!-- input name  commento-->
                    <div class="name-comment">
                        <label for="name">Inserisci il tuo nome</label>
                        <br>
                        <input v-model="formData.name" type="text"  minlength="1" maxlength="100" placeholder="Nome" required/>
                    </div>
                    <!-- input comment commento-->
                    <div class="text-comment">
                        
                        <label for="comment">Inserisci il tuo commento</label>
                        <br>
                        <textarea  name="content" id="contentEditor" cols="30" rows="10" minlength="1" maxlength="255" placeholder="Commento" v-model="formData.comment" required>
                        </textarea>
                    </div>
                    <!-- input votes  commento-->
                    <div class="votes-comment">
                        <label for="votes" class="form-label">Seleziona un voto da 1 a 5</label>
                        <star-rating class="star" type="number" name="votes" v-model="formData.votes" 
                            v-bind:increment="1"
                            v-bind:max-rating="5"
                            inactive-color="#5f4bb6"
                            active-color="gold"
                            :show-rating="false"
                            v-bind:star-size="20">
                        </star-rating> 
                        <input type="number" v-model="formData.votes"    name="votes" min="1" max="5" placeholder="voto" required>
                    </div>
                    <button type="submit" >Invia</button>
                </form>
                <hr>
            </div> 
        </div>
    </section>
</template>

<script>
import StarRating from 'vue-star-rating';
import moment from 'moment';
export default {
    components: {
    StarRating,
    moment,
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
            seen: !true,
            logo: false,
        }
    },
    methods: {

        
        getFormattedDate(date) {
            return moment(date).format("DD-MM-YYYY")
        },
        // average 
        getAverage() {
            let sum = 0;
            for (let i = 0; i < this.doctor.reviews.length; i++) {
                sum += this.doctor.reviews[i].votes;
            }
            return sum / this.doctor.reviews.length;
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
        // function show div confirm send messages
        showComment() {
            if(this.formMes.email.length > 0){
                return this.conferma = !this.conferma;
            } 
        },
        
    },
    computed: {
        // average 
        average() {
            return this.getAverage();
        },
    },

    mounted () {
        const slug = this.$route.params.slug
        axios.get(`/api/doctors/${slug}`).then((res)=>{
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
}
</script>
<style lang="scss" scoped>
@import '../../sass/variables'; 
section{
    background: #D9E3F3;
    width: 100%;
    height: 100%;
    .container-main{
        width: 90%;
        margin: 0 auto;
        padding: 10px;
        .fix-logo{
            position: fixed;
            right: 10px;
            bottom: 10%;
            height: 60px;
            width: 60px;
            border-radius:50%;
            z-index: 11;
            cursor: pointer;
            padding: 3px;
            
            i{
                transform: translate(40%, 40%);
                font-size: 2rem;   
                color: $general-violet;
            }
        }
        .animation-border{
            position: fixed;
            border-radius:50%;
            right: 10px;
            bottom: 10%;
            border-left: 3px solid $general-light-blue;
            border-right: 3px solid $general-violet;
            height: 60px;
            width: 60px;
            animation: logoFix 5s infinite;
            position: relative; 
            cursor: pointer;
            z-index: 10;
        }
        .ghost-fix-container{
            position: fixed;
            right: 80px;
            bottom: 10%; 
            z-index: 10000;
            padding: 10px;
            background-color: $general-light-blue;
            border-radius: 10px;
            a button{
                
                min-width: 150px;
                margin: 5px;
                padding: 2px;
            }
            .messaggio-container{
                .close-chat{
                    color: $general-violet;
                    font-size: 2rem;
                    cursor: pointer;
                }
                input{
                    border: 0px solid;
                }
                textarea{
                    border: 0px solid;
                }
            }
        }
        .curriculum{
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.888);
            .close{
                position: absolute;
                top: 20vh;
                right: 30px;
                z-index: 1000;
                font-size: 2rem;
                color: blue;
                cursor: pointer;
                &:hover{
                    color: $general-light-blue;
                } 
            }
            
        }
        .dottore-img{
                .div-img{
                    width: 300px;
                    height: 300px;
                    overflow: hidden;
                    border: 2px solid $general-violet;
                    border-radius: 50px;
                    margin-bottom:20px;
                    img{
                    width:100%;
                    object-fit: cover;
                    } 
                }
            }
            .specializations{
                hr{
                    border: 1px solid $general-violet;
                    width: 100%;
                }
                ul{
                    li{
                        padding: 2px;
                        a{
                            color: $general-light-blue;
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
        .info-doctor{
            padding: 30px;
            i{
                padding: 5px;
            }
            .curriculum-container{
                cursor: pointer;
                width: 180px;
                h4{
                    cursor: pointer;
                    color: $general-light-blue;
                    &:hover{
                        color: $general-violet;
                    }
                }
                .i-curriculum{
                    
                }
            }
        }
        .button-messaggio-div{
            padding-left: 30px;
            .button-messaggio{
            cursor: pointer;
            background-color: $general-violet;
            color: white;
            padding: 5px;
            border-radius: 5px;
            font-size: 1rem;
            width: 250px;
            &:hover{
                background-color: $general-violet !important;
            }
        }
        }
    }
    .comment-container{
        width: 90%;
        margin: 0 auto;
        z-index: -10;
        .container-commenti{
            width: 100%;
            margin-bottom: 30px ;
            padding:0 ;
            .add-comment{
            z-index: 0;
            }
        }
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
                .invio-messaggio{
                    font-size: 1rem;
                }
            }
            button{
                width: 80px;
                margin-top: 20px;
            }
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
            background-color: #6c55d3;
            color: black;
        }
    }
    // input form 
    input, select, textarea{
    color: $general-violet;
    }

    textarea:focus, input:focus {
    color: $general-violet;
    }
    ::placeholder {     
    color: #D9E3F3;
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
    @keyframes logoFix {
    
  
        0% { position: fixed;
            right: 10px;
            bottom: 10%;transform: rotate(0) }
      
        100% { position: fixed;
            right: 10px;
            bottom: 10%; transform: rotate(360deg) }
      
    


}
</style>
