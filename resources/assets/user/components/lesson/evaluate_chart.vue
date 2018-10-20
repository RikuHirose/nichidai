<template>
<div id="chartjs-doughnut">

  <div class="card">
    <chartjs-doughnut
      v-bind:labels="labels"
      v-bind:datasets="datasets"
      v-bind:option="option"
      v-bind:bind="true"/>

  </div>
</div>
</template>

<script>
export default {
  props: ['chartData'],

  data() {
    return {
      labels: [],
      datasets: [
        {
          data: [],
          backgroundColor: ["#b388ff", "#82b1ff", "#80d8ff", "red", "blue"],
          hoverBackgroundColor: ["#673ab7", "#2196f3", "#03a9f4", "red", "blue"]
        }
      ],
      option: {}
    };
  },

  created () {

    const keys = Object.keys(this.chartData)
    const labels = []
    const data = []
    this.datasets[0].data = keys.forEach(key => {
      const value = this.chartData[key]
      if (value > 0) {
        labels.push(key)
        data.push(value)
      }
    })
    this.labels = labels
    this.datasets[0].data = data
  }

};
</script>