<template>
    <div class="container">
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
    </div>
</template>
<script>
export default {
    name: 'PrestazioniComponent',
    data(){
        return{
           specializations: [], 
            
        }
    },
    mounted(){
      axios.get('/api/specializations').then((response)=>{ 
        this.specializations = response.data;
      });
    }
    
}
</script>
<style lang="scss" scoped>
@import '../../sass/variables'; 
// QUADRATO SPEC
.container{
    
  margin-top: 650px!important;
}
body{
  background: #86a5d94e;
}
.big-square{
  margin: 0 auto;
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