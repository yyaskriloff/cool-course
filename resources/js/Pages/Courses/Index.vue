<script setup>
import Layout from '@/Shared/Layout.vue'
import Course from '@/Shared/Course.vue'
import { Head, usePage, Link } from '@inertiajs/vue3'


const page = usePage()
const courses = page.props.courses
</script>

<template>
    <Layout>
        <Head title="My Courses" />

        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="flex flex-row justify-between items-center">
                            <div class="flex-1">
                                <h1 class="text-3xl font-bold">My Courses</h1>
                                <p class="mt-4 text-base-content/60">Here are the courses you have created</p>
                            </div>
                                <Link href="/courses/create" class="btn btn-primary btn-sm">Create Course</Link>
                        </div>
                        <div class="mt-8 flex flex-col gap-4">
                            <Course v-if="courses.length > 0" v-for="course in courses" :key="course.id" :course="course" />
                            <p v-else class="text-base-content/60">No courses found</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
