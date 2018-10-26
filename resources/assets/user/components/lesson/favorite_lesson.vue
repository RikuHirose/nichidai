<template>
  <p class="btn-wrap">
    <a v-if="!favorited" class="btn btn-go add_fav" @click="favorite(lessonId)">
      <span class="fas fa-star fav-btn-star"></span>お気入りに追加する
    </a>
    <a v-else class="btn btn-go remove_fav" @click="unFavorite(lessonId)">
      <span class="fas fa-star fav-btn-star"></span>お気入りに追加しました
    </a>
  </p>
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