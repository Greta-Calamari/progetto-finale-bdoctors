<template>
  <div >
    <ul class="d-flex m-3">
        <li v-for="(item, index) in menu" :key="index">
            <router-link class="navbar-brand nav-link" :to="{name: item.routeName}">{{item.label}}</router-link>
        </li>
    </ul>
  </div>
</template>
<script>
export default {
    name: 'HeaderComponent',
    data(){
        return{
            menu:[
                {
                    label:'Home',
                    routeName:'home'
                },
                {
                    label:'Hello',
                    routeName:'hello'
                },
                {
                    label:'Ciao',
                    routeName:'ciao'
                },
            ]

        }
    }

}
</script>
<style lang="scss">
ul{
    list-style: none;
}



</style>
