<script setup>
import Layout from '@/Shared/Layout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import ContentForm from '@/Shared/Forms/Content.vue'

const page = usePage()
const course = page.props.course
</script>

<template>
<Layout>
    <Head title="Create Content" />

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h1 class="text-3xl font-bold">Create Content for {{ course.title }}</h1>
                <ContentForm :course="course" />
            </div>
        </div>
    </div>
</Layout>
</template>