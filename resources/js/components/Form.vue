<template>
    <div class="w-full max-w-3xl px-4 mt-10">
        <div>
            <div class="mb-4">
                <dm-input :label="'Nome*'" v-model="record.name" />
                <div v-if="v$.record.name.$error" class="text-red">Questo campo è obbligatorio</div>
            </div>

            <div class="mb-4">
                <dm-input :label="'Cognome*'" v-model="record.lastName" />
                <div v-if="v$.record.lastName.$error" class="text-red">Questo campo è obbligatorio</div>
            </div>

            <div class="mb-4">
                <dm-select :placeholder="'Professione*'" v-model="record.occupation" :options="options" />
                <div v-if="v$.record.occupation.$error" class="text-red">Questo campo è obbligatorio</div>
            </div>

            <div class="mb-4">
                <dm-input
                    v-if="record.occupation === 'Bar Manager'"
                    :label="'Nome del locale*'"
                    v-model="record.barName"
                />
                <div v-if="v$.record.barName.$error" class="text-red">Questo campo è obbligatorio</div>
            </div>

            <div class="mb-4">
                <dm-input
                    v-if="record.occupation === 'Grossista' || record.occupation === 'Bar Manager'"
                    :label="'Nome del grossista*'"
                    v-model="record.shopName"
                />
                <div v-if="v$.record.shopName.$error" class="text-red">Questo campo è obbligatorio</div>
            </div>

            <div class="mb-4">
                <dm-input :label="'Città*'" v-model="record.city" />
                <div v-if="v$.record.city.$error" class="text-red">Questo campo è obbligatorio</div>
            </div>

            <div class="mb-4">
                <dm-input :label="'E-mail*'" v-model="record.email" />
                <div v-if="v$.record.email.$error" class="text-red">
                    Inserisci un'email valida
                </div>
            </div>

            <div class="mb-4">
                <dm-input :label="'Telefono'" v-model="record.phone" />
            </div>

            <div>
                <p>Sei già cliente di Pernod Ricard?</p>

                <input
                    type="radio"
                    class="mr-1"
                    id="isCustomer1"
                    :value="true"
                    v-model="record.isCustomer"
                />

                <label for="isCustomer1">
                    Sì
                </label>

                <input
                    type="radio"
                    class="ml-3 mr-1"
                    id="isCustomer0"
                    :value="false"
                    v-model="record.isCustomer"
                /> 

                <label for="isCustomer0">
                    No
                </label>
            </div>

            <div v-if="record.isCustomer === false">
                <p class="mt-4">
                    Acquisti già prodotti Pernod Ricard?
                </p>

                <input
                    type="radio"
                    class="mr-1"
                    id="isUser1"
                    :value="true"
                    v-model="record.isUser"
                />
                
                <label for="isUser1">
                    Sì
                </label>

                <input
                    type="radio"
                    class="ml-3 mr-1"
                    id="isUser0"
                    :value="false"
                    v-model="record.isUser"
                />

                <label for="isUser0">
                    No
                </label>
            </div>

            <div class="mt-4 flex items-center">
                <input type="checkbox" id="marketing_check" class="mr-4 h-6 w-6 bg-white" v-model="record.marketingCheck" />

                <label for="marketing_check" class="text-sm relative -top-px">
                    Acconsento a ricevere notizie e informazioni<br>promozionali su Sip*
                </label>
            </div>

            <div class="text-xs mt-8 italic">
                *Le tue informazioni possono essere utilizzate da <a class="underline" href="https://live.eventtia.com/fr/list-affiiliates" target="_blank">Pernod Ricard Italia S.p.A.</a> e rese da noi disponibili a qualsiasi altra entità del Gruppo Pernod Ricard per fornirti notizie e informazioni promozionali su BEAT.<br>
                In qualsiasi momento, puoi esercitare il tuo diritto di accesso, rettifica, cancellazione, limitazione, portabilità, obiezione o revocare il tuo consenso in qualsiasi momento senza compromettere la liceità del trattamento basata sul tuo consenso prima della revoca contattandoci a <a class="underline" href="mailto:ITA-Privacy@pernod-ricard.com">ITA-Privacy@pernod-ricard.com</a>. Hai anche il diritto di presentare un reclamo al Garante per la protezione dei dati personali.<br>
                Per ulteriori informazioni, per favore consulta la nostra <a class="underline" href="/assets/documents/privacy-policy.pdf" target="_blank">Politica sulla Privacy Online</a>.
            </div>

            <div class="text-center mt-12">
                <button
                    class="text-white mb-16 px-7 py-2.5 rounded-md"
                    @click="send"
                >
                    <!-- <img src="/assets/cta-continua-sip.png"> -->
                    <h2 class="relative text-8xl inline-block">
                        <span class="absolute bottom-[-20%] left-0 w-full h-[50px] bg-[#fd3c53] -translate-y-1/2"></span>
                        <span class="relative z-10 text-black">CONTINUA</span>
                    </h2>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import { useVuelidate } from '@vuelidate/core'
    import { required, email } from '@vuelidate/validators'
    import router from './../router'
    

    export default {
        setup: () => ({ v$: useVuelidate()  }),

        data() {
            return {
                record: {
                    name : null,
                    lastName : null,
                    occupation : null,
                    barName : null,
                    shopName : null,
                    city : null,
                    email : null,
                    phone : null,
                    isCustomer : null,
                    isUser : null,
                    marketingCheck : null
                },
                options: ['Bartender', 'Bar Manager', 'Grossista', 'altro'],
                status: {
                    loading: false
                }
            }
        },

        validations() {
            const shopIsRequired = this.record.occupation === 'Grossista' || this.record.occupation === 'Bar Manager' ? { required } : {}
            const barIsRequired = this.record.occupation === 'Bar Manager' ? { required } : {}

            return {
                record: {
                    name : { required },
                    lastName : { required },
                    occupation : { required },
                    city : { required },
                    email : { required, email },
                    barName: barIsRequired,
                    shopName: shopIsRequired,
                }
            }
        },

        methods: {
            async send() {
                const result = await this.v$.$validate();

                if(!result) 
                    return

                router.push('./ty_business');

                /*axios({
                    method: 'post',
                    url: '/api/records',
                    data: this.record
                }).then(() => {
                    router.push('./ty_business');
                })*/
            }
        }
   }
</script>
