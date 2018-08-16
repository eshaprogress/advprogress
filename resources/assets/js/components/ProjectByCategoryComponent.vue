<style lang="scss" scoped>
    .projects {
        .projects-outer-container {
            margin:auto;
            max-width: 1260px;

            .projects-inner-container {
                display: flex;
                align-items: center;
                justify-content: left;
                align-content: center;
                margin: auto;
                padding: 30px;
                min-height: 420px;
                flex-flow: row wrap;
            }
        }

        a {
            text-decoration: none;
            margin: 15px;
            display: inline-block;

            .card {
                background-color: var(--white1);
                padding: 10px;
                margin: 0;
                width: 350px;

                .img {
                    height: 260px;
                    background-color: var(--white);
                    border:solid 1px var(--white2);
                }
                .content {
                    .title {
                        vertical-align: center;
                        height: 40px;
                        font-size: 16px;
                        font-weight: bold;
                        font-style: normal;
                        font-stretch: normal;
                        letter-spacing: normal;
                        padding: 0;
                        display: block;
                        line-height: 18px;
                        margin: 10px 5px 0;
                        color:var(--blue);
                    }
                    .body {
                        height:150px;
                        overflow: hidden;
                        margin: 0;
                        padding: 5px;
                        color:var(--black);
                        font-size: 16px;
                    }
                }
            }
        }
    }

</style>

<template>
    <main class="projects">
        <template v-if="isProjectsLoading">
            Loading Projects ....
        </template>
        <template v-else>
            <div class="projects-outer-container">
                <div class="projects-inner-container">
                    <template v-for="project in getProjects">
                        <router-link :to="makeProjectLink(project)">
                            <article class="card">
                                <div class="img"><img :src="project.card_img" alt=""></div>
                                <div class="content">
                                    <h4 class="title">{{project.title}}</h4>
                                    <p class="body">{{project.model_legislative_summary_text | truncate(225, '...')}}</p>
                                </div>
                            </article>
                        </router-link>
                    </template>
                </div>
            </div>
        </template>
    </main>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name:'ProjectsByCategoryComponent',
        methods:{
            ...mapActions([
                'fetchProjects'
            ]),
            makeProjectLink(project)
            {
                return {
                    name:'project-id',
                    params:{
                        projectId:project.id
                    }
                };
            }
        },
        computed:{
            ...mapGetters([
                'getProjects',
                'isProjectsLoading',
            ])
        },
        watch: {
            '$route.params.categoryId'(categoryId) {
                this.fetchProjects({categoryId:categoryId});
            },
        },
        filters:{
            // borrowed from: vue-truncate-filter, need to customize possibly.
            truncate:(text, length, clamp) => {

                text = text || '';
                clamp = clamp || '...';
                length = length || 30;

                if (text.length <= length) return text;

                let tcText = text.slice(0, length - clamp.length);
                let last = tcText.length - 1;


                while (last > 0 && tcText[last] !== ' ' && tcText[last] !== clamp[0]) last -= 1;

                // Fix for case when text dont have any `space`
                last = last || length - clamp.length;

                tcText =  tcText.slice(0, last);

                return tcText + clamp;
            }
        },
        beforeRouteUpdate (to, from, next)
        {
            console.log('beforeRouteUpdate: to',to, 'from', from);
            this.fetchProjects({categoryId:to.params.categoryId});
            next();
        },
        beforeRouteEnter(to, from, next)
        {
            next(vm=>{
                console.log('beforeRouteEnter: to',to, 'from', from);
                vm.fetchProjects({categoryId:to.params.categoryId});
            });
        },
        beforeRouteLeave(to, from, next)
        {
            console.log('beforeRouteLeave: to',to, 'from', from);
            next();
        },
        mounted()
        {
            console.log(this.$route);
            // this.fetchProjects({categoryId:null});
        }
    }
</script>
