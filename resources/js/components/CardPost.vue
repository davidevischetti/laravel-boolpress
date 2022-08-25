<template>
        <div class="card h-100">
            <img :src="post.image" :alt="post.title" class="card-img-top">
            <div class="card-body d-flex flex-column">
                <h5 class="card_title">{{post.title}}</h5>
                <p class="card-text mb-auto">{{post.content}}</p>
                <router-link :to="{name: 'post', params: {slug: post.slug}}" class="btn btn-primary mt-3">Link</router-link>
            </div>
        </div>
</template>

<script>
export default {
    name: 'CardPost',
    props: ['post']
}
</script>

<style lang="scss" scoped>

</style>
