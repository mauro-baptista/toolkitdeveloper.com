<template>
    <div>
        <h1
            v-if="header" v-text="header"
            class="mt-3 text-3xl font-extrabold tracking-tight text-gray-900 mb-2"
        />
        <h2
            v-if="description" v-text="description"
            class="text-lg font-medium text-gray-500 mb-8"
        />

        <slot />
    </div>
</template>

<script setup lang="ts">
    interface Props {
        header?: String,
        description?: String,
    }

    defineProps<Props>()
</script>
