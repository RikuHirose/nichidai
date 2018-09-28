<template>
    <a v-if="!favorited" class="btn btn-primary btn-go" @click="favorite(lessonId)">お気入りに追加する</a>
    <a v-else class="btn btn-primary btn-go" @click="unFavorite(lessonId)">お気入りに追加しました</a>
</template>

<script>
export default {

  props: ['lessonId', 'defaultFavorited'],

  data () {
    return {
      favorited: false
    }
  },

  created () {
    // let url = `/lesson/${this.lessonId}/review`
    this.favorited = this.defaultFavorited
  },

  methods: {
    favorite (lessonId) {
      // let url = `/api/v1/lessons/${this.lessonId}/favorite`
      // const _token = $('meta[name="csrf-token"]').attr('content')
      let url = `/lessons/${this.lessonId}/favorite`

      axios.post(url)
        .then(response => {
          this.favorited = true
        })
        .catch(error => {
          alert('fail')
        })
    },
    unFavorite (lessonId) {
      let url = `/lessons/${this.lessonId}/delete/favorite`

      axios.post(url)
        .then(response => {
          this.favorited = false
        })
        .catch(error => {
          alert('fail')
        })
    },
  }

}
</script>