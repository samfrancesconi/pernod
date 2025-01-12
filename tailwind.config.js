/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/@dmgroup/**/*.vue",
    ],
    // Nota: nella config di Tailwind si possono impostare i colori di progetto,
    // da utilizzare poi automaticamente nei nomi classi (es. bg-yellow)
    // Nota: se li metti dentro theme, sostituiscono l'intero pacchetto di colori di default,
    // mentre se li metti dentro extend si aggiungono alla libreria esistente
    theme: {
        colors: {
            black: {
              DEFAULT: '#000000'
            },
            yellow: {
              DEFAULT: '#ffce23',
            },
            blackSip: {
                DEFAULT: '#0F1D16',
            },
            white: {
                DEFAULT: '#ffffff',
            },
            red: {
                DEFAULT: '#C00',
            },
            lightGreen: {
                DEFAULT: '#E5F0E6'
            },
            darkGreen: {
                DEFAULT: '#086D59'
            }
        },
        fontFamily: {
            gillSans: "gill_sans",
            sangBleuMedium: "sang_bleu_medium",
            sangBleuBold: "sang_bleu_bold",
            nunitoSans: 'nunito_sans'
          },
        extend: {},
    },
    plugins: [],
}
