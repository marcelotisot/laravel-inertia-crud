<template>
    <h1 class="text-center">
        {{ hello }}
    </h1>
</template>

<script>
export default {
    name: "Hello",
    data() {
        return {
            hello: "Hello World InertiaJS"
        }
    }
}
</script>