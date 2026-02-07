<script setup>
import { Link, Form, router } from '@inertiajs/vue3'
import {defineProps} from 'vue'

const props = defineProps({
    content: Object,
    can: Object
})

const {content, can} = props

const handleDeleteSuccess = () => {
    // The controller redirects to courses.show, explicitly visit to ensure fresh data
    router.visit(`/courses/${content.course_id}`)
}
</script>

<template>
    <div class="card-body w-full">
    <div class="flex flex-row">
        <div class="flex-1">
            <h2 class="text-2xl font-bold">{{ content.title }}</h2>
            <p class="text-base-content/60">{{ content.description }}</p>
        </div>
        <div  class="flex flex-row gap-2">
            <template v-if="can.update">

                <Form 
                    :action="`/courses/${content.course_id}/content/${content.id}`" 
                    method="DELETE"
                    @success="handleDeleteSuccess"
                >
                    <button type="submit" class="btn btn-error btn-sm">Delete</button>
                </Form>
                <Link :href="`/courses/${content.course_id}/content/${content.id}/edit`"
                class="btn btn-primary btn-sm">Edit</Link>
            </template>
                <Link :href="`/courses/${content.course_id}/content/${content.id}`" class="btn btn-primary btn-sm">Watch</Link>
        </div>
    </div>
</div>
</template>
