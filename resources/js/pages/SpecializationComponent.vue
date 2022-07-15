<template>
    <section>
        <select name="" id="" v-model="inputTextReviews"  >
            <option value="">All</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <button class="btn btn-primary">Cerca</button>
      
        <div class="d-flex flex-wrap justify-content-center dist " v-if="specialization.doctors.length > 0">
            <div class="card mb-3 dist" style="max-width: 540px;" v-for="(doctor) in specialization.doctors" :key="doctor.id">
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
                            
                            <router-link class="btn btn-outline-primary rounded-0" :to="{name: 'doctor', params: {id: doctor.id} }" >Visualizza dottore</router-link>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <h3 class="text-center">Non ci sono dottori in questa specializzazione</h3>

        </div>
    </section>
</template>

<script>
export default {
    name: 'SpecializationComponent',
    data(){
        return{
            
            inputTextReviews: '',
            
            
        }
    },
    created()
    {
        axios.get
        
    },
        // console.log(this.$route.params)
        // const id = this.$route.params.id;
        // axios.get(`/api/specializations/${id}`).then((response) =>{
        //     this.specialization = response.data;
        //     console.log(this.specialization)
        // }).catch((error)=>{
        //     console.log(error)
        // })

        
      

    
}
</script>

<style>

</style>