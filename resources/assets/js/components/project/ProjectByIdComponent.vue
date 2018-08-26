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
            color: var(--blue);
            font-size: 32px;
            font-weight: bold;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            text-align: center;
            margin: 0;
            padding: 32px 0;
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
                <h2>{{getProject.title}}</h2>
            </header>
            <project-nav-component />
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
    import ProjectNavComponent from './ProjectNavComponent';
    export default {
        name:'ProjectsByIdComponent',
        components:{
            ProjectNavComponent
        },
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
