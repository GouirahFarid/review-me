<!-- resources/js/Layouts/MainLayout.vue -->
<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Navbar -->
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
                            href="/places"
                            class="text-sm text-gray-700 hover:text-gray-900"
                        >
                           Places
                        </Link>
                        <template v-if="$page.props.auth.user">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                        <div class="ml-3 relative">
                                            <div class="flex items-center">
                                                <img
                                                    v-if="$page.props.auth.user?.profile_photo_url"
                                                    :src="$page.props.auth.user?.profile_photo_url"
                                                    class="h-8 w-8 rounded-full object-cover"
                                                />
                                                <span v-else class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                        <UserIcon class="h-full w-full text-gray-300" />
                      </span>
                                            </div>
                                        </div>
                                    </button>
                                </template>

                                <template #content>
                                    <div class="px-4 py-2">
                                        <div class="text-sm">{{ $page.props.auth.user?.name }}</div>
                                        <div class="text-xs text-gray-500">{{ $page.props.auth.user?.email }}</div>
                                    </div>
                                    <div class="border-t border-gray-100"></div>
                                    <DropdownLink :href="route('admin.index')">Profile</DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">Logout</DropdownLink>
                                </template>
                            </Dropdown>
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

        <!-- Breadcrumb -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="text-sm">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <Link href="/" class="text-gray-500 hover:text-gray-700">
                            Home
                        </Link>
                        <ChevronRightIcon class="h-5 w-5 text-gray-400 mx-2" />
                    </li>
                    <slot name="breadcrumb" />
                </ol>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <slot />
        </main>

        <AppFooter/>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import {Link, usePage} from '@inertiajs/vue3'
import {SearchIcon, ChevronRightIcon, UserIcon} from 'lucide-vue-next'
import AppFooter from "@/Components/AppFooter.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { router } from '@inertiajs/vue3'
const { auth, can } = usePage().props;

const searchQuery = ref('')
const locationQuery = ref('Paris')

const handleSearch = () => {
    // Implement search logic here
    router.get('/places', {
        query: searchQuery.value,
        location: locationQuery.value
    }, {
        preserveState: true,
        preserveScroll: true
    })
}
</script>
