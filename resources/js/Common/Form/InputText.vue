<template>
    <div>
        <label :for="name" class="block text-sm font-medium text-gray-700" v-text="label" />
        <input :type="type" :name="name"
               class="block mt-1 w-full rounded-md border-gray-300 shadow-sm sm:text-sm"
               :class="inputClass"
               :value="modelValue"
               @keyup="emit('update:modelValue', $event.target.value)"
        />
        <p class="mt-0.5 text-sm text-red-600" v-if="error" v-text="error"></p>
        <p class="mt-2 text-sm text-gray-500" id="email-description" v-text="description" v-if="description"></p>
    </div>
</template>

<script setup lang="ts">
    import {computed} from "vue";

    interface Props {
        name: String,
        label: String,
        type?: 'text' | 'email' | 'password',
        description?: String,
        error?: String,
        modelValue: String,
    }

    const props = withDefaults(defineProps<Props>(), {
        type: 'text',
    })

    const emitUpdate = 'update:modelValue';
    const emit = defineEmits<{(e: typeof emitUpdate, id: string): void }>()

    const inputClass = computed(() => ({
        'focus:border-indigo-500 focus:ring-indigo-500': !props.error,
        'text-red-900 border-red-300 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500': !!props.error,
    }))
</script>
