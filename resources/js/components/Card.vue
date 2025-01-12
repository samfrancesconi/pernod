<template>
    <router-link
        :to="category"
        class="mx-4 my-1 p-4 w-96 max-w-[calc(100%_-_2rem)] h-44 rounded-xl flex justify-around items-center bg-white cursor-pointer"
        :class="{ 'shadow-xl' : isActive }"
    >
        <div class="flex flex-col justify-around w-full">
            <h3 class="font-bold text-xl mb-2">
                {{ title }}
            </h3>

            <p
                v-html="body"
                class="text-xs mr-2"
            ></p>
        </div>

        <div>
            <img
                class="w-40"
                :src="image"
            />
        </div>
    </router-link>
</template>


<script setup>
    const props = defineProps({
        category: {
            type: String,
            required: true,
        },
        image: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
        body: {
            type: String,
            required: true
        },
        isActive: {
            type: Boolean,
            required: false
        }
    })
</script>