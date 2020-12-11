module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        dark: {
          100: '#363636',
          200: '#333333',
          300: '#2e2e2e',
          400: '#2c2c2c',
          500: '#272727',
          600: '#252525',
          700: '#232323',
          800: '#1e1e1e',
          900: '#121212'
        }
      },
    },
  },
  variants: {
    extend: {
      textColor: ['responsive', 'hover', 'focus', 'group-hover'],
      opacity: ['responsive', 'hover', 'focus', 'group-hover'],
    },
  },
  plugins: [],
}
