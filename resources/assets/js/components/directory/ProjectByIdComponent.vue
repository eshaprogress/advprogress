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

        .table-header-rotated {
            border-collapse: collapse;
            td {
                width: 30px;
            }
            th {
                padding: 0;

                &.normal {
                    position: relative;
                    > span {
                        position: absolute;
                        bottom:0;
                        text-indent: 10px;
                    }
                }
                &.rotate {
                    height: 140px;
                    white-space: nowrap;
                    position: relative;
                    > div {
                        transform: translate(-45px,-80px) rotate(-49deg);
                        position: absolute;
                        bottom: 0;
                        border-bottom: solid 1px black;
                        width: 226px;
                        text-align: left;
                        font-size: 14px;
                        line-height: 22px;
                        left: 45px;
                    }
                }
                &.row-header {
                    padding: 0 10px;
                    border-bottom: 1px solid black;
                }
            }
            td {
                text-align: center;
                line-height: 35px;
                border: 1px solid black;
                padding: 0 10px;
            }
            td, th {
                &.spacer {
                    border-top: none;
                    border-bottom: none;
                    background-color: white;
                    padding:0;
                }
            }
        }
        table {
            margin-top: 70px;
            border-spacing: 0;
            border-collapse: collapse;

            tr {
                &.pt-row{
                    &:nth-child(odd){
                        background-color: rgba(0,0,0, .1);
                    }
                }
                th {
                    &:nth-child(1) {
                        width:100px;
                    }
                    &:nth-child(2) {
                        width:10px;
                    }
                    &:nth-child(3),
                    &:nth-child(4),
                    &:nth-child(5),
                    &:nth-child(6) {
                        width:50px;
                    }
                    &:nth-child(7) {
                        width:40px;
                    }
                    &:nth-child(8) {
                        width:250px;
                        text-align: left;
                    }
                    &:nth-child(9) {
                        text-align: left;
                        width:700px;
                    }
                }
                td {
                    &:nth-child(1) {
                        font-weight: bold;
                        white-space: nowrap;
                        text-align: right;
                    }
                    &:nth-child(8) {
                        text-align: left;
                    }
                    &:nth-child(9) {
                        text-align: left;
                    }
                }
            }
        }
        .enabled {
            color:var(--red);
        }
        .disabled {
            color:var(--gray);
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
                    <li><router-link :to="{hash:'project-intro'}">Intro</router-link></li>
                    <li><router-link :to="{hash:'project-current-legislation'}">Current Legislation</router-link></li>
                    <li><router-link :to="{hash:'project-proposed-legislation'}">Proposed Legislation</router-link></li>
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
            <article id="project-intro" class="card">
                <h2>Summary</h2>
                <p>
                    {{getProject.model_legislative_summary_text}}
                </p>
            </article>
            <article id="project-current-legislation" class="card">
                <h2>Legislative Body</h2>
                <p>{{getProject.model_legislative_text_body}}</p>
                <!--- add a tag where it searches to see if I have included a custom component, if I have, display it here-->
            </article>
            <article id="project-resources" class="card">
                <h2>Resources</h2>
                <ul>
                    <template v-for="link in getProject.resource.links">
                        <li><a :href="link.url">{{link.url}}</a></li>
                    </template>
                </ul>
            </article>
            <article id="project-proposed-legislation" class="card">
                <h2>Jurisdiction Matrix</h2>

                <table class="table table-header-rotated">
                    <tr>
                        <!-- First column header is not rotated -->
                        <th></th>
                        <th class="spacer"></th>
                        <!-- Following headers are rotated -->
                        <th class="rotate"><div><span>Constitutional Amendment</span></div></th>
                        <th class="rotate"><div><span>Statute</span></div></th>
                        <th class="rotate"><div><span>Case Law</span></div></th>
                        <th class="rotate"><div><span>Executive Order</span></div></th>
                        <th class="spacer"></th>
                        <th class="normal"><span>Source Of Law</span></th>
                        <th class="normal"><span>Citation Source</span></th>
                    </tr>
                    <template v-for="pt in getProject.matrix">
                        <tr :id="pt.state_abbr.toLowerCase()" class="pt-row" :title="pt.state_abbr">
                            <td>{{pt.state}}</td>
                            <td class="spacer"></td>
                            <td><i class="fa fa-check" :class="{enabled:isChecked(pt.b_c_a),disabled:!isChecked(pt.b_c_a)}"></i></td>
                            <td><i class="fa fa-check" :class="{enabled:isChecked(pt.b_s)  ,disabled:!isChecked(pt.b_s)  }"></i></td>
                            <td><i class="fa fa-check" :class="{enabled:isChecked(pt.b_c_l),disabled:!isChecked(pt.b_c_l)}"></i></td>
                            <td><i class="fa fa-check" :class="{enabled:isChecked(pt.b_e_o),disabled:!isChecked(pt.b_e_o)}"></i></td>
                            <th class="spacer"></th>
                            <td>{{pt.s_o_l}}</td>
                            <td>{{pt.c_s}}</td>
                        </tr>
                    </template>
                </table>
            </article>
        </template>
    </main>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name:'ProjectsByCategoryComponent',
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
            },
            makeProjectLink(project)
            {
                return {
                    name:'project-id',
                    params:{
                        projectId:project.id
                    }
                };
            },
            isChecked(value)
            {
                return (value);
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
