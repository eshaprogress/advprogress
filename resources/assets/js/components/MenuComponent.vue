<style lang="scss" scoped>
    .navbar-advprogress {
        --nav-bar-height:72px;
        .navbar-container-advprogress {
            position: relative;
            max-width: 1150px;
            margin:auto;
        }
        height:var(--nav-bar-height);
        .navbar-item-advprogress {
            display: inline-block;
        }
        .navbar-brand-advprogress {
            display: flex;
            align-items: center;
            height:var(--nav-bar-height);

            .navbar-item-advprogress {

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
        .navbar-end-advprogress {
            position: absolute;
            right:0;
            top:0;
            margin-right:103px;
        }

        .navbar-menu-advprogress {
            list-style: none;
            margin:0;
            padding:0;
            .navbar-item-advprogress {
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
    <nav class="navbar-advprogress">
        <div class="navbar-container-advprogress">
            <div class="navbar-brand-advprogress">
                <router-link to="/" class="navbar-item-advprogress">
                    <img class="logo" src="/images/logo.png"/>
                </router-link>
            </div>
            <div class="navbar-end-advprogress">
                <ul class="navbar-menu-advprogress">
                    <li class="navbar-item-advprogress"><router-link :to="{name: 'home-root'}" exact>Home</router-link></li>
                    <li class="navbar-item-advprogress"><router-link :to="{name: 'our-story'}">OUR STORY</router-link></li>
                    <li class="navbar-item-advprogress"><router-link :to="{name: 'directory-root'}">DIRECTORY</router-link></li>
                    <li class="navbar-item-advprogress"><router-link :to="{name: 'consultation'}">CONSULTATION</router-link></li>
                    <li class="navbar-item-advprogress"><router-link :to="{name: 'donate'}">DONATE</router-link></li>
                    <li class="navbar-item-advprogress"><router-link :to="{name: 'volunteer'}">VOLUNTEER</router-link></li>
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
