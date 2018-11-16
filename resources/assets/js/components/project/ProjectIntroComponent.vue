
<style lang="scss" scoped>
    article {
        padding:0;
        max-width: 1150px;
        margin: 10px auto;
        h2 {
            font-size: 30px;
            line-height: 30px;
            text-align: center;
            margin: 0;
            border-bottom: solid 2px var(--green);
            padding: 20px 0 20px;
            color: var(--blue);
        }
    }
    .title2 {
  position: relative;
  top: 0px;
  right: 80px;
  font-weight: 800;
  font-size: 20px;
  font-family: georgia;
  text-align: right;
  right-margin: 20px;
}
@media only screen and (max-width: 550px) {
  .title2 {
    position: relative;
    padding: 20px;
    text-align: center;
    right: 0px;
    font-size: 18px;
  } }
.fancy-title {
    position: relative;
  text-align: center;
  padding: 40px;
  font-weight: 800;
  font-size: 30px;
  spacing: 10px;
  font-family: georgia;
}
.virginia{
  position: relative;
  top: 40px;
  display: block;
    margin-left: auto;
    margin-right: auto;
  width: 220px;
}
.virginia:hover {
  opacity: .4; }
.prisoners{
  padding: 20px;
  position: relative;
  top: 10px;
  display: block;
    margin-left: auto;
    margin-right: auto;
  width: 800px;
}
.prisoners:hover {
  opacity: .4; }
.article-text{
  margin-top: 0px;
  line-height: 2;
  padding: 80px;
   text-align: justify;
  font-family: helvetica;
  font-weight: 400;
}
.tagline1{
  position: relative;
top: -30px;
  margin: 20px;
   text-align: center;
  font-family: helvetica;
  font-weight: 400;
}
.article2{
  margin-top: 0px;
  margin: 40px;
   text-align: center;
  font-family: helvetica;
  font-weight: 400;
}
.penn{
  position: relative;
  top: 30px;
   display: block;
    margin-left: auto;
    margin-right: auto;
  width:200px;
}
.penn:hover {
  opacity: .4; }
.florida{
  position: relative;
  top: 20px;
   display: block;
    margin-left: auto;
    margin-right: auto;
  width: 200px;
}
.florida:hover {
  opacity: .4; }
.cali{
  position: relative;
  top: 30px;
   display: block;
    margin-left: auto;
    margin-right: auto;
  width: 200px;
}
.cali:hover {
  opacity: .4; }
</style>

<template>
    <article class="card">
        <template v-if="isProjectLoading">
            <loader>
                Loading ....
            </loader>
        </template>
        <template v-else>
            <h2 title="Project Too Long Didn't Read">Project TLDR</h2>
            <div v-html="getProject.short_summary"></div>
            <hr>
            <h2 title ="Why"> Why </h2>
          <hr>


          <ProjectMapComponent/>
        </template>
    </article>
</template>

<script>

    import {mapGetters, mapActions} from 'vuex';
      import ProjectMapComponent from './ProjectMapComponent';
    export default {
        name:'ProjectsIntroComponent',

        components:{
          ProjectMapComponent
        },
        computed:{
            ...mapGetters([
                'getProject',
                'isProjectLoading',
            ])
        }
    }
</script>
