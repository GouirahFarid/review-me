
<script setup>
import {SearchIcon} from "lucide-vue-next";
import {Link} from "@inertiajs/vue3";
const props = defineProps({
    auth: Object
})ss
</script>
<template>
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <Link href="/" class="text-2xl font-bold text-teal-700">
                        spotfinder
                    </Link>
                </div>

                <!-- Search Section -->
                <div class="flex-1 max-w-3xl mx-8">
                    <div class="flex gap-4">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                icon
                            </div>
                            <input
                                v-model="locationQuery"
                                type="text"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md"
                                placeholder="Location"
                            />
                        </div>

                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <SearchIcon class="h-5 w-5 text-gray-400" />
                            </div>
                            <input
                                v-model="searchQuery"
                                type="text"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md"
                                placeholder="Restaurant, cuisine..."
                            />
                        </div>

                        <button
                            @click="handleSearch"
                            class="px-6 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800 transition"
                        >
                            Search
                        </button>
                    </div>
                </div>

                <!-- Right Navigation -->
                <div class="flex items-center space-x-4">
                    <Link
                        href="/register-restaurant"
                        class="text-sm text-gray-700 hover:text-gray-900"
                    >
                        Register Restaurant
                    </Link>
                    <template v-if="auth?.user">
                        <Link
                            href="/dashboard"
                            class="text-sm text-gray-700 hover:text-gray-900"
                        >
                            Dashboard
                        </Link>
                    </template>
                    <template v-else>
                        <Link
                            href="/login"
                            class="text-sm text-gray-700 hover:text-gray-900"
                        >
                            Login
                        </Link>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>
