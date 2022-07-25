<template>
<div>
    <!-- parte prima -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-margin">
                <div class="box">
                    <h1 class="title-about">La piattaforma per la tua salute</h1>
                    <p class="sub-title-about">La piattaforma per la tuaLorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium repellendus omnis odio voluptatem earum assumenda quasi, tempore commodi corporis voluptate mollitia obcaecati ad, doloremque unde nemo dolorum distinctio ipsam excepturi veritatis debitis, fuga quaerat reiciendis molestias eveniet. Laborum quis at, nobis tenetur unde libero ea eum reprehenderit, eligendi voluptate perspiciatis.</p>
                    <button class="btn my-btn text-center">Scrivi ai nostri dottori</button>

                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <img src="https://images03.nicepage.com/c461c07a441a5d220e8feb1a/950b5550646851d18b39c668/min.png" alt="" class="img-jumbo" >
            </div>



        </div>

    </div>
<!-- parte seconda-->
<div class="container col-margin">
        <div class="row">
            
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <img src="https://images03.nicepage.com/c461c07a441a5d220e8feb1a/3ed7980862915a9cafc07038/aaaa.jpg" alt="" class="img-jumbo" >
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 ">
                <div class="box box-2">
                    <h2 class="title-about">La cura da casa</h2>
                    <p class="sub-title-about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium repellendus omnis odio voluptatem earum assumenda quasi, tempore commodi corporis voluptate mollitia obcaecati ad, doloremque unde nemo dolorum distinctio ipsam excepturi veritatis debitis, fuga quaerat reiciendis molestias eveniet. Laborum quis at, nobis tenetur unde libero ea eum reprehenderit, eligendi voluptate perspiciatis.</p>
                    <button class="btn my-btn text-center">Accedi</button>

                </div>
            </div>



        </div>

    </div>


    


    <!-- parte terza-->
<div class="container mt-5">
        <div class="row">
            
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-margin">
                <div class="box">
                    <h2 class="title-about">I nostri laboratori</h2>
                    <p class="sub-title-about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium repellendus omnis odio voluptatem earum assumenda quasi, tempore commodi corporis voluptate mollitia obcaecati ad, doloremque unde nemo dolorum distinctio ipsam excepturi veritatis debitis, fuga quaerat reiciendis molestias eveniet. Laborum quis at, nobis tenetur unde libero ea eum reprehenderit, eligendi voluptate perspiciatis.</p>
                    <span class="icon-lab mr-4">
                        <i class="fa-solid fa-flask"></i>
                    </span>
                    <span class="icon-lab">
                        <i class="fa-solid fa-syringe"></i>
                    </span>


                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <img src="https://images03.nicepage.com/c461c07a441a5d220e8feb1a/748f0e022639519486ee4dfb/min.png" alt="" class="img-jumbo" >
            </div>



        </div>

    </div>


    <!-- PARTE QUARTA -->
    <div class="container col-margin">
        <div class="row">
            
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <img src="https://images03.nicepage.com/c461c07a441a5d220e8feb1a/edf9d2086d325a33a2bd6329/tgrf.jpg" alt="" class="img-jumbo" >
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 ">
                <div class="box box-2">
                    <h2 class="title-about">Prevenzione Coronavirus</h2>
                    <p class="sub-title-about">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium repellendus omnis odio voluptatem earum assumenda quasi, tempore commodi corporis voluptate mollitia obcaecati ad, doloremque unde nemo dolorum distinctio ipsam excepturi veritatis debitis, fuga quaerat reiciendis molestias eveniet. Laborum quis at, nobis tenetur unde libero ea eum reprehenderit, eligendi voluptate perspiciatis.</p>
                    <button class="btn my-btn text-center">Accedi</button>

                </div>
            </div>



        </div>

    </div>

    <!-- PARTE QUINTA -->

    <div class="container col-margin">
        <div class="row">
            
            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                <img src="https://images01.nicepage.com/c461c07a441a5d220e8feb1a/914beaaa33d05d1ea1875eb3/ww-min.jpg" alt="" class="img-jumbo">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-margin">
                <div class="box box-3">
                    
                    <h2 class="title-about">Contattaci al servizio clienti</h2>
                    <p class="sub-title-about">
                        <i class="fa-solid fa-phone"></i>
                        001-234-5678
                        001-987-7654
                    </p>
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                        121 Rock Sreet, 21 Avenue, New York, NY 92103-9000
                    </div>
                    <div class="mt-3">
                        <i class="fa-solid fa-clock"></i>
                        Mon – Fri …… 11 am – 8 pm, Sat, Sun  …… 6 am – 8 pm
                    </div>

                    <button class="btn my-btn text-center mt-3">Chiama ora</button>

                    


                </div>
            </div>



        </div>

    </div>
    

</div>

</template>

<script>
export default {
    name: 'ChiSiamoComponent',
    data(){
        return{
            

        }
    },

}
</script>
<style lang="scss">
@import '../../sass/variables'; 
// GENERALE
.title-about{
    animation-name: moveInleft;
    animation-duration: 3s;
}
.sub-title-about{
    animation-name: moveInRight;
    animation-duration: 3s;

}

// PARTE PRIMA
.img-jumbo{
    overflow-x: hidden;
}

.col-margin{
    margin-top: 200px;
}

.box{
    padding: 50px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);

}

.my-btn{
    background-color:$general-violet ;
}
.my-btn:hover{
    background-color:$general-light-blue;
}

// PARTE SECONDA
.box-2{
    background-color: white;
    position: relative;
    top: 50%;
    left: 30%;
    
}

// PARTE TERZA
.icon-lab{
    font-size: 60px;
    color: $general-violet;

}
// PARTE QUARTA









// MEDIA QUERY

@media screen and (max-width: 991px) {
// PARTE PRIMA
 
.img-jumbo{
    width: 100%;
}

// PARTE SECONDA
.box-2{
    background-color: white;
    position: relative;
    bottom: 20%;
    left: 0%;
}
  
}
@media screen and (max-width: 1600px) {
// PARTE SECONDA
 
.box-2{
    background-color: white;
    position: relative;
    top: 50%;
    left: 0%;
}
  
}


// ANIMAZIONI

@keyframes moveInleft {
    0% {
        opacity: 0;
        transform: translateX(-100px);
    }

    80% {
        transform: translateX(10px);
    }
    100% {
        opacity: 1;
        transform: translate(0);
    }
}

@keyframes moveInRight {
    0% {
        opacity: 0;
        transform: translateX(100px);
    }

    80% {
        transform: translateX(-10px);
    }
    
    100% {
        opacity: 1;
        transform: translate(0);
    }

}
    
   

</style>
