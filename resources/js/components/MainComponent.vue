<template>
    <div class="margin">
         <router-view></router-view>
    </div>


</template>
<script>
export default {
    name: 'MainComponent',
    data(){
        return {

        }
    }

}
</script>
<style lang="scss">
    .margin{
        margin-top: 110px;
        min-height: 40vh;
    }
</style>
