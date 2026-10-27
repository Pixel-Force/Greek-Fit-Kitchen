/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './*.php',
    './template-parts/**/*.php',
    './inc/**/*.php',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        greek: {
          navy: '#0C2B54',
          midnight: '#071526',
          card: '#0E223D',
          gold: '#F5BA13',
          goldHover: '#DE9B08',
          lime: '#82B82A',
          limeHover: '#6EA31E',
          cream: '#F9F8F5',
          slate: '#1E293B',
        }
      }
    },
  },
  plugins: [],
}
