<template>

</template>

<script>
export default {

  props: ['lessonId', 'userId'],

  data () {
    return {
    }
  },

  created () {
    // store(this.lessonId, this.userId)
  },

  mounted: function () {
    // this.$emit("store", [this.lessonId, this.userId])
    this.store(this.userId, this.lessonId)
    this.delete(this.userId, this.lessonId)
  },

  methods: {
    store(userId, lessonId) {

      let url = `/api/v1/lessons/${lessonId}/users/${userId}/store`

      axios.post(url,{
        lesson_id: lessonId,
        user_id: userId
      })
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          alert('fail')
        })

    },
    delete(userId, lessonId) {

      let url = `/api/v1/lessons/${lessonId}/users/${userId}/delete`

      axios.post(url,{
        lesson_id: lessonId,
        user_id: userId
      })
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          alert('fail')
        })

    }
  },

}

</script>