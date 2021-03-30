const colors = require('tailwindcss/colors')

module.exports = {
  purge: ['./views/**/*.twig', './templates/**/*.twig', './*.php'],
  darkMode: 'media',
  theme: {
    extend: {
      colors: {
        rose: {
          ...colors.rose,
          50: '#f7f3f7',
          600: '#be322d',
          900: '#732322',
        },
        gray: {
          ...colors.warmGray,
          50: '#f9f8f5',
        },
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
