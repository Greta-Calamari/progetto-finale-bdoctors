<template>
    <div class="nav-bar">
        <b-navbar toggleable="lg" type="dark">
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <img
                        class="img"
                        src="../../../public/img/logodottori.png"
                        alt=""
                    />
                    <b-navbar-brand href="#">Contatti</b-navbar-brand>
                    <b-navbar-brand href="#">Chi siamo</b-navbar-brand>
                    <b-navbar-brand href="#">Prestazioni</b-navbar-brand>
                    <b-navbar-brand href="#">Chiedi al dottore</b-navbar-brand>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <b-nav-form>
                        <b-form-input
                            size="sm"
                            class="mr-sm-2"
                            placeholder="Search"
                        ></b-form-input>
                        <b-button size="sm" class="my-2 my-sm-0" type="submit"
                            >Search</b-button
                        >
                    </b-nav-form>
                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template #button-content>
                            <em>User</em>
                        </template>
                        <b-dropdown-item href="#">Profilo</b-dropdown-item>
                        <b-dropdown-item href="#">Registrati</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>
<script>
export default {
    name: "HeaderComponent",
    data() {
        return {};
    },
};
</script>
<style lang="scss">
@import "../../sass/variables";
.nav-bar {
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

.my-2 {
    background-color: white;
    color: black;
}
.img {
    height: 70px;
    width: 150px;
}
</style>
