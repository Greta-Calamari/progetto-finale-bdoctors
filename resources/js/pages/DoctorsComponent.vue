<template>
    <div class="container">
        <div class="filter py-4">
            <div v-if="loadingSp" class="row justify-content-center py-3">
                <div class="lds-roller" >
                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                </div>
            </div>
            <div class="row" v-else>
                <div class="col-4">
                    <h4>Specializzazione</h4>
                        <select name="" id="" v-model="inputSpecialization" class="form-control">
                            <option value="">All</option>
                            <option :value="specialization.id" v-for="specialization in specializations" :key="specialization.id">{{specialization.name}}</option>
                        </select>
                </div>
                <div class="col-4">
                    <h4>Media voto</h4>
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
                </div>
                <div class="col-4">
                    <h4>Numero di recensioni</h4>
                    <div>
                        <input type="radio" id="0" name="fav_language" value="" v-model="inputRange">
                        <label for="0">
                            All
                        </label><br>
                        <input type="radio" id="5" name="fav_language" value="1" v-model="inputRange">
                        <label for="5">
                            Meno di 5 recensioni
                        </label><br>
                        <input type="radio" id="5" name="fav_language" value="5" v-model="inputRange">
                        <label for="5">
                            Tra 5 e 10 recensioni
                        </label><br>
                        <input type="radio" id="10" name="fav_language" value="10" v-model="inputRange">
                        <label for="10">
                            Più di 10 recensioni
                        </label><br>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" @click="search">Filtra</button>
                    <button class="btn btn-primary" @click="clearFilter">Elimina Filtri</button>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-12 col-lg-3">
                <div class="lds-roller" v-if="loadingSp">
                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                </div>
                <div v-else class="filter mb-5">
                    <h1>Filtri</h1>
                    <h3>Specializzazione</h3>
                    <select name="" id="" v-model="inputSpecialization" class="form-control">
                        <option value="">All</option>
                        <option :value="specialization.id" v-for="specialization in specializations" :key="specialization.id">{{specialization.name}}</option>
                    </select>
                    <div>
                        <h3>Media voto</h3>
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
                    
                    <div>
                        <h3>Numero di recensioni</h3>
                        <input type="radio" id="0" name="fav_language" value="" v-model="inputRange">
                        <label for="0">
                            All
                        </label><br>
                        <input type="radio" id="5" name="fav_language" value="1" v-model="inputRange">
                        <label for="5">
                            Meno di 5 recensioni
                        </label><br>
                        <input type="radio" id="5" name="fav_language" value="5" v-model="inputRange">
                        <label for="5">
                            Tra 5 e 10 recensioni
                        </label><br>
                        <input type="radio" id="10" name="fav_language" value="10" v-model="inputRange">
                        <label for="10">
                            Più di 10 recensioni
                        </label><br>
                    </div>
                    <select name="" id="" v-model="inputRange" class="form-control">
                        <option value="">All</option>
                        <option value="1">Meno di 5</option>
                        <option value="5">Comprese fra 5 e 10</option>
                        <option value="10">Più di 10</option>
                    </select>
                        
                    <button class="btn btn-primary" @click="search">Filtra</button>
                    <button class="btn btn-primary" @click="clearFilter">Elimina Filtri</button>
                </div>
            </div> -->
            <div class="col-12">
                <div class="lds-roller" v-if="loading">
                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                </div>
                <div v-else class="cards">
                    <div class="row" v-if="doctors.length > 0">
                        <div class="col-12 col-lg-4" v-for="(doctor) in doctors" :key="doctor.id">
                            <div class="card">
                                <div class="row">
                                    <div class="col-5">
                                        <router-link :to="{ name:'doctor', params:{slug:doctor.slug} }">
                                            <div class="img-box">
                                                <img :src="`/storage/${doctor.image}`" class="w-100" :alt="doctor.name"  v-if=" doctor.image">
                                                <img src='https://static.vecteezy.com/system/resources/thumbnails/003/528/202/small/stethoscope-icon-medicine-medical-health-doctor-care-hospital-aid-isolated-symbol-for-web-and-mobile-app-free-free-vector.jpg' v-else>
                                            </div>
                                        </router-link>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <h5 class="card-title">{{doctor.name}} {{doctor.surname}}</h5>
                                            
                                            <!-- <p class="card-text mb-0" v-for="spec in doctor.specializations" :key="spec.id">{{spec.name}}</p>  -->
                                            <p class="card-text"><i class="fa-solid fa-map-location-dot"></i> {{doctor.address}}</p>
                                            <p class="card-text"><i class="fa-solid fa-phone"></i> {{doctor.cell_number}}</p>
                                                       
                                            <!-- <router-link  class="btn btn-outline-primary rounded-0" :to="{ name:'doctor', params:{id: doctor.id} }">Visualizza</router-link> -->

                                            <!-- <a href="" class="btn btn-outline-primary rounded-0">Visualizza Dottore</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="card-text mb-0" v-for="spec in doctor.specializations" :key="spec.id">{{spec.name}}</p> 
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
            loadingSp: false,
        }
    },
    methods:{
        search(){
            console.log(this.inputSpecialization)
            console.log(this.inputAverage)
            console.log(this.inputRange)
            if(!this.inputAverage && !this.inputRange){
                this.loading = true;
                axios.get(`/api/doctors?specialization=${this.inputSpecialization}`).then((response) =>{
                    console.log(response)
                    const data = response.data
                    const sponsored  = [];
                    const nonSponsored = [];
                    data.forEach(resp => {
                        if(resp.active_sponsor.length!=0){
                            sponsored.push(resp);
                        } else {
                            nonSponsored.push(resp);
                        }
                    });
                    this.doctors = [...sponsored,...nonSponsored];
                    this.loading = false;
                })
            }else{
                this.loading = true;
                axios.get(`/api/filter?specialization=${this.inputSpecialization}&average=${this.inputAverage}&rangeMin=${this.inputRange}`).then((response)=>{
                    const data = response.data
                    const sponsored  = [];
                    const nonSponsored = [];
                    data.forEach(resp => {
                        if(resp.active_sponsor.length!=0){
                            sponsored.push(resp);
                        } else {
                            nonSponsored.push(resp);
                        }
                    });
                    this.doctors = [...sponsored,...nonSponsored];
                    this.loading = false;
                })
            }
        },
        clearFilter(){
            this.inputSpecialization = '';
            this.inputAverage = '';
            this.inputRange = '';
            axios.get('/api/doctors').then((response) =>{
                const data = response.data
                const sponsored  = [];
                const nonSponsored = [];
                data.forEach(resp => {
                    if(resp.active_sponsor.length!=0){
                        sponsored.push(resp);
                    } else {
                        nonSponsored.push(resp);
                    }
                });
                this.doctors = [...sponsored,...nonSponsored];
                this.loading = false;
            })
        },
        averageVote(){
            //let reviewCounter = 0
            //console.log(arr)
            arr.forEach(element => {
                //reviewCounter++;
                //console.log(element.votes)
                let sum = 0;
                sum += element.votes;
                return Math.floor(sum/arr.length)
                console.log(average);
            });
        }
    },
    created(){
        this.inputSpecialization = this.$route.params.id;
        this.loading = true;
        this.loadingSp = true;

        if(this.inputSpecialization === undefined){
            axios.get('/api/doctors').then((response) =>{
                const data = response.data
                const sponsored  = [];
                const nonSponsored = [];
                data.forEach(resp => {
                    if(resp.active_sponsor.length!=0){
                        sponsored.push(resp);
                    } else {
                        nonSponsored.push(resp);
                    }
                });
                this.doctors = [...sponsored,...nonSponsored];
                this.inputSpecialization = ''
                this.loading = false;
            })
        }else{
            axios.get(`/api/doctors?specialization=${this.inputSpecialization}`).then((response) =>{
                const data = response.data
                const sponsored  = [];
                const nonSponsored = [];
                data.forEach(resp => {
                    if(resp.active_sponsor.length!=0){
                        sponsored.push(resp);
                    } else {
                        nonSponsored.push(resp);
                    }
                });
                this.doctors = [...sponsored,...nonSponsored];
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

<style lang="scss" scoped>
.filter, h3{
    background-color: rgb(231 237 247);;
    position: fixed;
    left: 0;
    right: 0;
    z-index: 2;
    padding: 1.5rem;
    h4{
        color: #5f4bb6;
    }
    .fa-star{
        color: #5f4bb6;
    }
}
.cards{
    margin-top: 300px;
}
.card{
    background-color: rgba(#86a5d9, 0.2);
    margin-bottom: 40px;
    margin-top: 90px;
    height: 250px;
    .img-box{
    position: relative;
    bottom:50px;
    &:hover img{
        -webkit-transform: scale3d(1.2, 1.2, 1);
        transform: scale3d(1.2, 1.2, 1);
    }
    img{
        width: 100%;
        border: 1px solid #86a5d9;
        -webkit-transition: all 0.5s linear;
        transition: all 0.5s linear;
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
        border-radius: 50px;
    }
}
    .card-body{
        .card-text{
            color: #5f4bb6;
        }
    }
}
.btn-outline-primary{
    border-color: #5f4bb6 !important;
    color: #86a5d9;;
}
.btn-outline-primary:hover{
    background-color: #5f4bb6 !important;
}

.lds-roller {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
        &:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #86a5d9;
        margin: -4px 0 0 -4px;
        }
        &:nth-child(1) {
        animation-delay: -0.036s;
        }
        &:nth-child(1):after {
        top: 63px;
        left: 63px;
        }
        &:nth-child(2) {
        animation-delay: -0.072s;
        }
        &:nth-child(2):after {
        top: 68px;
        left: 56px;
        }
        &:nth-child(3) {
        animation-delay: -0.108s;
        }
        &:nth-child(3):after {
        top: 71px;
        left: 48px;
        }
        &:nth-child(4) {
        animation-delay: -0.144s;
        }
        &:nth-child(4):after {
        top: 72px;
        left: 40px;
        }
        &:nth-child(5) {
        animation-delay: -0.18s;
        }
        &:nth-child(5):after {
        top: 71px;
        left: 32px;
        }
        &:nth-child(6) {
        animation-delay: -0.216s;
        }
        &:nth-child(6):after {
        top: 68px;
        left: 24px;
        }
        &:nth-child(7) {
        animation-delay: -0.252s;
        }
        &:nth-child(7):after {
        top: 63px;
        left: 17px;
        }
        &:nth-child(8) {
        animation-delay: -0.288s;
        }
        &:nth-child(8):after {
        top: 56px;
        left: 12px;
        }
    }
}

@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@media screen and (max-width: 768px){
    .img-box img{
        width: 250px;
    }
}





</style>
