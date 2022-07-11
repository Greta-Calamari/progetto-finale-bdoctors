<template>
    <div>
        <!-- header  -->
        <header>
            <header-component/>
        </header>
        <!-- main  -->
        <main>
            <main-component/>
        </main>
        <!-- footer  -->
        <footer>
            <footer-component/>
        </footer>
    </div>
</template>

<script>
import FooterComponent from '../components/FooterComponent.vue'
import HeaderComponent from '../components/HeaderComponent.vue'
import MainComponent from '../components/MainComponent.vue'
import HomeComponent from '../pages/HomeComponent.vue'
export default {
    name: "App",
    components: {
        HomeComponent,
        HeaderComponent,
        FooterComponent,
        MainComponent

    }
}
</script>
