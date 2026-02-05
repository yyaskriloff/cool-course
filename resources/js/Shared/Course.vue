<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    course: Object
})
</script>


<template>
    <div class="card bg-base-100 shadow">
        <div class="card-body flex flex-row">   
            <div class="flex-1">
                <h2 class="card-title">{{ course.title }}</h2>
                <p class="text-base-content/60">{{ course.description }}</p>
            </div>
            <Link :href="`/courses/${course.id}`" class="btn btn-primary btn-sm">View</Link>
        </div>
    </div>
</template>