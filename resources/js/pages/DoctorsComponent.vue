<template>
    <div>
        <h1 class="text-center ">I nostri Dottori</h1>

        <!-- filtro per specializazioni -->

        <!-- <select name="" id="" v-model="inputText" >
            <option value="">All</option>
            <option :value="specialization.id" v-for="specialization in specializations" :key="specialization.id">{{specialization.name}}</option>

        </select> -->
        
        <!-- filtro per recensioni -->


        <select name="" id="" v-model="inputTextReviews" >
            <option value="">All</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>


        <div class="input-group my-3 d-flex justify-content-end">
            <input type="text" class="form-control" placeholder="Cerca Dottore" v-model="input"  aria-label="Recipient's username" aria-describedby="button-addon2">
        </div>
            
        <button class="btn btn-primary" @click="search">Cerca</button>


            <div class="d-flex flex-wrap justify-content-center dist " v-if="doctors.length > 0">
                    <div class="card mb-3 dist" style="max-width: 540px;" v-for="(doctor) in doctors" :key="doctor.id">
                            <div class="row ">
                                <div class="col">
                                    <div class="figure-">
                                    <img :src="`/storage/${doctor.image}`" class="w-100" :alt="doctor.name"  v-if=" doctor.image">
                                    <img src='https://static.vecteezy.com/system/resources/thumbnails/003/528/202/small/stethoscope-icon-medicine-medical-health-doctor-care-hospital-aid-isolated-symbol-for-web-and-mobile-app-free-free-vector.jpg' v-else>

                                    </div>
                                
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title">{{doctor.name}}</h5>
                                        <p class="card-text">{{doctor.surname}}</p>
                                        <p class="card-text">{{doctor.average_vote}}</p>
                                        <!-- <div v-for="review in doctor.reviews" :key="review.id">
                                            <p class="card-text">{{review.votes}}</p>

                                        </div> -->


                                        <a href="#" class="btn btn-outline-primary rounded-0">Visualizza Dottore</a>
                                        
                                    </div>
                                </div>
                            </div>
                    </div>

            </div>
            <div v-else>
                <h3 class="text-center">Non ci sono dottori in questa specializzazione</h3>

            </div>
        
            


                    

    </div>

    
</template>

<script>
export default {
    name: 'ProvaComponent',
    data(){
        return{
            doctors:[],
            specializations:[],
            //votes:[],
            inputText:'',
            inputTextReviews:'',
            input:'',


        }
    },
    methods:{
        // getSpecialization(){
        //     axios.get('/api/doctors?specialization=' + this.inputText).then((response)=>{
        //     this.doctors= response.data;
        //     });
        // },
        getReviews(){
            axios.get('/api/doctors?average='+ this.inputTextReviews).then((response)=>{
            console.log(response)
            //avgDoc = Object.values(response.data)
            this.doctors = Object.values(response.data)
            console.log(this.doctors)
            console.log(this.doctors.length)
            });
        },
        search(){
            this.getReviews()
        }
    },
    created(){
        axios.get('/api/doctors').then((response)=>{
            this.doctors= response.data;
            console.log(response)
             console.log(this.doctors.length)
        });
        axios.get('/api/specializations').then((response)=>{
            this.specializations= response.data;
        });
    },
    // computed:{
    //     filteredDoctors(){
    //         return this.doctors.filter((doctor)=> doctor.name.toLowerCase().includes(this.input.toLowerCase()))
    //     },

    // }
  }
</script>
<style lang="scss">
.dist{
    margin-top: 40px;
    gap: 80px;
}

.btn-outline-primary{
    border-color: #5f4bb6 !important;
    color: #86a5d9;;
    
}
.btn-outline-primary:hover{
    background-color: #5f4bb6 !important;
    
}
.figure-{
    
    position: relative;
    bottom:50px;
    
    
}
.figure-:hover img{
    

  -webkit-transform: scale3d(1.2, 1.2, 1);
          transform: scale3d(1.2, 1.2, 1);
}
.figure- img{
    border: 1px solid #86a5d9;

  -webkit-transition: all 0.5s linear;
          transition: all 0.5s linear;
  -webkit-transform: scale3d(1, 1, 1);
          transform: scale3d(1, 1, 1);
}

// .figure-:hover {
//      border: 1px solid #86a5d9;

// }





</style>
