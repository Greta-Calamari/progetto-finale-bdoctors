<template>
  <div>
    <div class="bg-first">
        <!-- titolo nella home -->
            
        <div class="title text-center" data-aos="fade-up" data-aos-duration="2000">
            <h1 data-aos="fade-up" data-aos-duration="2000">Il sito dove potrai trovare il tuo professionista di fiducia</h1>
            <div class="waviy">
                <span style="--i:1">D</span>
                <span style="--i:2">O</span>
                <span style="--i:3">T</span>
                <span style="--i:4">T</span>
                <span style="--i:5">O</span>
                <span style="--i:6">R</span>
                <span style="--i:7">I</span>
                <span style="--i:8">.</span>
                <span style="--i:9">I</span>
                <span style="--i:10">T</span>

            </div>
            <h3 data-aos="fade-up" data-aos-duration="2000" class="mt-5 sub"> Provalo</h3>
            <h3 data-aos="fade-up" data-aos-duration="2000" class="sub">Prenota online il tuo prossimo medico</h3>
        </div>




    </div>
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 500" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><path d="M 0,500 C 0,500 0,250 0,250 C 247,217.5 494,185 734,185 C 974,185 1207,217.5 1440,250 C 1440,250 1440,500 1440,500 Z" stroke="none" stroke-width="0" fill="#5f4bb6ff" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)"></path></svg>



          

    <!-- carosello -->
        

              <div class="container cont" data-aos="fade-up" data-aos-duration="2000">
                  <div class="card mb-3 card-dd">
                    <div class="row no-gutters">
                      <div  class="col-md-4 card-media" >
                            <img v-if="doctors[indexActive].photo" class=" img-card" :src="`/storage/${doctors[indexActive].photo}`" :alt="doctors[indexActive].name"/>
                            <img v-else class=" img-card" src="https://t4.ftcdn.net/jpg/02/29/53/11/360_F_229531197_jmFcViuzXaYOQdoOK1qyg7uIGdnuKhpt.jpg" :alt="doctors[indexActive].name" />
                      </div>
                      
                        
                      <div class="col-md-8 card-media">
                        <div class="card-body my-card">
                          <h5 class="card-title text-center mt-5 ">{{doctors[indexActive].name}}</h5>
                          <h5 class="card-title text-center mt-2">{{doctors[indexActive].surname}}</h5>
                          <p class="text-center p-car media-q">{{doctors[indexActive].address}}</p>
                          <p  class="text-center p-car media-q">{{doctors[indexActive].cell_number}}</p>
                          <p  class="text-center media-q p-car mt-5">{{doctors[indexActive].services}}</p>
                          <!-- <ul>
                            <li v-for="specialization in doctor.specializations" :key="specialization.id">
                              <router-link class="router-link" :to="{name: 'doctors', params: {id: specialization.id} }" >{{specialization.name}}</router-link>
                          </li>
                          </ul> -->

                          



                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="prev" @click="prevSlide">
                    <i class="fa-solid fa-chevron-left"></i>
                  </div>
                  <div class="next" @click="nextSlide">
                    <i class="fa-solid fa-chevron-right"></i>

                  </div>

              </div>

                  
      
    <!-- QUADRATO SPECIALIZZAZIONI -->
    <div class="spec" data-aos="fade-right" data-aos-duration="2000">

      <div class="big-square">
        <div class="border-in">
          
          <h2 class=" text-center title-big">I nostri medici specializzati</h2>

          <div class="row mt-3 row-spec">
            <div  data-aos="flip-up" data-aos-duration="2000" class="col-12-s col-md-3 col-lg-3 gy-3 title-big margin-col " v-for="specialization in specializations" :key="specialization.id">
              
                <div class="icon-spec">
                    <router-link class="router-link" :to="{name: 'doctors', params: {id: specialization.id} }" >
                      
                        <img :src="`/images/id${specialization.id}.png`" alt="" class="img-w ">
                        <div class="spec-name text-center">{{specialization.name}}</div>
                    </router-link>
                     
                </div>

              

            </div>

          </div>
        </div>
      </div>


    </div>
    <!-- COME LAVORIAMO -->
      <div class="divider">
        <div class="d-flex justify-content-center">
            <img src="/images/doctors.jpg" alt="" class="img-"  data-aos="zoom-in"  data-aos-duration="2000">
        </div>
        <div class="r-1">

          <h2 class="text-center" data-aos="fade-up" data-aos-duration="2000">Come lavoriamo</h2>
          <div class="container" >
              <div class="row justify-content-center mt-4  ">
                <div class="col-12 col-lg-5 med-13" data-aos="fade-right" data-aos-duration="2000">
                  I suoi reparti sono dotati di apparecchiature diagnostiche e terapeutiche all'avanguardia e gestiti da medici di prima categoria, Ph.D. e Dottori in Medicina, professori associati e professori informati sulle migliori pratiche disponibili delle scuole europee. Le partnership con cliniche specializzate e centri di ricerca in Europa rendono possibili le consultazioni di medici di specialità uniche.

                </div>
                <div class="col-12 med-13 col-lg-5" data-aos="fade-left" data-aos-duration="2000">
                  <p>
                    I suoi reparti sono dotati di apparecchiature diagnostiche e terapeutiche all'avanguardia e gestiti da medici di prima categoria, Ph.D. e Dottori in Medicina, professori associati e professori informati sulle migliori pratiche disponibili delle scuole europee. Le partnership con cliniche specializzate e centri di ricerca in Europa rendono possibili le consultazioni di medici di specialità uniche.

                   
                  </p>
                  
                </div>


              </div>

          </div>

        </div>
        

      </div>

