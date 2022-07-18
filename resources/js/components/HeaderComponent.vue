<template>
    <div>
        <div class="header-container">
            <b-navbar toggleable="lg" type="dark">
                <b-navbar-brand href="#">
                    <img
                        class="img"
                        src="/images/logo.png"
                        alt=""
                    />
                </b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav>
                        <ul class="d-flex m-3">
                            <li v-for="(item, index) in menu" :key="index">
                                <router-link class="navbar-brand nav-link" :to="{name: item.routeName}">{{item.label}}</router-link>
                            </li>
                        </ul>
                        <!-- <b-navbar-brand href="#">Chi Siamo</b-navbar-brand>
                        <b-navbar-brand href="#">Prestazioni</b-navbar-brand>
                        <b-navbar-brand href="#"
                            >Chiedi al Dottore</b-navbar-brand
                        >
                        <b-navbar-brand href="#">Contatti</b-navbar-brand> -->
                    </b-navbar-nav>

                    <!-- Right aligned nav items -->
                    <b-navbar-nav class="ml-auto">
                        <b-nav-form>
                            <b-form-input
                                size="sm"
                                class="mr-sm-2"
                                placeholder="Search"
                            ></b-form-input>
                            <b-button
                                size="sm"
                                class="my-2 my-sm-0"
                                type="submit"
                                variant="outline-light"
                                >Search</b-button
                            >
                        </b-nav-form>
                        <b-nav-item-dropdown right>
                            <!-- Using 'button-content' slot -->
                            <template #button-content>
                                <em>User</em>
                            </template>
                            <b-dropdown-item href="#"
                                >Registrati</b-dropdown-item
                            >
                            <b-dropdown-item href="#">Accedi</b-dropdown-item>
                        </b-nav-item-dropdown>
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>
        </div>
    </div>
</template>
<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            menu:[
                {
                    label:'Home',
                    routeName:'home'
                },
                {
                    label:'Dottori',
                    routeName:'doctors'
                },
                {
                    label:'Chi Siamo',
                    routeName:'ciao'
                },

            ]
        };
    },
};
</script>
<style lang="scss">
@import "../../sass/variables";
.header-container {
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    z-index: 11000;
}
.navbar {
    background: linear-gradient(
        360deg,
        hsla(251, 42%, 50%, 1) 0%,
        hsla(231, 51%, 60%, 1) 0%
    );

    background: -moz-linear-gradient(
        360deg,
        hsla(251, 42%, 50%, 1) 0%,
        hsla(231, 51%, 60%, 1) 0%
    );

    background: -webkit-linear-gradient(
        360deg,
        hsla(251, 42%, 50%, 1) 0%,
        hsla(231, 51%, 60%, 1) 0%
    );
}

.img {
    width: 150px;
}
</style>
