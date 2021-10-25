<template>
  <section id="post-list">
    <h2 class="mt-4 mb-3">My Posts</h2>
    <Loader v-if="isLoading" />
    <div v-else>
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
      <Pagination
        :currentPage="pagination.current_page"
        :lastPage="pagination.last_page"
        @onPageChange="changePage"
      />
    </div>
  </section>
</template>

<script>
import axios from 'axios';
import Loader from '../Loader.vue';
import PostCard from './PostCard.vue';
import Pagination from '../Pagination.vue';
export default {
    name: 'PostList',
    components: {
        PostCard,
        Loader,
        Pagination,
        },
    data() {
        return {
            baseUri: 'http://localhost:8000',
            posts: [],
            isLoading: false,
            pagination: {}
        };
    },
    methods: {
        getPosts(page){
            this.isLoading = true;
            axios.get(`${this.baseUri}/api/posts?page=${page}`)
            .then((res) => {
                // Destructuring
                const {data, current_page, last_page} = res.data;

                this.posts = data;
                this.pagination = {currentPage: current_page, lastPage: last_page}
            })
            .catch((err) => {
                console.error(err);
            })
            .then(() => {
                this.isLoading = false;
            })
        },
        changePage(page){
            this.getPosts(page)
        }
    },
    created(){
        this.getPosts(1);
    }
};
</script>

<style lang="scss" scoped>
nav {
  width: 100%;
  display: flex;
  justify-content: center;
}
</style>