<!-- OBBIETTIVI -->
      <div class="container c-obb ">
        <div class="row border-row">
          <div class="col-obb col-4">
            <h3 class="text-center sub-tit q-1" data-aos="fade-right" data-aos-duration="2000">IL</h3>
            <h4 class="text-center q-2" data-aos="fade-right" data-aos-duration="2000">Obiettivo e Missione</h4>
            <p class="text-center q-3" data-aos="fade-right" data-aos-duration="2000">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque facere doloremque assumenda distinctio repellat, quisquam iusto expedita reiciendis praesentium porro fuga ad beatae possimus quaerat et quod facilis id accusamus molestiae. Earum commodi veniam voluptates minus perferendis? Saepe dignissimos dolore at impedit dolores. Cumque numquam natus illum eius voluptatem officiis?</p>
            <button class="btn my-btn m-b" data-aos="fade-right" data-aos-duration="2000">per saperne di piu</button>

          </div>

          <div class="col-obb col-4" >
            <h3 class="text-center sub-tit q-1" data-aos="fade-up" data-aos-duration="2000">NOSTRO</h3>
            <h4 class="text-center q-2 " data-aos="fade-up" data-aos-duration="2000">La Nostra Clinica</h4>
            <p class="text-center q-3" data-aos="fade-up" data-aos-duration="2000">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque facere doloremque assumenda distinctio repellat, quisquam iusto expedita reiciendis praesentium porro fuga ad beatae possimus quaerat et quod facilis id accusamus molestiae. Earum commodi veniam voluptates minus perferendis? Saepe dignissimos dolore at impedit dolores. Cumque numquam natus illum eius voluptatem officiis?</p>
            <button class="btn my-btn m-b" data-aos="fade-up" data-aos-duration="2000">per saperne di piu</button>

          </div>
          <div class="col-obb col-4">
            <h3 class="text-center sub-tit q-1" data-aos="fade-left" data-aos-duration="2000">LAVORO</h3>
            <h4 class="text-center q-2" data-aos="fade-left" data-aos-duration="2000">Lavora Con noi</h4>
            <p class="text-center q-3" data-aos="fade-left" data-aos-duration="2000">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque facere doloremque assumenda distinctio repellat, quisquam iusto expedita reiciendis praesentium porro fuga ad beatae possimus quaerat et quod facilis id accusamus molestiae. Earum commodi veniam voluptates minus perferendis? Saepe dignissimos dolore at impedit dolores. Cumque numquam natus illum eius voluptatem officiis?</p>
            <button class="btn my-btn mb-2 m-b" data-aos="fade-left" data-aos-duration="2000">per saperne di piu</button>

          </div>
        </div>
      </div>


  <!-- VALORI -->
    <div class="mt-val">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#86a5d9" fill-opacity="1" d="M0,0L80,53.3C160,107,320,213,480,240C640,267,800,213,960,176C1120,139,1280,117,1360,106.7L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg>
      <div class="bg-val">
        <h2 class="text-center tt" data-aos="zoom-out-up"  data-aos-duration="2000" >Viviamo e respiriamo in nostri lavori</h2>
        <div class="container mt-5">
          <div class="row">
            <div class="col col-q-val">
              <p class="p-val" data-aos="zoom-out-up"  data-aos-duration="2000">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam ipsum possimus tempore eum minus ab earum sint, quaerat sunt accusantium! Voluptatem deleniti necessitatibus, accusamus dolores magnam maiores? Maxime suscipit hic reiciendis nam quae porro iure, nemo, ullam ad mollitia esse quasi vitae nulla blanditiis dignissimos ut commodi eos corporis officia.</p>
            </div>
            <div class="col col-q-val " data-aos="zoom-out-up"  data-aos-duration="2000">
              <p class="p-val">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam ipsum possimus tempore eum minus ab earum sint, quaerat sunt accusantium! Voluptatem deleniti necessitatibus, accusamus dolores magnam maiores? Maxime suscipit hic reiciendis nam quae porro iure, nemo, ullam ad mollitia esse quasi vitae nulla blanditiis dignissimos ut commodi eos corporis officia.</p>
            </div>
            <div class="col col-q-val" data-aos="zoom-out-up"  data-aos-duration="2000">
              <p class="p-val">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam ipsum possimus tempore eum minus ab earum sint, quaerat sunt accusantium! Voluptatem deleniti necessitatibus, accusamus dolores magnam maiores? Maxime suscipit hic reiciendis nam quae porro iure, nemo, ullam ad mollitia esse quasi vitae nulla blanditiis dignissimos ut commodi eos corporis officia.</p>
            </div>

          </div>

        </div>

      </div>
      
    </div>

    <!-- CAROSELLO NOTIZIE -->
        

        <carousel  :autoplay="true" :nav="false"  autoplayHoverPause="true"  items='4' autoWidth='true' data-aos="zoom-out-right" data-aos-duration="2000">
              <div class="card h" >
                <img src="/images/corona.jpg" alt="" class="img-car-2" >
                  <div class="card-body">
                    <h5 class="card-title">Corona virus</h5>
                    <p class="card-text">I ricercatori segnalano la rilevazione di mutazioni virali associate alla farmacoresistenza in pazienti trattati con REGEN-COV e sotrovimab</p>
                    <a href="https://www.news-medical.net/" class="btn my-btn">Per saperne di più</a>
                  </div>
              </div>

              <div class="card h " >
                    <img src="/images/depression.jpg" alt="" class="img-car-2">
                      <div class="card-body">
                        <h5 class="card-title">Depressione</h5>
                        <p class="card-text">Recensione: nessuna chiara evidenza che i livelli di serotonina siano responsabili della depressione</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">Per saperne di più</a>
                      </div>
              </div>

              <div class="card h" >
                    <img src="https://thumbs.dreamstime.com/b/red-heart-shape-medical-stethoscope-light-background-top-view-health-care-medicare-cardiology-concept-blue-104679825.jpg" alt="" class="img-car-2">
                      <div class="card-body">
                        <h5 class="card-title">Cardiologia</h5>
                        <p class="card-text">In che modo il sonno influisce sulla salute del cuore?</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">Per saperne di più</a>
                      </div>
              </div>

              <div class="card h" >
                    <img src="https://www.ars.toscana.it/images/NBST/news/farmaci_ATBresistenza.png" alt="" class="img-car-2">
                      <div class="card-body">
                        <h5 class="card-title">Farmaci</h5>
                        <p class="card-text">L'effetto degli antibiotici sul microbioma intestinale</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">Per saperne di più</a>
                      </div>
              </div>

              <div class="card h" >
                    <img src="https://ilritrattodellasalute.tiscali.it/export/sites/salute/.galleries/22/immuno.png_982521881.png" alt="" class="img-car-2">
                      <div class="card-body">
                        <h5 class="card-title">Cancro</h5>
                        <p class="card-text">Comprendere le sfide nella terapia del cancro utilizzando le cellule staminali mesenchimali (MSC)</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">Per saperne di più</a>
                      </div>
              </div>
              <div class="card h" >
                    <img class="img-car-2" src="https://thumbs.dreamstime.com/b/asma-bronchiale-dell-icona-91371630.jpg" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Asma</h5>
                        <p class="card-text">Colmare le lacune nell'attuale cura dell'asma</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">Per saperne di più</a>
                      </div>
              </div>
              <div class="card h" >
                    <img class="img-car-2" src="/images/depression.jpg" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Depressione</h5>
                        <p class="card-text">Recensione: nessuna chiara evidenza che i livelli di serotonina siano responsabili della depressione</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">PER SAPERNE DI PIU'</a>
                      </div>
              </div>
              <div  class="card h" >
                    <img class="img-car-2" src="https://assets-global.website-files.com/5d0b99352ab90c616bf47b31/60f9964fd52077781e1c3978_integratori.png" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Integratori</h5>
                        <p class="card-text">Nutrienti utili per affrontare la stanchezza estiva</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">PER SAPERNE DI PIU'</a>
                      </div>
              </div>
              <div class="card h ">
                    <img class="img-car-2" src="https://www.ilcambiamento.it/data/articoli/orig/96/10/9624-10393.jpg" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Sperimentazione</h5>
                        <p class="card-text">Regolamentazione ed etica delle sperimentazioni cliniche</p>
                        <a href="https://www.news-medical.net/" class="btn my-btn">PER SAPERNE DI PIU'</a>
                      </div>
              </div>
              
        </carousel>



        <!-- COSA DICONO I NOSTRI CLIENTI -->

        <!-- <div>
          <h1 class="text-center">Leggi cosa dicono i nostri clienti</h1>
          
            <div class="row justify-content-center h-r-c">
                  <div class="col-3 col-cli">
                    <div class="card mb-3 h-2 " style="max-width: 540px;">
                      <div class="row no-gutters justify-content-center">
                        <div class="col-md-4">
                          <img src="https://www.pentagonoservice.com/wp-content/uploads/revslider/homepage4/person.png" alt="..." class="w-100  img-card-2">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit aliquam accusantium voluptatibus magni iure et magnam possimus fugiat quisquam, mollitia placeat culpa ipsam expedita adipisci.
                            </p>
                            <h5 class="card-title">Frank Kinney</h5>
                            
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-3 col-cli">
                  <div class="card mb-3 h-2" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="https://toppng.com/uploads/preview/person-png-11553989513mzkt4ocbrv.png" alt="..." class="w-100  img-card-2">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit aliquam accusantium voluptatibus magni iure et magnam possimus fugiat quisquam, mollitia placeat culpa ipsam expedita adipisci.</p>
                          <h5 class="card-title">Febe Nelson</h5>
                          
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="row justify-content-center">
                  <div class="col-3 col-cli">
                    <div class="card mb-3 h-2" style="max-width: 540px;">
                      <div class="row no-gutters justify-content-center">
                        <div class="col-md-4">
                          <img src="https://c0.wallpaperflare.com/preview/446/791/732/woman-wearing-grey-turtle-neck-sweater.jpg" alt="..." class="w-100  img-card-2">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit aliquam accusantium voluptatibus magni iure et magnam possimus fugiat quisquam, mollitia placeat culpa ipsam expedita adipisci.</p>
                            <h5 class="card-title">Celia Almeda</h5>
                            
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-3 col-cli">
                  <div class="card mb-3 h-2" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="https://images.unsplash.com/photo-1597223557154-721c1cecc4b0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aHVtYW4lMjBmYWNlfGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="..." class="w-100 img-card-2 img-c-22">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit aliquam accusantium voluptatibus magni iure et magnam possimus fugiat quisquam, mollitia placeat culpa ipsam expedita adipisci.</p>
                          <h5 class="card-title">Jennie Roberts</h5>
                          
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div> -->

          



      





        
        
        

       

  </div>
