<template>
    <div>
        <h1>HomePage</h1>
        <router-link 
            v-for="city in cities" 
            :key="city.id"
            :to="{name: 'city', params: {city: city.slug}}"
        >
           {{ city.name }}
       </router-link>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cities: [],
        }
    },
    async mounted() {
        // this.$axios.get('cities').then(data => console.log('data', data)).catch(err => console.log(err))

        try {
            this.cities = (await this.$axios.get('cities')).data
        } catch (err) {
            console.error(err)
        }
        
    }
}
</script>
