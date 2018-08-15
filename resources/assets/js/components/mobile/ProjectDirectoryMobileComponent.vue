<style lang="scss" scoped>
    .projects-section {
        padding: 20px;
    }
    .container {
        margin:auto;
        max-width: none;
    }
    h2 {
        color:var(--blue);
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

    .categories {
        --project-height:52px;
        background-color: var(--blue);
        height:var(--project-height);
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
                &.active {
                    background-color:var(--white);
                    a {
                        color:var(--blue);
                    }
                }
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
                    span {}
                }
                &:last-child {
                    a {
                        border-right: solid 2px var(--white);
                    }
                }
            }
        }
    }

    .projects {
        display: flex;
        align-items: center;
        justify-content: center;
        align-content: center;
        flex-flow: row;
        margin: auto;
        padding: 30px;
        min-height: 420px;

        .card {
            background-color: var(--white1);
            padding: 10px;
            margin: 0 15px;
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

</style>

<template>
    <section class="section projects-section">
        <div class="container">
            <h2>PROJECTS</h2>
            <nav class="categories">
                <template v-if="isCategoriesLoading">
                    Loading Categories ....
                </template>
                <template v-else>
                    <ul>
                        <template v-for="cat in categories">
                            <li><router-link :to="makeCategoryRoute(cat)"><span>{{cat.category}}</span></router-link></li>
                        </template>
                    </ul>
                </template>
            </nav>
            <main class="projects">
                <template v-if="isProjectsLoading">
                    Loading Projects ....
                </template>
                <template v-else>
                    <template v-for="proj in projects">
                        <article class="card">
                            <div class="img"><img :src="proj.card_img" alt=""></div>
                            <div class="content">
                                <h4 class="title">{{proj.title}}</h4>
                                <p class="body">{{proj.model_legislative_summary_text | truncate(225, '...')}}</p>
                            </div>
                        </article>
                    </template>
                </template>
            </main>
        </div>
    </section>
</template>

<script>
    import axios from 'axios';

    export default {
        name:'ProjectDirectoryMobileComponent',
        data()
        {
            return {
                categories:[],
                isCategoriesLoading:false,
                projects:[],
                isProjectsLoading:false
            }
        },
        methods:{
            makeCategoryRoute:(cat) => {
                return `/projects/${cat.id}/category`;
            },
            fetchCategories:async () => {
                let fetch = await axios.get('/api/categories');
                let {categories} = fetch.data;
                return categories;
            },
            fetchProjects:async () => {
                let fetch = await axios.get('/api/project/featured');
                let {projects} = fetch.data;
                return projects;
            }
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
        mounted()
        {
            this.isCategoriesLoading = true;
            this.fetchCategories().then(categories=>{
                this.categories = categories;
                this.isCategoriesLoading = false;
            }).catch(error=>{
                console.error(error);
                this.isCategoriesLoading = false;
            });

            this.isProjectsLoading = true;
            this.fetchProjects().then(projects=>{
                this.projects = projects;
                this.isProjectsLoading = false;
            }).catch(error=>{
                console.error(error);
                this.isProjectsLoading = false;
            });
        }
    }
</script>