</template>

               










                      
                     


                  




<script>

import { VueAgile } from 'vue-agile'
import carousel from 'vue-owl-carousel'
export default {
    name: 'HomeComponent',
    components: {
        agile: VueAgile,
        carousel ,
 
    },
    data () {
        return {
            specializations: [],
            doctors:[],
            indexActive:0,
        }
    },
    mounted(){
      axios.get('/api/specializations').then((response)=>{ 
        this.specializations = response.data;
      });
      axios.get('/api/doctors-sponsorized').then((response)=>{ 
        this.doctors = Object.values(response.data);
        
      });
      this.autoScroll()
    },
    methods:{
        nextSlide(){
            if(this.indexActive === 4){
                this.indexActive = 0
            }else{
                this.indexActive += 1
            }

        },
        prevSlide(){
            if(this.indexActive === 0){
                this.indexActive = 4
            }else{
                this.indexActive -= 1
            }

        },
         autoScroll(){
            
            this.intervalId = setInterval(()=>{
                this.nextSlide()
            },3000)

        },
        stopAutoscroll(){
            clearInterval(this.intervalId)
            this.intervalId = null
        }
    }
}
</script>
<style lang="scss">
@import '../../sass/variables'; 

// MODIFICHE ULTIME
// .my-card{
//   position: absolute;
//   top: 50%;
//   left: 50%;
//   transform:translate(-50%, -50%); 
// }
.margin{
  overflow: hidden;
}
.row-spec{
  margin-right: 33px;
  margin-left: -48px;
}


