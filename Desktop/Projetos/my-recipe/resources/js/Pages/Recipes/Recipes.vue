<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import CardRecipe from './CardRecipe.vue';

defineProps({
    recipes: Array,
});

</script>

<template>
    <Head title="Receitas" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Receitas
            </h2>
        </template>

        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-around flex-wrap min-h-96 p-6 bg-white border-b border-gray-200">
                        <CardRecipe 
                            v-for="recipe in recipes"
                                :key="recipe.id"
                                :recipe="recipe"
                        />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
