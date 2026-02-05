<script setup>
import { Link, router } from '@inertiajs/vue3'
import { usePage } from "@inertiajs/vue3";
import { computed } from 'vue'

const page = usePage();
const user = computed(() => page.props.auth?.user);

const logout = () => {
    router.post('/logout')
}
</script>

<template >
    <div class="min-h-screen flex flex-col bg-base-200 font-sans">

    <nav class="navbar bg-base-100">
        <div class="navbar-start">
            <Link href="/" class="btn btn-ghost text-xl">Cool Courses</Link>
            <template v-if="user">
                <Link href="/courses" class="btn btn-ghost btn-sm">My Courses</Link>
            </template>
        </div>
        <div class="navbar-end gap-2">
            <template v-if="user">
                <span class="text-sm">{{ user.name }}</span>
                <button @click="logout" type="button" class="btn btn-ghost btn-sm">Logout</button>
            </template>
            <template v-else>
                <Link href="/login" class="btn btn-ghost btn-sm">Sign In</Link>
                <Link href="/register" class="btn btn-primary btn-sm">Sign Up</Link>
            </template>
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4 py-8">
        <slot />
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>© 2025 Chirper - Built with Laravel and ❤️</p>
        </div>
    </footer>
</div>
</template>