<template>
    <div>
        <div class="lds-roller" v-if="loading && loadingSp"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        <div v-else>
           <h1 class="text-center ">I nostri Dottori</h1>

        <!-- filtro per specializazioni -->
        <select name="" id="" v-model="inputSpecialization" >
            <option value="">All</option>
            <option :value="specialization.id" v-for="specialization in specializations" :key="specialization.id">{{specialization.name}}</option>
        </select>
        <!-- filtro per mediavoto -->
          <div>
            <input type="radio" id="val" name="fav_language" value="" v-model="inputAverage">
            <label for="val">
                All
            </label><br>
            <input type="radio" id="val_1" name="fav_language" value="1" v-model="inputAverage">
            <label for="val_1">
                <i class="fa-solid fa-star"></i>
            </label><br>
            <input type="radio" id="val_2" name="fav_language" value="2" v-model="inputAverage">
            <label for="val_2">
                <span v-for="index in 2" :key="index"><i class="fa-solid fa-star"></i></span>
            </label><br>
            <input type="radio" id="val_3" name="fav_language" value="3" v-model="inputAverage">
            <label for="val_3">
                <span v-for="index in 3" :key="index"><i class="fa-solid fa-star"></i></span>
            </label><br>
            <input type="radio" id="val_4" name="fav_language" value="4" v-model="inputAverage">
            <label for="val_4">
                <span v-for="index in 4" :key="index"><i class="fa-solid fa-star"></i></span>
            </label><br>
            <input type="radio" id="val_5" name="fav_language" value="5" v-model="inputAverage">
            <label for="val_5">
                <span v-for="index in 5" :key="index"><i class="fa-solid fa-star"></i></span>
            </label>
          </div>
        <!-- <select name="" id="" v-model="inputAverage" >
            <option value="">All</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> -->
        <!-- filtro numero recensioni -->
        <select name="" id="" v-model="inputRange" >
            <option value="">All</option>
            <option value="1">Meno di 5</option>
            <option value="5">Comprese fra 5 e 10</option>
            <option value="10">Più di 10</option>
        </select>
            
        <button class="btn btn-primary" @click="search">Filtra</button>
        <!-- dottori -->
        <div class="lds-roller" v-if="loading && loadingSp"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        <div v-else>
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
                <h3 class="text-center">I filtri inseriti non hanno prodotto risultati</h3>
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
            specializations:[],
            inputSpecialization: '',
            inputAverage:'',
            inputRange:'',
            specializationRoute: '',
            loading: false,
        }
    },
    methods:{
        search(){
            console.log(this.inputSpecialization)
            console.log(this.inputAverage)
            console.log(this.inputRange)
            if(!this.inputAverage && !this.inputRange){
                this.loading = true;
                console.log('solo speciali')
                axios.get(`/api/doctors?specialization=${this.inputSpecialization}`).then((response) =>{
                    console.log(response)
                    this.doctors = response.data
                    this.loading = false;

                })
            }else{
                console.log('piu dati')
                this.loading = true;
                axios.get(`/api/filter?specialization=${this.inputSpecialization}&average=${this.inputAverage}&rangeMin=${this.inputRange}`).then((response)=>{
                    console.log(response)
                    this.doctors = response.data
                    this.loading = false;
                })
            }
        }
    },
    created(){
        this.inputSpecialization = this.$route.params.id;
        this.loading = true;
        this.loadingSp = true;

        if(this.inputSpecialization === undefined){
            axios.get('/api/doctors').then((response) =>{
                console.log(response.data.results)
                this.doctors = response.data
                this.inputSpecialization = ''
                console.log(this.inputSpecialization)
                this.loading = false;
            })
        }else{
            axios.get(`/api/doctors?specialization=${this.inputSpecialization}`).then((response) =>{
                console.log(response)
                this.doctors = response.data
                console.log(this.inputSpecialization)
                this.loading = false;
            })
        }
        axios.get('/api/specializations').then((response)=>{ 
            this.specializations = response.data;
            this.loadingSp = false;

        })
    },
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
.lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #86a5d9;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
// .figure-:hover {
//      border: 1px solid #86a5d9;

// }





</style>
