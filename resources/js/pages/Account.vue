<template>
    <div class="flex flex-col items-center">
        <h1>
            Let's stay in touch!
        </h1>

        <p class="mt-4 mb-12 text-sm">
            Per proseguire scegli una fra le seguenti opzioni.
        </p>

        <!--
            Nota: visto che le card hanno lo stesso aspetto generale, meglio mettere
            le classi nel componente piuttosto che ripeterle ad ogni iterazione.
            È sempre possibile aggiungere classi (es. mt-8) ad una sola
            iterazione del componente per personalizzarlo.
        -->
        <dm-card
            :image="'/assets/icona_business.png'" 
            :title="'Sono del settore'"
            :body="'join the #BEATgeneration <br>Resta sempre aggiornato su eventi di settore e fiere.'"
            :isActive="businessIsActive"
            class="mt-8"
            category="business"
        />

        <dm-card 
            :image="'/assets/icona_consumer.png'"
            :title="'Sono un consumatore'"
            :body="'Gin, Vodka, Whisky o Rum Lover?<br>Non perderti novità, concorsi, promozioni e eventi sui nostri prodotti: Malfy, Absolut, Jameson Irish Whiskey e Havana Club!'" 
            :isActive="consumerIsActive"
            category="ty_consumer"
        />
    </div>
</template>
<script>
import { reactive , computed } from 'vue'

// Nota: metterei come stato o un id numerico o uno slug più semplice,
// poi elabori nel router-link, aggiungendo cose tipo ./,
// che tra l'altro non è nemmeno necessario in questo caso.

export default {
    setup() {
        const state = reactive({
            category : '',
        });

        function setCategory(slug) {
            state.category = slug;
        };

        const buttonEnabled = computed(() => state.category)

        const businessIsActive = computed(() => {
            // Nota: se devi usare un if per ritornare true o false,
            // ritorna direttamente la condizione e hai fatto tutto in una riga.
            // In questo caso la condizione è così semplice che non userei nemmeno la computed,
            // metterei direttamente state.category === 'business' nel v-if del template.

            return state.category === 'business'

            // if (state.category === 'business') 
            //     return true
            // return false
        })

        // const clientIsActive = computed(() => {
        const consumerIsActive = computed(() => {
            // Nota: se devi usare un if per ritornare true o false,
            // ritorna direttamente la condizione e hai fatto tutto in una riga.
            // In questo caso la condizione è così semplice che non userei nemmeno la computed,
            // metterei direttamente state.category === 'consumer' nel v-if del template.

            // Nota: occhio che nel nome variabile avevi scritto clientIsActive, quando
            // nel resto del codice scrivi sempre consumer. Al computer va bene, ma il codice
            // rimane meno chiaro per gli umani che lo leggono
            
            // Nota: se come category metti la uri della rotta, rischi di trovarti in 

            return state.category === 'ty_consumer'

            // if (state.category === 'consumer') 
            //     return true
            // return false
        })

        return {
            state,
            setCategory,
            buttonEnabled,
            consumerIsActive,
            businessIsActive
        }
    }
} 
</script>