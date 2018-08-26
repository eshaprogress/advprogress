<style lang="scss" scoped>
    .project {
        margin: auto;
        padding: 30px;
        min-height: 420px;

        header {
            margin:0;
            padding:0;
            text-align: center;
        }
        h2 {
            font-size: 30px;
            line-height: 30px;
            text-align: center;
            margin: 0;
            border-bottom: solid 2px var(--green);
            padding: 20px 0 20px;
            color: var(--blue);
        }

        nav {
            --project-height:52px;
            min-height: var(--project-height);
            background-color: var(--blue);
            padding:9px;
            ul {
                margin: 0 auto;
                padding: 0;
                list-style: none;
                display: flex;
                max-width: 800px;
                align-items: center;
                align-content: center;
                height:var(--project-height);
                li{
                    margin:0;
                    padding:9px 0;
                    list-style: none;
                    flex:auto;
                    display: inline-block;
                    text-align: center;
                    height:var(--project-height);
                    a {
                        border-left: solid 2px var(--white);
                        color:var(--white);
                        height:var(--project-height);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 16px;
                        text-decoration: none;
                        span {}
                        &.router-link-active {
                            color:var(--blue);
                            background-color: white;
                        }
                    }
                    &:last-child {
                        a {
                            border-right: solid 2px var(--white);
                        }
                    }
                }
            }
        }

        article {
            padding:0;
            max-width: 1150px;
            margin: 10px auto;
        }



        .img-banner-container {
            height: 200px;
            margin: 20px auto;
            max-width: 1150px;
            .img-banner {
                background-color: var(--white1);
            }
        }
    }

</style>

<template>
    <main class="project">
        <template v-if="isProjectLoading">
            <loader>
                Loading ....
            </loader>
        </template>
        <template v-else>
            <header>
                <h1>{{getProject.title}}</h1>
            </header>
            <nav>
                <ul>
                    <li><router-link :to="{name:'project-intro'}">Intro</router-link></li>
                    <li><router-link :to="{name:'project-status'}">Current Status</router-link></li>
                    <li><router-link :to="{name:'project-proposed-legislation'}">Proposed Legislation</router-link></li>
                    <li><router-link :to="{name:'project-current-legislation'}">Current Legislation</router-link></li>
                </ul>
            </nav>
            <div class="img-banner-container">
                <template v-if="hasBannerImg(getProject)">
                    <img :src="getProject.img_banner" alt="">
                </template>
                <template>
                    <img-placeholder>Upload Banner</img-placeholder>
                </template>
            </div>
            <router-view name="standard"></router-view>
        </template>
    </main>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name:'ProjectsByIdComponent',
        methods:{
            ...mapActions([
                'fetchProject'
            ]),
            hasBannerImg(project)
            {
                if(project.img_banner === undefined) return false;
                if(project.img_banner === null) return false;

                if(project.img_banner.length)
                    return true;

                return false;
            }
        },
        computed:{
            ...mapGetters([
                'getProject',
                'isProjectLoading',
            ])
        },
        mounted()
        {
            console.log(this.$route);
            this.fetchProject({projectId:this.$route.params.projectId});
        }
    }
</script>
