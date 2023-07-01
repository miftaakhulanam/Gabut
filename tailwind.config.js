
/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')
module.exports = {
  content: ["./src/**/*.{html,js,php}","./*.{html,js,php}","./public/**/*.{html,js,php}","./**/*.{html,js,php}"],
  darkMode: "class",
  theme: {
    container: {
      center: true,
      padding: "2rem",
    },
    extend: {
      boxShadow: {
        best: "0px 2px 5px -1px rgba(50, 50, 93, 0.25),  0px 1px 3px -1px rgba(0, 0, 0, 0.3)",
        best4: "0px 2px 5px -1px rgba(255, 255, 255, 0.25),  0px 1px 3px -1px rgba(255, 255, 255, 0.3)",
        best2: "rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset",
        best3: "rgba(0, 0, 0, 0.35) 0px -7px 9px -7px inset;",
        best4: "rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;"
        
      },
      animation: {
        best: "slide_top 4s infinite",
        best1: "slide_bottom 4s infinite",
        best2: "slide_top 4s infinite",
        best3: "slide_bottom 4s infinite",
      },
      colors: {
        main : "#26292c",
        navbar : "#525252",
        table : "#c4c4c4",
        Textmain: "#525252",
      },
    },
  },
  plugins: [
    require('@tailwindcss/line-clamp'),
  ]

}