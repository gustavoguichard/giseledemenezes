const colors = require('tailwindcss/colors')

module.exports = {
  purge: ['./views/**/*.twig', './templates/**/*.twig', './*.php'],
  darkMode: 'media',
  theme: {
    extend: {
      colors: {
        rose: colors.rose,
        gray: colors.warmGray,
      },
      fontFamily: {
        cursive: ['Tangerine', 'cursive'],
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [require('@tailwindcss/typography')],
}
