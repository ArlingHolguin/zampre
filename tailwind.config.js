const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors')

module.exports = {
    
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    

    theme: {
        fontFamily:{
            'mont':['Montserrat'],
            'anton':['Anton'],
            'lato':['Lato']
        },
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                 sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                trueGray: colors.trueGray,
                orange: colors.orange,
                greenLime: colors.lime,
                teal: colors.teal,
                rose: colors.rose,
                violet: colors.violet,
                lese: {
                    50: '#F9F6E8',
                    100: '#F4EED4',
                    200: '#F7E8A1',
                    300: '#F9E793',
                    400: '#F9E373',
                    500: '#F9DD53',
                    600: '#F9DB46',
                    700: '#F9D835',
                    800: '#F9D521',
                    900: '#FFDB08',
                  }
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
