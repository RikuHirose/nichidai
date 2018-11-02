<template>
    <a v-if="!baned" class="btn btn-primary btn-go" @click="ban()">BAN</a>
    <a v-else class="btn btn-primary btn-go" @click="unBan()">BAN解除</a>
</template>

<script>
export default {

  props: ['review', 'defaultBaned'],

  data () {
    return {
      baned: false,
    }
  },

  created () {
    // let url = `/lesson/${this.reviewId}/review`
    this.baned = this.defaultBaned
  },

  methods: {
    ban () {
      let url = `/admin/reviews/${this.review.id}/ban`

      axios.post(url,{
      })
        .then(response => {
          this.baned = response.data.baned
        })
        .catch(error => {
          alert('fail')
        })
    },
    unBan () {
      let url = `/admin/reviews/${this.review.id}/unBan`
      let userId = this.userId

      axios.post(url,{
      })
        .then(response => {
          this.baned = response.data.baned
        })
        .catch(error => {
          alert('fail')
        })
    },
  }

}
</script>