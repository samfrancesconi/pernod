<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="visibleSlides"
            :centeredSlides="is_mobile"
            :pagination="{ clickable: true }"
            :virtual="true"
        >
            <swiper-slide
                v-for="brand, index in brands"
                :key="index"
                :virtualIndex="index"
            >
                <brand-card
                    :image="brand.image"
                    :url="brand.url"
                />
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import { defineComponent, ref } from 'vue'

import { Pagination, Virtual } from 'swiper'
import { Swiper, SwiperSlide } from 'swiper/vue'

import 'swiper/css'
import 'swiper/css/pagination'

export default defineComponent({
    components: {
      Swiper,
      SwiperSlide,
    },

    props: {
        brands: {
            type: Array,
            required: true
        },

        visibleSlides: {
            type: Number,
            required: true
        }
    },


    setup(props) {
        const is_mobile = ref(null)

        const checkIsMobile = () => is_mobile.value = window.innerWidth <= 768

        checkIsMobile()

        window.addEventListener('resize', () => checkIsMobile())

        return {
            is_mobile,
            modules: [Pagination, Virtual],
        }
    },
})
</script>

<style>
.swiper {
    @apply overflow-y-visible py-16;
}

.swiper .swiper-pagination {
    @apply z-10;
}

.swiper .swiper-slide-active {
    @apply -mt-4 lg:mt-0;
}

.swiper .swiper-pagination {
    @apply lg:hidden;
}

.swiper .swiper-pagination-bullet {
    @apply w-3 h-3;
}

.swiper .swiper-pagination-bullet-active {
    @apply bg-black;
}
</style>
