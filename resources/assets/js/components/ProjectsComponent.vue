<style lang="scss" scoped>
    .projects {
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

</style>

<template>
    <section class="section projects">
        <div class="container">
            <h2>PROJECTS</h2>
            <nav class="categories">
                <ul>
                    <li class="active"><a href="#"><span>category1</span></a></li>
                    <li><a href="#"><span>category2</span></a></li>
                    <li><a href="#"><span>category3</span></a></li>
                    <li><a href="#"><span>category4</span></a></li>
                    <li><a href="#"><span>category5</span></a></li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>
    import data from '../data/projects.json';

    export default {
        name:'OurStoryComponent',
        data(){
            return {
                projects:data
            }
        }
    }
</script>
