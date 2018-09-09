<template>
<div>
  {{ test }}
  <div class="card">
    <chartjs-doughnut v-bind:labels="labels"
      v-bind:datasets="datasets"
      v-bind:option="option"
      v-bind:bind="true"/>
  </div>
</div>
</template>

<script>
export default {
  props: {
    test: String,
  },
  data() {
    return {
      labels: ["Foo", "Bar", "Baz"],
      datasets: [
        {
          data: [10, 20, 40],
          backgroundColor: ["#b388ff", "#82b1ff", "#80d8ff"],
          hoverBackgroundColor: ["#673ab7", "#2196f3", "#03a9f4"]
        }
      ],
      option: {}
    };
  }
};
</script>