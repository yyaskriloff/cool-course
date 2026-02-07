<script setup>
import { defineProps } from 'vue'
import {Form} from '@inertiajs/vue3'

const props = defineProps({
    course: {
        type: Object,
        default: null
    },
    content: {
        type: Object,
        default: null
    }
})

const { course, content } = props
</script>

<template>

    <Form :action="`/courses/${course?.id ?? ''}/content/${content?.id ?? ''}`" :method="content ? 'PUT' : 'POST'"
        :enctype="!content ? 'multipart/form-data' : null" class="flex flex-col gap-4">
     
        <div class="form-control w-full">
            <input type="text" name="title" placeholder="Title" class="input input-bordered w-full" required
            :value="content?.title ?? ''">
        </div>
        <div class="form-control w-full">
            <textarea name="description" placeholder="Description" class="textarea textarea-bordered w-full resize-none"
            rows="4" maxlength="255" required> {{ content?.description ?? '' }}</textarea>
        </div>

        <div v-if="!content" class="form-control w-full">
            <input type="file" name="file" placeholder="File" class="input input-bordered w-full" required
            :value="content?.file ?? ''">
        </div>

        <div class="form-control w-full">
            <label for="published">Publish</label>
            <input type="checkbox" name="published" placeholder="Published" class="checkbox checkbox-bordered"
            :checked="content?.published ?? false">
        </div>
        <div class="form-control w-full">
            <button type="submit" class="btn btn-primary btn-sm">
                {{ content ? 'Update Content' : 'Create Content' }}</button>
            </div>
        </Form>
        

</template>