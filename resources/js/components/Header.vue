<template>
    <header>
        <h1>Welcome on {{ title }}</h1>
    </header>
</template>

<script>
export default {
    name: 'Header',
    props: ['title'],
};
</script>
