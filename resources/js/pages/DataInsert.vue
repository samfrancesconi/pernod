<template>
   <section class="flex items-center flex-col bg-lightGreen">
      <img class="w-full" :src="'/assets/header-triangoli-businessform.png'" />

      <h1 class="text-darkGreen font-sangBleuMedium text-3xl mt-16">
         Join SIP!
      </h1>

      <p class="text-center mt-2 flex flex-col">
         <span>Inserisci i tuoi dati e prosegui</span> 
         <span class="mt-[-5px]">con la registrazione</span>
      </p>

      <business-form />
   </section>
</template>

<script>
export default {
   
}

</script>