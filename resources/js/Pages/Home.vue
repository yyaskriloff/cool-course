<script setup>
import Layout from '@/Shared/Layout.vue'
import Course from '@/Shared/Course.vue'
import { Head, usePage } from '@inertiajs/vue3'

const page = usePage()
const courses = page.props.courses

console.log({courses})
</script>

<template>
    <Layout>
        <Head title="Welcome" />
        <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <h1 class="text-3xl font-bold">Welcome to Cool Courses!</h1>
                    <p class="mt-4 text-base-content/60">This is your brand new Cool Courses application</p>

                    
                    <Course v-if="courses.length > 0" v-for="course in courses" :key="course.id" :course="course" />
                    <p v-else class="text-base-content/60">No courses found</p>
                </div>
            </div>
        </div>
    </div>
    </Layout>
</template>