<template>
  <div class="loader">
      <div class="spinner-border text-success" role="status">
          <span class="sr-only">Loading...</span>
      </div>
  </div>
</template>

<script>
export default {
    name: 'Loader'
}
</script>

<style lang="scss" scoped>
.loader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba($color: #000000, $alpha: 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}

.spinner-border {
    width: 200px;
    height: 200px;
}
</style>