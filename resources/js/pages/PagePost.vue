<template>
    <div v-if="post">
        <h1>{{post.title}}</h1>
        <h2>Written by: {{post.user.name}}</h2>
        <h3>In category: {{post.category.name}}</h3>
        <div class="tags">
            <span v-for="tag in post.tags" :key="tag.id" class="tag">
               {{tag.name}}
            </span>
        </div>
        <img :src="post.image" :alt="post.title">
        <p>{{post.content}}</p>
    </div>
</template>

<script>
import Axios from 'axios'

export default {
    name: 'PagePost',
    props: {
        slug: String
    },
    data () {
        return {
            post: null
        }
    },
    created () {
        Axios.get('/posts/' + this.slug)
            .then(response => this.post = response.data)
    }
}
</script>

<style lang="scss" scoped>

</style>
