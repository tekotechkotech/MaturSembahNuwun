import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        './app/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js"),
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],

    theme: {
        extend: {
            colors: {
                "pg-primary": colors.gray,
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
    darkMode: 'class',

};