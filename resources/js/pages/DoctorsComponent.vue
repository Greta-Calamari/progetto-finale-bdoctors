<template>
    <div>
        <h1 class="text-center ">I nostri Dottori</h1>

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
                                        <div v-for="review in doctor.reviews" :key="review.id">
                                            <p class="card-text">{{review.votes}}</p>

                                        </div>

                                        <a href="#" class="btn btn-outline-primary rounded-0">Visualizza Dottore</a>
                                        
                                    </div>
                                </div>
                            </div>
                    </div>

            </div>
        
            


                    

    </div>

    
</template>

<script>
export default {
    name: 'ProvaComponent',
    data(){
        return{
            doctors:[],
            categories:[],

        }
    },
    methods:{
        getDoctors(){
            a
        }

    },
    created(){
        axios.get('/api/doctors').then((response)=>{
            this.doctors= response.data;
        });
        
    }
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
