







// // now ui kit
// import '../lib/now-ui-kit'

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// import Vue from 'vue'
// import { i18n } from '~/common/plugins/i18n'

// import '~/common/plugins'
// import '~/common/components'

// import data from '~/common/utils/data'
// import util from '~/common/utils/util'

// import EvaluateChart from './components/lesson/evaluate_chart.vue'

// Vue.component('EvaluateChart', require('./components/EvaluateChart.vue'));
// new Vue({
//   i18n,

//   directives: {
//     'sticky': VueSticky,
//     HideByScroll
//   },

//   components: {
//     // for detail
//     EvaluateChart,
//   },

//   data: {
//     data,
//     isPC: true,
//     // for detail
//     showGalleryModal: false,
//     galleryIndex: -1,
//     // for detail preview photo
//     selectedJobPhoto: null,
//   },

//   watch: {
//   },

//   created () {
//     // for detail
//     this.galleryModalBus = new Vue()
//   },

//   mounted () {
//     // resize event
//     this.onResize()
//     window.addEventListener('resize', () => this.onResize())
//   },

//   methods: {
//     onResize () {
//       this.isPC = util.isPC()
//     },

//     // For detail photo gallery
//     onClickGallery (index) {
//       // the first index is for cover photo
//       this.galleryIndex = index !== undefined ? index : 0
//       this.showGalleryModal = true
//     },

//     // for detail photo preview
//     onClickJobPhotoCard (jobPhoto) {
//       this.selectedJobPhoto = jobPhoto
//     },

//     share (type) {
//       switch (type) {
//         case 'mail':
//           util.shareMail()
//           break
//         case 'fb':
//           util.shareFacebook()
//           break
//         case 'tw':
//           util.shareTwitter()
//           break
//         case 'line':
//           util.shareLine()
//           break
//       }
//     },
//   }

// }).$mount('#app')

