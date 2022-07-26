<template>
    <div class="container">
        <div class="filter" :class="responsiveUp ? 'scale-up-ver-top' : '' " >
            <div class="row">
                <div class="col-12">
                    <h4 @click="responsive()" class="text-center title">Inserisci filtri
                        <i :class="responsiveUp ? 'rotate' : 'rotate-back'" class="fa-solid fa-angle-down"></i>
                    </h4>
                </div>
                <div class="col-12 col-md-4" v-if="!loadingSp" >
                    <h4>Specializzazione</h4>
                        <select name="" id="" v-model="inputSpecialization" class="form-control">
                            <option value="">All</option>
                            <option :value="specialization.id" v-for="specialization in specializations" :key="specialization.id">{{specialization.name}}</option>
                        </select>
                </div>
                <div class="col-12 col-md-4">
                    <h4>Media voto</h4>
                    <div>
                        <input type="radio" id="val" name="average" value="" v-model="inputAverage">
                        <label for="val">
                            All
                        </label><br>
                        <input type="radio" id="val_1" name="average" value="1" v-model="inputAverage">
                        <label for="val_1">
                            <i class="fa-solid fa-star"></i>
                        </label><br>
                        <input type="radio" id="val_2" name="average" value="2" v-model="inputAverage">
                        <label for="val_2">
                            <span v-for="index in 2" :key="index"><i class="fa-solid fa-star"></i></span>
                        </label><br>
                        <input type="radio" id="val_3" name="average" value="3" v-model="inputAverage">
                        <label for="val_3">
                            <span v-for="index in 3" :key="index"><i class="fa-solid fa-star"></i></span>
                        </label><br>
                        <input type="radio" id="val_4" name="average" value="4" v-model="inputAverage">
                        <label for="val_4">
                            <span v-for="index in 4" :key="index"><i class="fa-solid fa-star"></i></span>
                        </label><br>
                        <input type="radio" id="val_5" name="average" value="5" v-model="inputAverage">
                        <label for="val_5">
                            <span v-for="index in 5" :key="index"><i class="fa-solid fa-star"></i></span>
                        </label>

                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <h4>Numero di recensioni</h4>
                    <div>
                        <input type="radio" id="0" name="reviews" value="" v-model="inputRange">
                        <label for="0">
                            All
                        </label><br>
                        <input type="radio" id="5" name="reviews" value="1" v-model="inputRange">
                        <label for="5">
                            Meno di 5 recensioni
                        </label><br>
                        <input type="radio" id="5" name="reviews" value="5" v-model="inputRange">
                        <label for="5">
                            Tra 5 e 10 recensioni
                        </label><br>
                        <input type="radio" id="10" name="reviews" value="10" v-model="inputRange">
                        <label for="10">
                            Più di 10 recensioni
                        </label><br>
                    </div>
                </div>
                <div class="col-12 buttons">
                    <button class="btn cs-btn" @click="search">Filtra</button>
                    <button class="btn cs-btn" @click="clearFilter">Elimina Filtri</button>
                </div>
            </div>
        </div>
        <div>
            <div class="load"  v-if="loading">
                <div class="lds-roller">
                    <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                </div>
            </div>
                <div v-else class="cards" :class="responsiveUp ? 'resp' : ''">
                    <div class="row" v-if="doctors.length > 0">
                        <div class="col-12 col-lg-6 col-xl-4 my-5" v-for="(doctor) in doctors" :key="doctor.id">
                            <div class="card">
                                <div class="row">
                                    <div class="col-5">
                                        <router-link :to="{ name:'doctor', params:{slug: doctor.slug} }">
                                            <div class="img-box">
                                                <img :src="`/storage/${doctor.photo}`" class="w-100" :alt="doctor.name"  v-if=" doctor.photo">
                                                <img src='https://t4.ftcdn.net/jpg/02/29/53/11/360_F_229531197_jmFcViuzXaYOQdoOK1qyg7uIGdnuKhpt.jpg' v-else>
                                            </div>
                                        </router-link>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <h5 class="card-title">{{doctor.name}} {{doctor.surname}}</h5>
                                            <p class="card-text" v-if="doctor.reviews.length > 0"><i class="fa-solid fa-star" v-for="(index) in getAverage(doctor)" :key="index"></i></p>
                                            <p class="card-text" v-else>Nessuna recensione</p>
                                            <p class="card-text"><i class="fa-solid fa-map-location-dot"></i> {{doctor.address}}</p>
                                            <p class="card-text"><i class="fa-solid fa-phone"></i> {{doctor.cell_number}}</p>
                                            <router-link :to="{ name:'doctor', params:{slug: doctor.slug} }">
                                                <div class="btn cs-btn">Visualizza Profilo</div>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="specs">
                                            <h6>Specializzazioni</h6>
                                            <p class="mb-0" v-for="spec in doctor.specializations" :key="spec.id"><i class="fa-solid fa-stethoscope"></i>{{spec.name}}</p> 
                                        </div>
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
            loadingSp: false,
            responsiveUp: false,
            responsiveDown: true,
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
            this.responsiveUp = false;
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
                this.responsiveUp = false;
            })
        },
        getAverage(doctor) {
            let sum = 0;
            for (let i = 0; i < doctor.reviews.length; i++) {
                sum += doctor.reviews[i].votes;
            }
            return Math.floor(sum / doctor.reviews.length);
        },
        responsive(){
            this.responsiveUp = !this.responsiveUp
            this.responsiveDown = !this.responsiveDown
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
.cs-btn{
    color: #5f4bb6;
    font-weight: bold;
    border-color: #5f4bb6;
    &:hover{
        background-color: #5f4bb6;
        color: #fff;
    }
    &:focus{
        box-shadow: 0 0 0 0.2rem rgb(#5f4bb6, 0.5);
    }
}
.filter{
    background-color: rgb(231 237 247);
    position: fixed;
    height: 75px;
    overflow: hidden;
    left: 0;
    right: 0;
    z-index: 2;
    padding: 0 1rem 1rem 1rem;
    //padding: 1.5rem;
    h4, h2, .fa-star{
        color: #5f4bb6;
    }
    h4{
        margin-top: 0.5rem;
    }
    .title{
        cursor: pointer;
        padding: 1rem 0;
    }
    .buttons{
        padding: 1rem 0;
        text-align: center;
    }
    .rotate {
        -webkit-animation: rotate-90-cw 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: rotate-90-cw 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .rotate-back {
        -webkit-animation: rotate-back 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: rotate-back 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    &.scale-up-ver-top {
        -webkit-animation: scale-up-ver-top 0.5s linear both;
        animation: scale-up-ver-top 0.5s linear both;
    }
    &.scale-up-ver-down {
        -webkit-animation: scale-up-ver-top 0.5s linear both;
        animation: scale-up-ver-top 0.5s linear both;
    }
}
.cards{
    padding-top: 50px;
    &.resp{
        padding-top: 415px;
        -webkit-animation: padding-anim 0.5s linear both;
        animation: padding-anim 0.5s linear both;
    }
    .card{
        background-color: rgba(#86a5d9, 0.2);
        height: 100%;
        .img-box{
        // position: relative;
        // bottom:50px;
            &:hover img{
                -webkit-transform: scale3d(1.2, 1.2, 1);
                transform: scale3d(1.2, 1.2, 1);
            }
            img{
                width: 100%;
                object-fit: cover;
                object-position: top;
                border: 1px solid #86a5d9;
                -webkit-transition: all 0.5s linear;
                transition: all 0.5s linear;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
            }
        }
        .card-body{
            .card-text{
                color: #5f4bb6;
            }
        }
        .specs{
            padding: 1.9rem 1.25rem;
            h6{
                color: #5f4bb6;
            }
            .fa-solid{
                margin-right: 0.5rem
            }
        }
    }
}
.load{
    padding-top: 90px;
    text-align: center;
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
}
//animazioni
@keyframes scale-up-ver-top {
    0% {
        height:75px;
    }
    100% {
        height: 400px;
    }
}
@keyframes padding-anim {
    0% {
        padding-top: 50px;
    }
    100% {
        padding-top: 415px;
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
@keyframes scale-up-ver-down {
    0% {
        height: 400px;
    }
    100% {
        height:75px;
    }
}
@keyframes rotate-90-cw {
    0% {
        -webkit-transform: rotate(0);
        transform: rotate(0);
    }
    100% {
        -webkit-transform: rotate(-180deg);
        transform: rotate(-180deg);
    }
}
@keyframes rotate-back {
    0% {
        -webkit-transform: rotate(-180deg);
        transform: rotate(-180deg);
    }
    100% {
        -webkit-transform: rotate(0);
        transform: rotate(0);
    }
}
//media

@media screen and (max-width: 767px){
    .filter{
        height: 75px;
        overflow: hidden;
    }
    .cards{
        &.resp{
            padding-top: 655px;
        }
    }
    .img-box{
        img{
            height: 180px;
        }
    }
    @keyframes scale-up-ver-top {
        0% {
            height:75px;
        }
        100% {
            height: 640px;
        }
    }
    @keyframes padding-anim {
        0% {
            padding-top: 50px;
        }
        100% {
            padding-top: 640px;
        }
    }
}
@media screen and (min-width:577px) {
    .img-box{
        img{
            height: 240px;
        }
    }
}
@media screen and (min-width:992px) {
    .img-box{
        img{
            height: 150px;
        }
    }
}

</style>
