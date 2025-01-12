<template>
    <a :href="url" target="_blank" class="w-60 h-60 p-4 my-0 mx-auto bg-white flex flex-col items-center justify-center rounded-lg cursor-pointer">
        <img
            :src="image"
            class="relative w-full"
        />
    </a>
</template>

<script setup>

const props = defineProps({
        image: {
            type: String,
            required: true,
        },
        url: {
            type: String,
            required: false
        }
    });

const goTo = (url) => {
    window.location = url;
}

</script>