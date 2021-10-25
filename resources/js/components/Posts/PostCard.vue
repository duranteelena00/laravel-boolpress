<template>
  <div class="card">
    <div class="card-header">{{ post.title }}</div>
    <div class="card-body">
      <p>
        {{ post.content }}
      </p>
    </div>
    <div class="card-footer bg-white d-flex justify-content-end">
      <time
        ><small>Published on: {{ post.created_at }}</small></time
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  methods: {
    getFormattedDate(date) {
      const postDate = new Date(date);
      const day = postDate.getDate();
      const month = postDate.getMonth() + 1;
      const year = postDate.getFullYear();

      if (day < 10) day = "0" + day;
      if (month < 10) month = "0" + month;

      return `${day}/${month}/${year}`;
    },
  },
};
</script>

<style>
</style>