.col-obb{
  background-color: #5f4bb652;
}
.router-link{
  text-decoration: none;
} 

.img-car-2{
height: 200px;
}
.spec-name {
  text-decoration: none;
  color: $general-light-blue;
}
.spec-name:hover{
  text-decoration: none;
  color: $general-violet;
  
}
// CAROSELLO
.card-dd{
  max-width: 1500px;
  height:550px ;
  background-color:#bdcee7;
}
.cont{
    
position: relative;
bottom:800px;
z-index: 1000;
}
.img-card{
  height: 548px;
  width: 400px;
  object-fit: cover;
}
    
.p-car{
width:400px;
margin:76px auto;

}
.p-carr{
width:400px;
margin:50px auto;
font-style: italic;

}
.fa-chevron-left::before {
    content: "\F053";
    font-size: 40px;
}
.fa-chevron-right::before {
    content: "\F054";
    font-size: 40px;

}

.prev, .next {
    width: 20px;
    height: 20px;
    margin: 10px 0;
    border-radius: 50%;
    transform: translate(-50%);
    cursor: pointer;
    z-index: 999;
    
    
}

.prev{
  position: absolute;
  right: 60%;
  top: 45%
}

.next {
    position: absolute;
    left: 97%;
    top: 45%;
}
// carosello 2
.owl-theme .owl-nav [class*='owl-'] {
   
    display: none;
}

