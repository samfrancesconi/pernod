<template>
    <div class="flex flex-col text-lightGreen items-center bg-blackSip" >
        <img class="w-full lg: h-40" :src="'/assets/header-triangoli-welcome.png'" />

       <img class="w-60" :src="'/assets/new-sip-logo.png'" /> 

        <h4 class="font-sangBleuBold text-center text-[35px] px-12 mt-24">
            BENVENUT*<br>IN SIP!
        </h4>

        <h4 class="text-[20px]">Bartender Community Hub<br/>
            Powered by Pernod Ricard</h4>

        <p class="text-center mt-16 mb-8 text-3xl">
            MAKE A NEW FRIEND<br/> EVERY DAY!
            <br/>
            <br/>
            <p class="text-[20px]">Let's stay in touch!</p>
        </p>

        <router-link
            to="/beat/business"
            class="px-7 py-12 rounded-md"
        >
            <img class="w-60" src="/assets/cta-registrati-sip.png">
        </router-link>
    </div>
    
</template>

