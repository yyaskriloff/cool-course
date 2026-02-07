<script setup>
import Layout from '@/Shared/Layout.vue'
import { Head, Link, usePage, Form } from '@inertiajs/vue3'
import Content from '@/Shared/Content.vue'

const page = usePage()
const course = page.props.course
const contents = page.props.contents
const can = page.props.can

console.log({course, contents, can})
</script>


<template>
    <Layout>
        <Head title="Course" />
    
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body flex flex-row">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold">{{ course.title }}</h1>
                        <p class="text-base-content/60">{{ course.description }}</p>
                    </div>
                    <div v-if="can.update" class="flex flex-row gap-2">
                            <Link :href="`/courses/${course.id}/edit`" class="btn btn-primary btn-sm">Edit</Link>
                            <Form :action="`/courses/${course.id}`" method="DELETE">
                                <button type="submit" class="btn btn-error btn-sm">Delete</button>
                            </Form>
                        </div>
                </div>
                <div class="card-body">
                    <h2 class="text-2xl font-bold">Contents</h2>
                    <ul class="list-disc list-inside">
                        <Content v-for="content in contents" :key="content.id" :content="content" :can="can" />
                    </ul>
                </div>
            </div>
        </div>
    </Layout>
</template>
