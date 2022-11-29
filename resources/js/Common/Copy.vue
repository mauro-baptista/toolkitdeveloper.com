<template>
    <span @click="copy" ref="main"
          class="inline-flex items-center rounded-md px-2.5 py-0.5 text-sm font-medium cursor-pointer"
          :class="{
                'bg-indigo-100 hover:bg-indigo-200 text-indigo-800': !copied,
                'bg-green-100 hover:bg-green-200 text-green-800': copied,
          }"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 mr-1.5 h-4 w-4">
            <path v-if="!copied" stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
            <path v-else stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>

        <span v-if="!copied">Copy</span>
        <span v-else>Copied</span>


        <input type="hidden" ref="input" :value="data" />
    </span>
</template>

<script setup lang="ts">
    import { ref } from 'vue'

    interface Props {
        data: String,
    }

    defineProps<Props>()

    const input = ref()
    let copied = ref(false)

    function copy() {
        let inputElement = input.value as HTMLInputElement
        inputElement.type = 'text'
        inputElement.innerHTML = window.location.href
        inputElement.select()
        document.execCommand('copy');
        inputElement.type = 'hidden'

        copied.value = true
        setTimeout(() => copied.value = false, 2000)
    }
</script>
