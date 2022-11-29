<template>
    <div class="relative overflow-hidden rounded-lg bg-gray-50 px-4 py-5 shadow sm:p-6">
        <Copy :data="data" class="absolute top-2 right-2"/>
        <div class="truncate text-sm font-medium text-gray-500" v-text="header" />
        <div class="mt-1 text-3xl font-semibold tracking-tight text-gray-900"><slot /></div>
    </div>
</template>

<script setup lang="ts">
    import Copy from "./Copy.vue";

    interface Props {
        header: String,
        data: String,
    }

    defineProps<Props>()
</script>
