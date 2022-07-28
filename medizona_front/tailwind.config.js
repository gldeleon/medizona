/** @type {import('tailwindcss').Config} */
module.exports = {
  variants: {
    extend: {
      opacity: ["disabled"],
      cursor: ["disabled"],
    },
  },
  content: [],
  theme: {
    extend: {},
  },
  plugins: [require("@tailwindcss/forms")],
}
 