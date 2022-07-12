<template>
    <div>
        <div class="bg-first">
        <!-- titolo nella home -->
            
                <div class="title text-center">
                    <h1>Il sito dove potrai trovare il tuo professionista di fiducia</h1>
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
                    <h3 class="mt-5 sub"> Provalo</h3>
                    <h3 class="sub">Prenota online il tuo prossimo medico</h3>
                </div>
            <!-- form accanto al titolo -->
            <!-- <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-3 col-md-2 col-lg-2">
                            <form class="form-inline my-2 my-lg-0 auto-center" >
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </form>

                        </div>

                    </div>
              </div> -->



      </div>
                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 500" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><path d="M 0,500 C 0,500 0,250 0,250 C 247,217.5 494,185 734,185 C 974,185 1207,217.5 1440,250 C 1440,250 1440,500 1440,500 Z" stroke="none" stroke-width="0" fill="#5f4bb6ff" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 250)"></path></svg>



          

        <!-- carosello -->
        <div id="app" class="w-carousel" >
            <agile :options="myOptions" :initial-slide="3" autoplay :autoplaySpeed="3000" pauseOnHover mobileFirst>

                <div class="slide container-">
                        <div class="circle-"></div>
                        <p class=".title-card">Lorem ipsum dolor</p>
                        <p class="sub-title-card">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        </p>
                </div>

                <div class="slide container-">
                        <div class="circle-"></div>
                        <p class=".title-card">Lorem ipsum dolor</p>
                        <p class="sub-title-card">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        </p>
                </div>


                <div class="slide container-">
                        <div class="circle-"></div>
                        <p class=".title-card">Lorem ipsum dolor</p>
                        <p class="sub-title-card">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        </p>
                </div>


                <div class="slide container-">
                        <div class="circle-"></div>
                        <p class=".title-card">Lorem ipsum dolor</p>
                        <p class="sub-title-card">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        </p>
                </div>


                <div class="slide container-">
                        <div class="circle-"></div>
                        <p class=".title-card">Lorem ipsum dolor</p>
                        <p class="sub-title-card">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        </p>
                </div>



                <div class="slide container-">
                        <img src="" alt="" class="circle-">
                        <p class=".title-card">Lorem ipsum dolor</p>
                        <p class="sub-title-card">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        </p>
                </div>

                <div class="slide container-">
                        <div class="circle-"></div>
                        <p class=".title-card">Lorem ipsum dolor</p>
                        <p class="sub-title-card">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        Ratione iusto assumenda obcaecati porro nihil sint, consequuntur facilis, accusantium fugit, qui a ducimus reiciendis exercitationem enim maiores iure neque? Illo, commodi.
                        </p>
                </div>
                    

                    



                    <!-- <div class="slide" v-for="(doctor,index) in doctors" :key="index" :class="`slide--${index}`">
                            <img :src="`/storage/${doctor.image}`" class="w-100" :alt="doctor.title">
                    </div> -->
                <template slot="prevButton"><i class="fas fa-chevron-left"></i></template>
                <template slot="nextButton"><i class="fas fa-chevron-right"></i></template>
            </agile>
        </div>
    

        
        

        



    </div>
</template>

<script>

import { VueAgile } from 'vue-agile'
export default {
    name: 'HomeComponent',
    components: {
        agile: VueAgile 
    },
    
    
    data () {
    return {
        // myOptions: {
        //     navButtons: false,
            
        //     responsive: [
        //         {
        //             breakpoint: 600,
        //             settings: {
        //                 dots: false
        //             }
        //         },
                
        //         {
        //             breakpoint: 900,
        //             settings: {
        //                 navButtons: true,
        //                 dots: true,
        //                 infinite: false
        //             }
        //         }
        //     ]
        // }
    }
}
}
</script>
<style lang="scss">
@import '../../sass/variables'; 
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



// parte seconda carosello e svg
.agile__nav-button {
    background: transparent;
  border: none;
  color: #fff;
  cursor: pointer;
  font-size: 24px;
  height: 100%;
  position: absolute;
  top: 0;
  transition-duration: 0.3s;
  width: 80px;
}
.agile__nav-button:hover {
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 1;
}
.agile__nav-button--prev {
  left: 0;
}
.agile__nav-button--next {
  right: 0;
}
.agile__dots {
  bottom: 10px;
  left: 50%;
  position: absolute;
  transform: translateX(-50%);
}
.agile__dot {
  margin: 0 10px;
}
.agile__dot button {
  background-color: transparent;
  border: 1px solid $general-light-blue;
  border-radius: 50%;
  cursor: pointer;
  display: block;
  height: 10px;
  font-size: 0;
  line-height: 0;
  margin: 0;
  padding: 0;
  transition-duration: 0.3s;
  width: 10px;
}
.agile__dot--current button, .agile__dot:hover button {
  background-color: $general-light-blue;
}

.slide {
  display: block;
  height: 500px;
  -o-object-fit: cover;
     object-fit: cover;
  width: 100%;
}

.w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    bottom: 650px;
    z-index: 10000;
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
@media screen and (max-width: 2631px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    bottom: 820px;
    z-index: 10000;
}
  
}

@media screen and (max-width: 1900px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    bottom: 500px;
    z-index: 10000;
}
  
}

@media screen and (max-width: 1600px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    bottom: 500px;
    z-index: 10000;
}
  
}

@media screen and (max-width: 1300px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    bottom: 400px;
    z-index: 10000;
}
  
}
@media screen and (max-width: 1100px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    top: -300px;
    z-index: 10000;
}
  
}
@media screen and (max-width: 768px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    top: -200px;
    z-index: 10000;
}
  
}
@media screen and (max-width: 375px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    top: -80px;
    z-index: 10000;
}
  
}


@media screen and (max-width: 1200px) {
  .w-carousel{
    width: 80%;
    margin: 0 auto;
    position: relative;
    bottom: 400px;
    z-index: 10000;

}
.waviy {
  position: relative;
  -webkit-box-reflect: below -20px linear-gradient(transparent, rgba(0,0,0,.2));
  font-size: 40px;
  font-family: 'Ibarra Real Nova', serif;
}

}

  
</style>
