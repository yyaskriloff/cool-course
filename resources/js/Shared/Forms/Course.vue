<script setup>
import { defineProps } from 'vue'
import {Form} from '@inertiajs/vue3'

const props = defineProps({
    course: {
        type: Object,
        default: null
    }
})

const { course } = props
</script>



<template>
<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <Form :action="`/courses/${course?.id ?? ''}`" :method="course ? 'PUT' : 'POST'">
            <div class="form-control w-full">
                <input type="text" name="title" placeholder="Title" class="input input-bordered w-full" required
                    :value="course?.title ?? ''">
            </div>

            <div class="form-control w-full my-4">
                <textarea name="description" placeholder="Description" class="textarea textarea-bordered w-full resize-none"
                    rows="4" maxlength="255" required :value="course?.description ?? ''"></textarea>
            </div>



            <div class="flex items-center justify-end gap-2">
                <template v-if="course">
                    <button type="button" class="btn btn-outline btn-sm">
                        cancel
                    </button>
                </template>
                <button type="submit" class="btn btn-primary btn-sm">
                    {{ course ? 'Update Course' : 'Create Course' }}
                </button>
            </div>
        </Form>
    </div>
</div>
</template>