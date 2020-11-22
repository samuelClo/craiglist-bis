<template>
    <div>
        <h1>{{cityName}}</h1>
        <router-link 
                v-for="category in categories" 
                :key="category.id"
                :to="{name: 'category', params: {city: cityName, category: category.slug}}"
            >
            {{ category.name }}
        </router-link>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cityName: this.$route.params.city,
            categories: []
        }
    },
    async mounted() {
        try {
            this.categories = (await this.$axios.get('categories')).data
        } catch (err) {
            console.error(err)
        }
    },
}
</script>