<script setup>
import Layout from '@/Shared/Layout.vue'
import { Head, Link, usePage } from '@inertiajs/vue3'

const page = usePage()
const course = page.props.course
const content = page.props.content
const can = page.props.can

const videoUrl = `/storage/${content.file}`
</script>


<template>
<Layout>
    <Head :title="content.title" />

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <Link :href="`/courses/${course.id}`" class="btn btn-ghost btn-sm w-auto self-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Course
                </Link>
                <h1 class="text-3xl font-bold">{{ content.title }}</h1>
                <p class="text-base-content/60">{{ content.description }}</p>
                <video 
                    id="content-player" 
                    :data-course="course.id" 
                    :data-content="content.id"
                    :src="videoUrl" 
                    class="w-full" 
                    controls
                ></video>
            </div>
        </div>
    </div>
</Layout>
</template>

