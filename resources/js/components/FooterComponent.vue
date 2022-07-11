<template>
    <div class="container-footer">
        <div class="container-small row">
            <!-- Informazioni  -->
            <div class="col-3 info">
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
            <div class="col-3 contacts">
                <h3>Contattaci</h3>
                <hr>
                <ul>
                    <li><a href="#">Chiedi al dottore</a></li>
                    <li><a href="#">Contatti</a></li>
                </ul>
            </div>
            <!-- social -->
            <div class="col-3 social">
                <h3>I nostri social</h3>
                <hr>
                <div class="d-flex flex-column">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i> Instagram</a>
                    <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i> Twitter</a>
                </div>
            </div>
            <!-- logo  -->
            <div class="col-3 logo d-flex flex-column align-items-start">
                <div class="d-flex ">
                    <h1>Logo</h1>
                </div>
                <p>Telefono: 3270983358 </p>
                <p>Email: dottoriclasse59@yahoo.com</p>
            </div>
            <hr>
            <div class="copyright text-center">
                <p>2022 &copy;Dottori.it, All Rights Reserved</p>
            </div>
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
.container-footer{
    min-height: 20vh;
    width: 100%;
    background-color: $general-black;
    color: $general-light-grey;
    .container-small{

        width: 100%;
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
                background-color: rgb(18, 227, 56);
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
