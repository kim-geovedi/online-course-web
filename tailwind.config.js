/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            'primary': '#8C71F7',
        },
        backgroundImage: {
            'hero-pattern': "url('assets/background/Hero-Banner.png')",
            'footer-texture': "url('/img/footer-texture.png')",
          },

      },
    },
    plugins: [],
  }
