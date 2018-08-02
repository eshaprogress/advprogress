<style lang="scss" scoped>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background-color: white;
        box-shadow: 3px 3px 7px rgba(0,0,0,.1);
        .navbar-top {
            display: flex;
            justify-content: space-between;
            .left, .right {
                margin: 0 10px;
            }

            .navbar-btn {
                margin: 0;

                button {
                    border: none;
                    margin: 0;
                    padding: 0;
                    border-radius: 25px;
                    font-size: 30px;
                    height: 50px;
                    width: 50px;
                    display: inline-block;
                    background-color: transparent;
                }
            }

            .nav-bar-logo {
                .logo {
                    width: 65px;
                    height: 22px;
                    padding-left: 20px;
                }
            }
        }

        .nav-bar-logo,
        .navbar-btn {
            line-height: 72px;
            height: 72px;
        }

        .navbar-menu {
            background-color: white;
            padding: 0;
            margin: 0;
            display: none;
            align-items: center;
            flex-flow: column;
            .navbar-item {
                font-size: 24px;
                margin: 0;
                list-style: none;
                padding: 0;
                display: block;
                width: 100%;
                & > a{
                    color: black;
                    text-decoration: none;
                    line-height: 50px;
                    display: block;
                    text-align: center;
                }
            }
        }

        &.menu-enabled {
            .navbar-menu {
                display: flex;
            }
            bottom: 0;
        }
    }
</style>

<template>
    <nav class="navbar" :class="{'menu-enabled':isMenuEnabled}">
        <div class="navbar-top">
            <div class="left">
                <router-link to="/" class="nav-bar-logo">
                    <img class="logo" src="/images/logo.png"/>
                </router-link>
            </div>
            <div class="right">
                <div class="navbar-btn">
                    <button @click="menuEnabled" type="button">
                        <template v-if="isMenuEnabled">
                            X
                        </template>
                        <template v-else>
                            <i class="fas fa-bars icon"></i>
                        </template>
                    </button>
                </div>
            </div>
        </div>
        <ul class="navbar-menu">
            <li class="navbar-item" ><router-link @click.native="menuEnabled" to="/">HOME</router-link></li>
            <li class="navbar-item" ><router-link @click.native="menuEnabled" to="/our-story">OUR STORY</router-link></li>
            <li class="navbar-item" ><router-link @click.native="menuEnabled" to="/projects">PROJECTS</router-link></li>
            <li class="navbar-item" ><router-link @click.native="menuEnabled" to="/consultation">CONSULTATION</router-link></li>
            <li class="navbar-item" ><router-link @click.native="menuEnabled" to="/donate">DONATE</router-link></li>
            <li class="navbar-item" ><router-link @click.native="menuEnabled" to="/contact-us">CONTACT US</router-link></li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name:'MenuMobileComponent',
        data(){
            return {
                isMenuEnabled:false
            }
        },
        methods:{
            menuEnabled()
            {
                this.isMenuEnabled = !this.isMenuEnabled;
            }
        }
    }
</script>