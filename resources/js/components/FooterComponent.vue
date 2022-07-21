<template>
    <div class="container-footer mt-5">
        <div class="container-small row">
            <!-- Informazioni  -->
            <div class="col-sm-6 col-lg-3 col-md-3 info">
                <h3>Informazioni</h3>
                <hr>
                <ul>
                    <li><a href="#">Chi siamo</a></li>
                    <li><a href="#">Privacy e cookies</a></li>
                    <li><a href="#">Dottori</a></li>
                    <li><a href="#">Prestazioni</a></li>

                </ul>

            </div>
            <!-- Contattaci -->
            <div class="col-sm-6 col-lg-3 col-md-3 contacts">
                <h3>Contattaci</h3>
                <hr>
                <ul>
                    <li><a href="#">Chiedi al dottore</a></li>
                    <li><a href="#">Contatti</a></li>
                </ul>
            </div>
            <!-- social -->
            <div class="col-sm-6  col-lg-3 col-md-3 social">
                <h3>I nostri social</h3>
                <hr>
                <div class="d-flex flex-column">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i> Instagram</a>
                    <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i> Twitter</a>
                </div>
            </div>
            <!-- logo  -->
            <div class="col-sm-6 col-lg-3 col-md-3 logo d-flex flex-column align-items-center">
                <div class="d-flex ">
                    <a href="#"><img src="/images/logo.png" alt="logo"></a>
                </div>
                <p>Telefono: 3270983358 </p>
                <p>Email: dottoriclasse59@yahoo.com</p>
            </div>
            <hr>
            <div class="copyright text-center">
                <p>2022 &copy;Dottori.it, All Rights Reserved</p>
            </div>
        </div>
        <div class="circle-up">
            <a href="#"><i class="fa-solid fa-arrow-up up-up"></i></a>

        </div>

    </div>
</template>
<script>
export default {
    name: 'FooterComponent'

}
</script>
<style lang="scss">
@import '../../sass/variables';
html {
  scroll-behavior: smooth;
}
// CERCHIO CHE TI PORTA SU
.circle-up{

    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: $general-light-blue;

}
.up-up{
   
   line-height: 50px;
   margin-left:19px ;

}



.container-footer{

    width: 100%;
    background-color: $general-black;
    color: $general-light-grey;
    .container-small{

        width: 90%;
        margin: 0 auto;
        text-align: center;
        .info{
            margin-top: 30px;
            hr{
                background-color: $general-light-blue;
                height: 2px;
                width: 20%;
                margin: 0 auto;
            }

            ul{
                text-align: center;
                padding: 0;
                margin-top: 10px;
                li{
                    a{
                        text-decoration: none;
                        color: $general-light-grey;
                        &:hover{
                            color: $general-light-blue;
                        }
                    }
                }
            }
        }
        .contacts{
            margin-top: 30px;
            hr{
                background-color: $general-light-blue;
                height: 2px;
                width: 20%;
                margin: 0 auto;
            }
            ul{
                text-align: center;
                padding: 0;
                margin-top: 10px;
                li{
                    a{
                        text-decoration: none;
                        color: $general-light-grey;
                        &:hover{
                            color: $general-light-blue;
                        }
                    }
                }
            }
        }
        .social{
            margin-top: 30px;
            text-align: center;
            padding: 0;
            hr{
                background-color: $general-light-blue;
                height: 2px;
                width: 20%;
                margin: 0 auto;
            }

            div{
                margin-top: 10px;
                a{
                    text-decoration: none;
                    color: $general-light-grey;
                    &:hover{
                        color: $general-light-blue;
                    }
                }
            }
        }
        .logo{
            margin-top: 30px;
            width: 100%;
            div{
                width: 30%;
                height: 40%;
                img{
                    width: 100%;
                }
            }
        }
        hr{
            background-color: $general-light-blue;
            width: 80%;
            height: 2px;
            margin: 0 auto;
        }
        .copyright{
            width: 100%;
            p{
                margin-top: 20px;
            }
        }

    }
}


</style>