// BOTTONE

.my-btn{
  background-color: $general-light-blue;
  color:$general-white;
}
 
 .my-btn:hover{
  border: $general-light-blue;
  background-color: $general-light-blue ;
 
 }
// QUADRATO SPEC
body{
  background: #86a5d94e;
}
.big-square{
  margin: 0 auto;
  height: 1400px;
  width: 906px;
  background-color: $general-white;
  border: 1px solid white;

}

.border-in{
  border: 1px solid $general-light-blue;
  margin: 25px;
  height: 1350px;
  width: 860px;
  

}

.title-big{
  margin-top: 50px;
}


.img-w{
width: 50%;
margin-left: 50px;



}

.spec{
  margin-top: -700px;
}
.m-b{
  margin-left: 100px;
}

.margin-col{
  margin-left: 70px;
  
}
// COME LAVORIAMO



.divider{
  color: $general-white;
  background-color: $general-violet;
  margin-top: 300px;
  height: 1000px;
}

.r-1{
  margin-top:-150px;
}
  


.img-{
  position: relative;
  bottom:200px;
}
.border-row{
  position: relative;
  bottom: 60px;
  height: 400px;
  margin-top: 100px;
}


.sub-tit{
  color: $general-violet;
  font-size: 50px;
}

// VALORI
.bg-val{
  background: hsla(218, 52%, 69%, 1);

background: linear-gradient(180deg, hsla(218, 52%, 69%, 1) 46%, hsla(0, 0%, 100%, 1) 100%);

background: -moz-linear-gradient(180deg, hsla(218, 52%, 69%, 1) 46%, hsla(0, 0%, 100%, 1) 100%);
  height: 500px;
}

