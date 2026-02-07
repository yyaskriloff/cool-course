<script setup>
import Layout from '@/Shared/Layout.vue'
import { Head, Link, usePage, Form } from '@inertiajs/vue3'
import ContentForm from '@/Shared/Forms/Content.vue'

const page = usePage()
const course = page.props.course
const content = page.props.content
const can = page.props.can
</script>

<template>
<Layout>
    <Head title="Edit {{ content.title }}" />

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h1 class="text-3xl font-bold">Editing {{ content.title }}</h1>
                <p class="text-base-content/60">The video can't be changed.</p>
                <ContentForm :course="course" :content="content" />
            </div>
        </div>
    </div>
</Layout>
</template>