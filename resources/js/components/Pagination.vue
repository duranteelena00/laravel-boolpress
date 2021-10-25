<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li
        class="page-item"
        v-if="currentPage > 1"
        @click="$emit('onPageChange', currentPage - 1)"
      >
        <a class="page-link" href="#">Previous</a>
      </li>
      <li
        class="page-item"
        v-for="n in lastPage"
        :key="n"
        @click="$emit('onPageChange', n)"
      >
        <a
          class="page-link"
          :class="n === currentPage ? 'active' : ''"
          href="#"
          >{{ n }}</a
        >
      </li>
      <li
        class="page-item"
        v-if="lastPage > currentPage"
        @click="$emit('onPageChange', currentPage + 1)"
      >
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'Pagination',
  props: ['currentPage', 'lastPage']
};
</script>

<style>
</style>