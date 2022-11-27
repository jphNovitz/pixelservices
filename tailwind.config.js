/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./assets/**/*.vue",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero': "linear-gradient(rgba(248, 250, 252, .8), rgba(248, 250, 252, 0.6), rgba(248, 250, 252, 1))",
        'hero-mobile': "linear-gradient(rgba(248, 250, 252, .6), rgba(248, 250, 252, 1)), url('images/liegeunsplash-s.webp')",
        'hero-md': "linear-gradient(rgba(248, 250, 252, .8), rgba(248, 250, 252, 0.6), rgba(248, 250, 252, 1)), url('images/liegeunsplash-md.webp')",
      }
    },
  },
  plugins: [],
}
