<template>
  <div class="container">
    <Header class="mt-3" :title="title" />
    <main><PostList/></main>
  </div>
</template>

<script>
import Header from "./Header.vue";
import PostList from './Posts/PostList.vue';
export default {
  name: "App",
  components: {
    Header,
    PostList,
  },
  data() {
    return {
      title: "Boolpress",
    };
  },
};
</script>
