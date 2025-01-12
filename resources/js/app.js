import './bootstrap';
import { createApp } from 'vue'
import App from './App.vue'
import Form from './components/Form.vue'
import Card from './components/Card.vue'
import Select from '@dmgroup/npm-form-components/src/components/Select.vue'
import router from './router.js'
import CustomInput from '@dmgroup/npm-form-components/src/components/Input.vue'
import Swiper from './components/Swiper.vue'
import BrandCard from './components/BrandCard.vue'

let app = createApp(App)

app.component('business-form', Form)
app.component('dm-card', Card)
app.component('dm-select', Select)
app.component('dm-input', CustomInput)
app.component('dm-swiper', Swiper)
app.component('brand-card', BrandCard)

app.use(router)

app.mount("#app")
