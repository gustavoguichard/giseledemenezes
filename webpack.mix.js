const mix = require('laravel-mix')

mix
  .postCss('src/theme.css', 'css', [
    require('autoprefixer'),
    require('@tailwindcss/jit'),
    require('postcss-nested'),
    require('cssnano'),
  ])
  .options({
    processCssUrls: false,
  })
  .browserSync({
    proxy: 'http://localhost/giseledemenezes',
    files: [
      './js/**/*.js',
      './css/**/*.css',
      './images/**/*.+(png|jpg|svg)',
      './**/*.+(html|php)',
      './templates/**/*.+(html|twig)',
    ],
  })
