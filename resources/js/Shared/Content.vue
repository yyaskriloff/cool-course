<script setup>
import { Link } from '@inertiajs/vue3'
import {defineProps} from 'vue'

const props = defineProps({
    content: Object,
    can: Object
})

const {content, can} = props

console.log({content, can})
</script>

<template>
    <div class="card-body w-full">
    <div class="flex flex-row">
        <div class="flex-1">
            <h2 class="text-2xl font-bold">{{ content.title }}</h2>
            <p class="text-base-content/60">{{ content.description }}</p>
        </div>
        <div v-if="can.update" class="flex flex-row gap-2">
            <div class="flex flex-row gap-2">
                <form :action="`/courses/${content.course_id}/content/${content.id}`" method="POST">
                    <!-- @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error btn-sm">Delete</button> -->
                </form>
                <Link :href="`/courses/${content.course_id}/content/${content.id}/edit`"
                    class="btn btn-primary btn-sm">Edit</Link>
                <Link :href="`/courses/${content.course_id}/content/${content.id}`" class="btn btn-primary btn-sm">Watch</Link>
            </div>
        </div>
    </div>
</div>
</template>
