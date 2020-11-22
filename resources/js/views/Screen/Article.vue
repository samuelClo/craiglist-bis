<template>
    <div>
        <h1>article</h1>
        <h1>{{article.title}}</h1>
        <p>{{ article.description }}</p>
        <qrcode-vue :value="location" size="50" level="H"></qrcode-vue>
    </div>
</template>

<script>
import QrcodeVue from 'qrcode.vue'

export default {
    data() {
        return {
            article: {},
            location: '',
        }
    },
    async mounted() {
        this.location=window.location.href
        try {
            this.article = (await this.$axios.get('article/' + this.$route.params.article)).data
        } catch (err) {
            console.error(err)
        }
      ;
    },
    head() {
        return {
            title: this.article.title,
        }
    },
    components: {
      QrcodeVue,
    },
}
</script>