.tt{
  color: $general-violet;
  font-weight: 700;
}
.p-val{
  font-size: 20px;
}
.mt-val{
  margin-top:-200px ;
}

// CAROSELLO NEWS
.h{
  height:500px;
  width:365px;
  margin-top: 30px;
}

// CLIENTI
.h-2{
  height: 300px;
}

.img-card-2{
  
  height: 300px;
  width: 200px;
  object-fit: cover;
  
}

// parte prima

h1{
    font-size: 50px;
    font-family: 'Ibarra Real Nova', serif;
}
.title{
    padding: 50px;
    color: $general-white;
}

.bg-first{
    // background-color: $general-violet;
    background: linear-gradient(0deg, hsla(251, 42%, 50%, 1) 40%, hsla(231, 51%, 60%, 1) 100%);

    background: -moz-linear-gradient(0deg, hsla(251, 42%, 50%, 1) 40%, hsla(231, 51%, 60%, 1) 100%);
}
.sub{
  font-family: 'Ibarra Real Nova', serif;
}




.container- {

  width: 750px;
  background: #fff;
  border-radius: 10px;
  padding: 30px;
  border: 1px solid $general-light-blue;
  // margin-top:50px;
  
//   margin: 150px auto;
//   box-shadow: 0 15px 50px 0 rgba(0, 0, 0, 0.5);
 
}

.circle- {
  width: 200px;
  height: 200px;
  background-size: cover;
  background-position: center;
  border-radius: 50%;
  float: left;
  margin: 50px 30px 30px 0;
  shape-outside: circle();
  box-shadow: 0 2.5px 5px 0 rgba(0, 0, 0, 0.5);
}

.title-card {
  margin-bottom: 10px;
  font-weight: 400;
  font-size: 48px;
  color: rgb(14, 14, 14);
}

.sub-title-card {
  color: rgb(108, 106, 106);
  font-weight: 300;
  line-height: 26px;
}


// ANIMAZIONI

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}


.waviy {
  position: relative;
  -webkit-box-reflect: below -20px linear-gradient(transparent, rgba(0,0,0,.2));
  font-size: 60px;
  font-family: 'Ibarra Real Nova', serif;
}
.waviy span {
  
  position: relative;
  display: inline-block;
  color: #fff;
  text-transform: uppercase;
  animation: waviy 1s infinite;
  animation-delay: calc(.1s * var(--i));
  
}
@keyframes waviy {
  0%,40%,100% {
    transform: translateY(0)
  }
  20% {
    transform: translateY(-20px)
  }
}



// MEDIA QUERY
// @media screen and (max-width: 2000px) {
// .card-dd{
//   margin-top: 100px;
// }

  
  
// }

@media screen and (max-width: 1900px) {

.spec{
  margin-top:-600px ;
}
.cont{
  margin-top: 300px;
}

  
}



