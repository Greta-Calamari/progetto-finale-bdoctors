<template>
    <div>
        <!-- titolo nella home -->
        <div>
          <h1>Home pageee</h1>

          <carousel>

    <template slot="prev"><span class="prev">prev</span></template>

    //

    <template slot="next"><span class="next">next</span></template>

</carousel>

        </div>
        <!-- carosello -->


    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'

export default {
    name: 'HomeComponent',
    components: { carousel },
    
    data(){
        return{
            


        }
    }
}
</script>
<style lang="scss">

</style>
