<template>
    <a v-if="!favorited" class="btn btn-primary btn-go" @click="favorite(lessonId)">お気入りに追加する</a>
    <a v-else            class="btn btn-primary btn-go" @click="unFavorite(lessonId)">お気入りに追加しました</a>
</template>

<script>
Vue.prototype.$http = axios;
export default {
  props: ['lessonId', 'favorited'],

  data() {
    return {
      url: '',
    };
  },
  created () {
    // let url = `/lesson/${this.lessonId}/review`

  },
  methods: {
    favorite(lessonId) {
      // let url = `/api/v1/lessons/${this.lessonId}/favorite`
      let url = `/lessons/${this.lessonId}/favorite`
      const _token = $('meta[name="csrf-token"]').attr('content');

      axios.post(url)
        .then(response => {
          this.favorited = true
        })
        .catch(error => {
          alert('fail');
        });
    },
    unFavorite(lessonId) {
      let url = `/lessons/${this.lessonId}/delete/favorite`

      axios.post(url)
        .then(response => {
          this.favorited = false
        })
        .catch(error => {
          alert('fail');
        });
    },
  }

};
</script>