@media screen and (max-width: 1600px) {

.cont{
  margin-top: 300px;
}
.med-13{
  flex: 0 0 25%;
  max-width: 25%;
  
}

.img-c-22{
  object-position:-30px 10px;

}
.mt-val{
margin-top:-100px ;
}
  
  
  
}
@media screen and (max-width: 1300px) {

.cont{
  margin-top: 400px;
}
.med-13{
  flex: 0 0 25%;
  max-width: 25%;
  
}

.col-cli{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 800px;
}
.h-2{
  height: 300px;
}
.spec{
  margin-top:-600px ;
}
.mt-val{
  margin-top:-90px ;
} 
  
}


@media screen and (max-width: 1200px) {
  .col-obb{
    flex: 0 0 30%;
    max-width: 30%;
    margin-left: 30px;
    
    
  }
  
.m-b{
  margin-left: 60px;
}
.col-cli{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 600px;
}
.h-2{
  height: 300px;
}
.img-{
  position: relative;
  bottom:200px;
  width: 50%;
}
.divider{
  
  height: 1000px;
}
.spec{
  margin-top:-600px ;
}

  
}
@media screen and (max-width: 1200px) {

.img-{
  width: 100%;
}
}
@media screen and (max-width: 1100px) {

.spec{
  margin-top:-600px ;
}
}
@media screen and (max-width: 768px) {
  .spec-name {
    position: relative;
    right: 125px !important;
}
  .img-w {
    width: 20%;
    margin-left: -43px !important;
}
.big-square{
  margin: 0 auto;
  height: 1400px;
  width: 900px;
  background-color: $general-white;
  border: 1px solid white;

}

.border-in{
  border: 1px solid $general-light-blue;
  margin: 25px;
  height: 1350px;
  width: 860px;
  

}
 
.h{
  height: 500px;
  gap:0 10px;

}
.img-card-2{
  
  height: 400px;
  object-fit: cover;
  
}
.border-row {
    height: 1400px;
    width: 757px;

    margin-left: -69px;
}

  
}

