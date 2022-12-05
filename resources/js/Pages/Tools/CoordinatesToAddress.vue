<template>
    <Layout>
        <Head>
            <title>Toolkit developer - {{ name }}</title>
            <meta name="description" :content=description >
        </Head>

        <Block
            :header=name
            :description=description
        >
            <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <InputText
                    v-model="form.latitude"
                    name="text"
                    label="Latitude:"
                    :error="form.errors.latitude"
                />
                <InputText
                    v-model="form.longitude"
                    name="text"
                    label="Longitude"
                    :error="form.errors.longitude"
                    class="mt-4 md:mt-0"
                />
                <SubmitButton text="Get Address" class="mt-8 w-full md:w-128" />
            </form>

            <BlockCopy
                v-if="address"
                class="mt-8"
                header="Address"
                :data="address"
            >
                {{ address }}
            </BlockCopy>
        </Block>
    </Layout>
</template>

<script setup lang="ts">
    import { useForm } from '@inertiajs/inertia-vue3'

    import Layout from "../../Common/Layout.vue"
    import Block from "../../Common/Block.vue"
    import BlockCopy from "../../Common/BlockCopy.vue"
    import InputText from "../../Common/Form/InputText.vue"
    import SubmitButton from "../../Common/Form/SubmitButton.vue"
    import { Head } from '@inertiajs/inertia-vue3'

    interface Props {
        name: String,
        description: String,
        address?: String,
    }

    defineProps<Props>()

    const form = useForm({
        latitude: 37.7056639,
        longitude: -122.4634983,
    })

    function submit() {
        form.post(route('tools.handler', {tool: 'coordinates_to_address'}))
    }
</script>
