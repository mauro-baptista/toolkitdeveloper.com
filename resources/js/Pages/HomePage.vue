<template>
    <Layout>
        <div class="divide-y divide-gray-200 overflow-hidden sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
            <div v-for="(data, tool) in tools" :key="tool" class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <div class="mt-0">
                    <h3 class="text-lg font-medium">
                        <Link :href="url(tool)" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            {{ data.name }}
                        </Link>
                    </h3>
                    <p class="mt-4 text-sm text-gray-500" v-text="data.description" />
                </div>
                <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                </span>
            </div>
        </div>
    </Layout>
</template>

<script setup lang="ts">
    import Layout from "../Common/Layout.vue"
    import { Link } from '@inertiajs/inertia-vue3'

    interface Props {
        tools: object,
    }

    defineProps<Props>()

    function url(tool: string) {
        return route('tools.handler', {tool: tool});
    }
</script>
