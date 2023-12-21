<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import CardRecipe from './CardRecipe.vue';

defineProps({
    recipe: Array,
});

</script>

<template>
    <Head title="Receita" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Receita
            </h2>
        </template>

        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-around flex-wrap min-h-96 p-6 bg-white border-b border-gray-200">
                      teste
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
