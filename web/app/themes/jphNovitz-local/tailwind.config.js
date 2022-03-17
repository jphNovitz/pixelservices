module.exports = {
    mode: 'jit',                           //ADD THIS LINE
    content: [                               //CONFIGURE CORRECTLY
        '**/*.php',
        '*.php',
    ],
    media: false,
    theme: {
        extend: {
            transitionProperty: {
                'spacing': 'margin, padding',
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}