<style lang="scss" scoped>
    .navbar {
        height:90px;
        position: relative;
    }
    .navbar-item {
        display: inline-block;
    }
    .navbar-brand {
        display: flex;
        align-items: center;
        height:90px;

        .navbar-item {

            margin-left: 160px;
            img {
                max-height: 55px;
            }
            .logo {
                width: 148px;
                height: 55px;
            }
        }
    }
    .navbar-end {
        position: absolute;
        right:0;
        top:0;
        margin-right:111px;
    }
    .navbar-menu {
        list-style: none;
        margin:0;
        padding:0;
        .navbar-item {
            list-style: none;
            padding:0;
            display: inline-block;
            line-height: 90px;
            font-size: 20px;
            a {
                color:black;
                text-decoration: none;
            }
            margin: 0 25px 0 0;
        }
    }
</style>

<template>
    <nav class="navbar">
        <div class="navbar-brand">
            <router-link to="/" class="navbar-item">
                <img class="logo" src="/images/logo.png"/>
            </router-link>
        </div>
        <div class="navbar-end">
            <ul class="navbar-menu">
                <li class="navbar-item" ><router-link to="/">OUR STORY</router-link></li>
                <li class="navbar-item" ><router-link to="/">THE TEAM</router-link></li>
                <li class="navbar-item" ><router-link to="/">JOIN US</router-link></li>
                <li class="navbar-item" ><router-link to="/donate">DONATE</router-link></li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name:'MenuComponent'
    }
</script>