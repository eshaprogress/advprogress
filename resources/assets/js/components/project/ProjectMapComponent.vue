<template>
<div class ="columns">
  <div class ="column is-6">
  <chart :type="'pie'" :data="data" :options="options"></chart>
</div>
<div class ="column is-6">
    Description
</div>
</div>
</template>

<script>


export default {
name:'ProjectMapComponent',

  data () {
    return {
      data: {
        labels: ['Imprisoned','Felony Disenfranchisement'],
          datasets: [{
          data: [20, 40, 5, 35],
          backgroundColor: [
            '#1fc8db',
            '#fce473',
            '#42afe3',
            '#ed6c63',
            '#97cd76'
          ]
        }]
      },
      options: {
        segmentShowStroke: false
      }
    }
  }
}
</script>
