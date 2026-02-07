<script setup>
import Layout from '@/Shared/Layout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import CourseForm from '@/Shared/Forms/Course.vue'


const page = usePage()
console.log({ page: page.props })


const course = page.props.course
</script>


<template>
    <Layout>
        <Head title="Create Course" />

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <h1 class="text-3xl font-bold">Create a Cool Courses!</h1>
                    <p class="mt-4 text-base-content/60">This is your brand new Cool Courses application</p>
                    <CourseForm :course="course" />
                </div>
            </div>
        </div>
    </div>
    </Layout>
</template>
