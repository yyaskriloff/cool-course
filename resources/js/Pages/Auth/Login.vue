<script setup>
import Layout from '@/Shared/Layout.vue'
import { Head, Form, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const errors = computed(() => page.props.errors || {})
</script>

<template>
    <Layout>
        <Head title="Sign In" />

        <div class="hero min-h-[calc(100vh-16rem)]">
            <div class="hero-content flex-col">
                <div class="card w-96 bg-base-100">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold text-center mb-6">Welcome Back</h1>

                        <Form action="/login" method="POST">
                            <!-- Email -->
                            <label class="floating-label mb-6">
                                <input 
                                    type="email"
                                    name="email"
                                    placeholder="mail@example.com"
                                    class="input input-bordered"
                                    :class="{ 'input-error': errors.email }"
                                    required
                                    autofocus
                                >
                                <span>Email</span>
                            </label>
                            <div v-if="errors.email" class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ errors.email }}</span>
                            </div>

                            <!-- Password -->
                            <label class="floating-label mb-6">
                                <input 
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    class="input input-bordered"
                                    :class="{ 'input-error': errors.password }"
                                    required
                                >
                                <span>Password</span>
                            </label>
                            <div v-if="errors.password" class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ errors.password }}</span>
                            </div>

                            <!-- Remember Me -->
                            <div class="form-control mt-4">
                                <label class="label cursor-pointer justify-start">
                                    <input type="checkbox" name="remember" class="checkbox">
                                    <span class="label-text ml-2">Remember me</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary btn-sm w-full">
                                    Sign In
                                </button>
                            </div>
                        </Form>

                        <div class="divider">OR</div>
                        <p class="text-center text-sm">
                            Don't have an account?
                            <Link href="/register" class="link link-primary">Register</Link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>