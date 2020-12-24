<template>
    <div class="mt-3">
        <ul class="pagination justify-content-center">
            <li 
                v-for="(link, key) in links" 
                :key="key" 
                class="page-item" 
                :class="{ 'disabled': link.url === null ,'active': link.active }">

                <template v-if="link.url === null">
                    <inertia-link class="page-link" href="#">
                        {{ link.label }}
                    </inertia-link>
                </template>

                <template v-else>
                    <inertia-link class="page-link " :href="link.url">
                        {{ link.label }}
                    </inertia-link>
                </template>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        links: Array,
    }
}
</script>