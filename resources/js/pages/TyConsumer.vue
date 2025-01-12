<template>
    <div class="flex flex-col items-center mx-4 text-center">
        <h1>
            Gin, Vodka, Whisky o Rum Lover?
        </h1>

        <h2 class="text-center">
            Non perderti novità, concorsi promozioni e eventi sui nostri prodotti: Malfy, Absolut, Jameson Irish Whiskey e Havana Club!<br>
            Clicca sul brand che preferisci e… stay tuned!
        </h2>

        <h2 v-if="slides === 1">Fai Swipe per cambiare brand</h2>
    </div>
    <dm-swiper :brands="brands" :visibleSlides="slides"></dm-swiper>
</template>

<script>
    export default {
        data() {
            return {
                slides: 1,
                brands : [
                    {
                        image: '/assets/loghi_beat_malfy.gif',
                        url: 'https://www.malfygin.com/it-it/iscriviti-alla-newsletter/'
                    },
                    {
                        image: '/assets/loghi_beat_absolut.gif',
                        url: 'https://www.absolut.com/it-it/sign-up/'
                    },
                    {
                        image: '/assets/loghi_beat_havana.gif',
                        url: 'https://havana-club.com/it-it/ricevi-aggiornamenti-in-anteprima/'
                    },
                    {
                        image: '/assets/loghi_beat_jameson.gif',
                        url: ' https://www.jamesonwhiskey.com/it-it/jclub/'
                    }
                ]
            }
        },
        mounted() {
            // NOTA: meglio estrarre la logica in un metodo e chiamarlo
            // al mounted e poi mettere un listener al resize che richiama il metodo.
            // Così gira molte meno volte.

            this.checkIsMobile()

            window.addEventListener('resize', () => this.checkIsMobile())
            // setInterval(()=>{
            //     if (window.innerWidth <= 768) {
            //         console.log('isMobile')
            //         this.slides = 1;
            //     }
            //     else {
            //         console.log('isDesktop')
            //         this.slides = 4;
            //     }
            // }, 100)
        },

        methods: {
            checkIsMobile() {
                if (window.innerWidth <= 768) {
                    this.slides = 1.5;
                }
                else {
                    this.slides = 4;
                }
            },
        },
    }
</script>
