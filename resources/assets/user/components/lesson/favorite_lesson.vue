<template>
  <a class="btn btn-primary btn-go" href="">お気入りに追加する</a>
</template>

<script>

export default {
  props: ['lessonId'],

  data() {
    return {
      labels: [],
      datasets: [
        {
          data: [],

        }
      ],
      option: {}
    };
  },
  async created () {
    const url = `/lesson/${this.lessonId}/review`
    console.log(url)
  },

};
</script>