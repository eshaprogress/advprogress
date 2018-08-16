<style lang="scss" scoped>
    .navbar {
        --nav-bar-height:72px;
        .navbar-container {
            position: relative;
            max-width: 1150px;
            margin:auto;
        }
        height:var(--nav-bar-height);
        .navbar-item {
            display: inline-block;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            height:var(--nav-bar-height);

            .navbar-item {

                margin-left: 106px;
                img {
                    max-height: 55px;
                }
                .logo {
                    width: 118px;
                    height: 44px;
                }
            }
        }
        .navbar-end {
            position: absolute;
            right:0;
            top:0;
            margin-right:103px;
        }

        .navbar-menu {
            list-style: none;
            margin:0;
            padding:0;
            .navbar-item {
                list-style: none;
                padding:0;
                display: inline-block;
                line-height: var(--nav-bar-height);
                font-size: 16px;

                a {
                    color:var(--black);
                    text-transform: uppercase;
                    text-decoration: none;
                    &.router-link-exact-active,
                    &.router-link-active {
                        color:var(--green);
                    }
                }
                margin: 0 40px 0 0;
            }
        }
    }
</style>

<template>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-brand">
                <router-link to="/" class="navbar-item">
                    <img class="logo" src="/images/logo.png"/>
                </router-link>
            </div>
            <div class="navbar-end">
                <ul class="navbar-menu">
                    <li class="navbar-item" ><router-link :to="{name: 'home-root'}" exact>Home</router-link></li>
                    <li class="navbar-item" ><router-link :to="{name: 'our-story'}">OUR STORY</router-link></li>
                    <li class="navbar-item" ><router-link :to="{name: 'directory-root'}">DIRECTORY</router-link></li>
                    <li class="navbar-item" ><router-link :to="{name: 'consultation'}">CONSULTATION</router-link></li>
                    <li class="navbar-item" ><router-link :to="{name: 'donate'}">DONATE</router-link></li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name:'MenuComponent'
    }
</script>