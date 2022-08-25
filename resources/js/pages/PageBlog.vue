<template>
<div>
    <h1 class="text-center">Boolpress</h1>
    <div class="row g-2">
        <CardPost v-for="post in posts" :key="post.id"  class="col-sm-6 col-md-4" :post="post"/>
    </div>
    <nav aria-label="...">
        <ul class="pagination pagination-lg mt-5">
            <li class="page-item active" aria-current="page">
            <span class="page-link">1</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
</div>
</template>

<script>
import CardPost from '../components/CardPost.vue';

export default {
    name: "App",
    data() {
        return {
            posts: []
        };
    },
    created() {
        axios.get("/api/posts")
            .then(response => {
            this.posts = response.data.data;
            console.log(response);
        })
            .catch(error => console.log("error"));
    },
    components: { CardPost }
}
</script>

<style lang="scss" scoped>

</style>