@media screen and (max-width: 995px) {
  .border-row {
    
    width: 750px;
    margin-left: -54px;
}
.media-q{
  width: 180px;
}

.card-dd{
  max-width: 1500px;
 height: 600px;
}
.prev{
  position: absolute;
  right:40%;
  top: 33%
}
.next {
    left: 95%;
}
.img-card{
  height: 598px;
  width: 400px;
  object-fit: cover;
}
.cont{
margin-top: 500px;
}
.card-media{
  flex: 50%;
  max-width: 50%;
}
.med-13{
  flex: 0 0 30%;
  max-width: 30%;
  
}

.col-12-s{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 216px;

}
.img-w{
  width: 20%;
  margin-left: 8px;

}


.spec{
  margin-bottom: 300px;
}
  

.col-obb{
    flex: 0 0 100%;
    max-width: 100%;
    margin-left: 4px;

  }

    

.m-b{
  margin-left: 310px;
}
.q-3 , .q-1 , .q-2{
  width:300px;
  margin-left: 236px;
}
.c-obb{

  height: 1450px;
}

.bg-val{
  height: 800px;

}

.col-cli{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 400px;
}
// QUADRATO
.big-square{
  margin: 0 auto;
  height: 2550px;
  width: 300px;
  background-color: $general-white;
  border: 1px solid white;

}

.border-in{
  border: 1px solid $general-light-blue;
  margin: 25px;
  height: 2500px;
  width: 250px;
  

}
.spec-name{
  position: relative;
  right: 88px;
  
}
.col-12-s{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 90px;

}
.spec{
  margin-top:-600px ;
}


}
@media screen and (max-width: 999px) {
  .row-spec{
  margin-right: 0px;
  margin-left: 0px;
}
.prev {
    
    right: 37% !important;
    
}
.next { 
    left: 95% !important;
}
.img-w {
    width: 20%;
    margin-left: -3px;
}
}
@media screen and (max-width: 768px) {

.media-q{
  width: 180px;
}

.card-dd{
  max-width: 1500px;
 height: 600px;
}
.prev{
  position: absolute;
  left: 6%;
  top: 33%
}
.next {
    left: 94% !important;
}
.img-card{
  display: none;
}
.cont{
margin-top: 572px;
}
.card-media{
  flex: 100%;
  max-width: 100%;
}


.med-13{
flex: 0 0 40%;
max-width: 40%;

}
.spec{

margin-top: 30px;

}
.border-row{
  height: 1400px;
  width: 600px;
  margin-left: -60px;
}
.m-b{
  margin-left: 220px;
}
.q-3 , .q-1 , .q-2{
  width:300px;
  margin-left: 149px;
}

.bg-val{
  height: 800px;
  

}
.col-q-val{
  flex: 0 0 100%;
  max-width: 100%;

}
.col-cli{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 200px;
}
.h-2{
  height: 500px;
}

// QUADRATO

.spec-name{
 position: relative;
  
}
.col-12-s {
    flex: 0 0 100%;
    max-width: 100%;
    margin-left: 128px;
}
.spec{
  margin-top:-600px ;
}

}
@media screen and (max-width: 576px) {
.col-obb{
  margin-left:-21 !important;
}
.cont{
margin-top: 600px;
}
.med-13{
flex: 0 0 50%;
max-width: 50%;

}
.divider{
color: $general-white;
background-color: $general-violet;
margin-top: 20%;
height: 1300px;
}
.big-square{
  margin: 0 auto;
  height: 2600px;
  width: 300px;
  background-color: $general-white;
  border: 1px solid white;

}

.border-in{
  border: 1px solid $general-light-blue;
  margin: 25px;
  height: 2500px;
  width: 250px;
  

}
.col-12-s{
  flex: 0 0 120%;
  max-width: 120%;
  margin-left: 180px;

}
 
.border-row{
  width: 596px !important;
}
.h{
  margin-left: 100px;

}
.col-cli{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 40px;
}

.img-{
  position: relative;
  bottom:200px;
  width: 70%;
}
.divider{
  
  height: 700px;
}

// QUADRATO

.spec-name{
 
  position: relative;
  right: 88px !important;
}
.img-w {
    width: 20%;
    margin-left: -3px !important;
}
  

  
.col-12-s{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 90px;

}
.spec{
  margin-top:-500px ;
}

.m-b{
  margin-left: 225px;
}
.q-3 , .q-1 , .q-2{
  width:300px;
  margin-left: 149px;
}
 
}


@media screen and (max-width: 375px) {
.cont{
margin-top: 700px;
}

.spec{
  margin-top:-600px ;
}
.border-in{
  border: 1px solid $general-light-blue;
  margin: 25px;
  height: 2650px;
  width: 300px;
}
.col-12-s{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 90px;

}

.m-b{
  margin-left:150px;
}

.q-3 , .q-1 , .q-2{
  width:300px;
  margin-left: 80px;
}
.border-row{
 
  width: 443px;
  margin-left: -100px;
}
.bg-val{
  height: 1300px;

}
.h{
  margin-left: -0px;

}
.col-cli{
  flex: 0 0 100%;
  max-width: 100%;
  margin-left: 0px;
}
.h-2{
  height: 600px;
}
.img-{
  position: relative;
  bottom:200px;
  width: 80%;
}
.divider{
  
  height: 800px;
}
.big-square{
  margin: 0 auto;
  height: 2600px;
  width: 300px;
  background-color: $general-white;
  border: 1px solid white;

}

.border-in{
  border: 1px solid $general-light-blue;
  margin: 25px;
  height: 2500px;
  width: 250px;
  

}
.spec-name{
   position: relative;
   right: 88px !important;
  
}
.img-w {
    width: 20%;
    margin-left: -3px !important;
}

}


@media screen and (max-width: 1200px) {
  
.waviy {
  position: relative;
  -webkit-box-reflect: below -20px linear-gradient(transparent, rgba(0,0,0,.2));
  font-size: 40px;
  font-family: 'Ibarra Real Nova', serif;
}
.prev {
    position: absolute;
    right: 53%;
    top: 45%;
}
.next {
    left: 96%;
}

}








</style>
