<template>
    <div>
        <h1>{{subCategoryName}}</h1>
        <router-link 
                v-for="article in articles" 
                :key="article.id"
                :to="{name: 'articleWithSub', params: {
                    city: cityName,
                    category: categoryName,
                    subcategory: subCategoryName,
                    article: article.slug,
                }}"
            >
            {{ article.title }}
        </router-link>
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            subCategoryName: this.$route.params.subCategory,
            categoryName: this.$route.params.category,
            cityName: this.$route.params.city,
            articles: []
        }
    },
    async mounted() {
        try {
            this.articles = (await this.$axios.post('articles', {
                city: this.cityName,
                category: this.categoryName,
                subcategory: this.subCategoryName,
            })).data
        } catch (err) {
            console.error(err)
        }
    },
}
</script>