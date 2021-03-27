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
