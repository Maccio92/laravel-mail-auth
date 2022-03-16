<template>
<div class="container mt-3 p-0">
    <div class="row gap-5 justify-content-center">
        <div class="col-4 bg-info py-3 text-center rounded " v-for="(post, index) in posts" :key="index">
            <h3 class="card-title text-capitalize py-5">{{ post.name }}</h3>
            <button class="btn btn-primary px-4"><a class="text-light" :href="post.html_url">Vai</a></button>
        </div>
    </div>
</div>

</template>

<script>
import Axios from "axios";
export default {
name:"Posts",
data() {
            return {
                posts: null,
            }
        },
created() {
            this.getRepos('https://api.github.com/users/Maccio92/repos');
        },
methods: {
    getRepos(url){
        Axios.get(url).then(
            (result) => {
            console.log(result)
            this.posts = result.data;

            });
        }
}
}
</script>

<style>

</style>