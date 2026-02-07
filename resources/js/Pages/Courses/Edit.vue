<script setup>
import Layout from '@/Shared/Layout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import CourseForm from '@/Shared/Forms/Course.vue'

const page = usePage()
const course = page.props.course
</script>

<template>
    <Layout>
        <Head title="Edit Course" />

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h1 class="text-3xl font-bold">Editing {{ course.title }}</h1>
                <CourseForm :course="course" />
            </div>
        </div>
    </div>
</Layout>
</template>
