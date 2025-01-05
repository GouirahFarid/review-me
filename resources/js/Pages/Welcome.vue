<!-- resources/js/Pages/Home.vue -->
<template>
    <MainLayout>
        <!-- Hero Section -->
        <div class="bg-teal-800 h-[500px] relative rounded-xl">
            <div class=" mx-auto px-4 sm:px-6 lg:px-8 h-full w-full">
                <div class="flex items-center justify-center h-full text-black">
                    <div class="text-white">
                        <h1 class="text-4xl font-bold mb-8">
                            Découvrez et réservez le meilleur restaurant
                        </h1>
                        <SearchBar class="max-w-xl text-black"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Restaurants Sections -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- International Restaurants -->
                <div class="mt-16">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold">Populaire</h2>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <Link
                            v-for="place in places"
                            :href="route('places.show', 1)"
                        >
                            <PlaceCard

                                :key="place.id"
                                :place="place"
                            />
                        </Link>

                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import {ref} from 'vue'
import { Link } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import SearchBar from '@/Components/SearchBar.vue'
import PlaceCard from "@/Components/PlaceCard.vue";

const citiesContainer = ref(null)
const internationalContainer = ref(null);
const props = defineProps({
    auth: Object,
    places: Array
})

const sections = ref([
    {
        title: 'Restaurants populaires à Paris',
        restaurants: [
            {
                name: 'Terry\'s Café',
                cuisine: 'FRANÇAIS',
                rating: 8.7,
                price: 19,
                discount: 50,
                image: '/images/restaurants/terrys.jpg'
            },
            // Add more restaurants
        ]
    },
    {
        title: 'Restaurants populaires à Lyon',
        restaurants: [
            // Add Lyon restaurants
        ]
    }
])

const cities = ref([
    {name: 'Paris', slug: 'paris', image: '/images/cities/paris.jpg'},
    {name: 'Lyon', slug: 'lyon', image: '/images/cities/lyon.jpg'},
    {name: 'Marseille', slug: 'marseille', image: '/images/cities/marseille.jpg'},
    {name: 'Bordeaux', slug: 'bordeaux', image: '/images/cities/bordeaux.jpg'},
    {name: 'Toulouse', slug: 'toulouse', image: '/images/cities/toulouse.jpg'},
    {name: 'Montpellier', slug: 'montpellier', image: '/images/cities/montpellier.jpg'}
])

const internationalCities = ref([
    {name: 'Barcelone', slug: 'barcelona', image: '/images/cities/barcelona.jpg'},
    {name: 'Madrid', slug: 'madrid', image: '/images/cities/madrid.jpg'},
    {name: 'Valencia', slug: 'valencia', image: '/images/cities/valencia.jpg'}
])

const scrollContent = (container, direction) => {
    const scrollAmount = 400
    container.value.scrollLeft += direction === 'next' ? scrollAmount : -scrollAmount
}

const scrollCities = (direction) => scrollContent(citiesContainer, direction)
const scrollInternational = (direction) => scrollContent(internationalContainer, direction)
</script>
