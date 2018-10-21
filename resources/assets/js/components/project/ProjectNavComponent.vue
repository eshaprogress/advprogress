<template>
    <nav>
        <ul>
            <li><router-link :to="{name:'project-intro'}">Intro</router-link></li>
          <li><router-link :to="{name:'project-status'}">Current Status</router-link></li>
            <li><router-link :to="{name:'model-legislation-list'}">Model Legislation</router-link></li>
          <!--- <li><router-link :to="{name:'project-current-legislation'}">Resources</router-link></li> -->
        </ul>
    </nav>
</template>

<style lang="scss" scoped>
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

</style>
