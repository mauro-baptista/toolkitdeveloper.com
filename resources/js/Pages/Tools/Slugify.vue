<template>
    <Layout>
        <Head>
            <title>Toolkit developer - Slugify</title>
            <meta name="description" content="Easy and straight-forward tool to generate user friendly URL slugs">
        </Head>

        <Block
            header="Slugify"
            description="Easy and straight-forward tool to generate user friendly URL slugs"
        >
            <form @submit.prevent="submit">
                <InputText
                    v-model="form.text"
                    name="text"
                    label="Your Text:"
                    description="Add the text you want to create a slug for. E.g. Your post title"
                    :error="form.errors.text"
                />
                <SubmitButton text="Generate" class="mt-8 w-full md:w-128" />
            </form>

            <BlockCopy
                v-if="slug"
                class="mt-8"
                header="Generated Slug"
                :data="slug"
            >
                {{ slug }}
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
        slug?: String,
    }

    defineProps<Props>()

    const form = useForm({
        text: null,
    })

    function submit() {
        form.post(route('tools.handler', {tool: 'slugify'}))
    }
</script>
