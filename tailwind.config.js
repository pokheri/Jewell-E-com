import forms from '@tailwindcss/forms';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};


// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: '#F59E0B',       // CTA / accents
        secondary: '#B45309',     // Highlights
        lightbg: '#FDFDFD',       // Main background
        cardbg: '#FAFAFA',        // Card / section
        textprimary: '#1F2937',   // Main text
        textsecondary: '#4B5563', // Sub text
      },
      fontFamily: {
        heading: ['Playfair Display', 'serif'],
        body: ['Inter', 'sans-serif'],
      },
    },
  },
}

