<template>
    <div>
        <h1>{{categoryName}}</h1>
        <router-link 
                v-for="subCategory in subCategories" 
                :key="subCategory.id"
                :to="{name: 'subCategory', params: {
                    city: cityName,
                    category: categoryName,
                    subCategory: subCategory.slug,
                }}"
            >
            {{ subCategory.name }}
        </router-link>
        <h1>Articles</h1>
        <router-link 
                v-for="article in articles" 
                :key="article.id"
                :to="{name: 'article', params: {
                    city: cityName,
                    category: categoryName,
                    article: article.slug,
                }}"
            >
            {{ article.title }}
            {{ article.description }}
        </router-link>
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            categoryName: this.$route.params.category,
            cityName: this.$route.params.city,
            articles: [],
            subCategories: []
        }
    },
    async mounted() {
        try {
            this.subCategories = (await this.$axios.post('subcategories', {
                category: this.categoryName,
            })).data
            this.articles = (await this.$axios.post('articles', {
                city: this.cityName,
                category: this.categoryName,
            })).data
        } catch (err) {
            console.error(err)
        }
    },
}
</script>