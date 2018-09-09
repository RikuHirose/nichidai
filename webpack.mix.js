// const {mix} = require('laravel-mix');

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */

// mix.react('resources/assets/admin/src/app.js', 'public/static/admin/js')
//   .js('resources/assets/user/src/app.js', 'public/static/user/js')
//   .sass('resources/assets/admin/scss/app.scss', 'public/static/admin/css')
//   .sass('resources/assets/user/scss/app.scss', 'public/static/user/css')
//   .sourceMaps()
//   .copy( 'resources/assets/admin/images/', 'public/static/admin/images/' )
//   .copy( 'resources/assets/user/images/', 'public/static/user/images/' )
//   .copy( 'node_modules/font-awesome/fonts/', 'public/static/user/fonts/' )
//   .version();



// const path = require('path')
// const webpack = require('webpack')
// const mix = require('laravel-mix')
// // const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */

// mix.webpackConfig({
//   plugins: [
//     // new BundleAnalyzerPlugin(),
//     new webpack.ProvidePlugin({
//       $: 'jquery',
//       jQuery: 'jquery',
//       'window.jQuery': 'jquery',
//       Popper: ['popper.js', 'default']
//     })
//   ],
//   resolve: {
//     alias: {
//       '~': path.join(__dirname, './resources/assets/js')
//     }
//   }
// })

// // webpack.mix.js
// mix
//   .options({
//     processCssUrls: false,
//     uglify: {
//       parallel: true
//     }
//   })

//   .js('resources/assets/user/src/app.js', 'public/static/user/js')
//   .sass('resources/assets/admin/scss/app.scss', 'public/static/admin/css')
//   .sass('resources/assets/user/scss/app.scss', 'public/static/user/css')
//   // .sourceMaps()
//   .copy( 'resources/assets/admin/images/', 'public/static/admin/images/' )
//   .copy( 'resources/assets/user/images/', 'public/static/user/images/' )
//   .copy( 'node_modules/font-awesome/fonts/', 'public/static/user/fonts/' )
//   // .version();

//   .sourceMaps(false)
//   .disableNotifications()
//   .extract([
//     'jquery',
//     'vue',
//     'vue-i18n'
//   ])

//   .version()




let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/assets/user/src/app.js', 'public/static/user/js')
  .sass('resources/assets/admin/scss/app.scss', 'public/static/admin/css')
  .sass('resources/assets/user/scss/app.scss', 'public/static/user/css')
  // .sourceMaps()
  .copy( 'resources/assets/admin/images/', 'public/static/admin/images/' )
  .copy( 'resources/assets/user/images/', 'public/static/user/images/' )
  .copy( 'node_modules/font-awesome/fonts/', 'public/static/user/fonts/' )
