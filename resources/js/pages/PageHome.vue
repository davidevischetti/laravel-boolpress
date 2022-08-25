<template>
<div>
    <h1 class="text-center">Boolpress</h1>
    <div>
        <div class="row g-2">
            <div v-for="post in posts" :key="post.slug" class="col-sm-6 col-md-4">
                <router-link :to="{name: 'post', params: {slug: post.slug}}">
                    <img :src="post.image" :alt="post.title" class="img-fluid">
                </router-link>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'PageHome',
    data() {
        return {
            posts: []
        };
    },
    created() {
        axios.get("/api/posts/random")
            .then(response => {
            this.posts = response.data;
            console.log(response);
        })
            .catch(error => console.log("error"));
    },
}
</script>

<style lang="scss" scoped>

</style>
