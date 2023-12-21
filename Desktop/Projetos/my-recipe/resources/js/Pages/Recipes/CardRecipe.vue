<script setup>

import { Link } from '@inertiajs/inertia-vue3';

    defineProps(['recipe']);
</script>

<template>
   <div class="min-w-sm w-72 h-96 bg-gray-50 shadow-md border-x border-y rounded-md border-gray-300 m-2 p-2 hover:border-teal-700 transition duration-500">
        <div class="h-48 w-full bg-white border-b border-gray-350 rounded-tr rounded-tl">
            <img class="w-full h-full rounded-tr rounded-tl" :src="'http://127.0.0.1:8000/'+recipe.image.path" id="image-recipe">
        </div>       
        <div class="w-full pt-2 pb-2">
            <ul>
                <li class="text-xl text-gray-600 mb-2">
                    <span class="mr-2">
                        <font-awesome-icon icon="fa-solid fa-bowl-rice"/>
                    </span>
                    {{ recipe.name }}
                </li>
                <li class="text-base text-gray-600">
                    <span class="mr-2">
                        <font-awesome-icon icon="fa-solid fa-utensils"/>
                    </span>
                    Serve {{ recipe.people_served }} pessoa(s)
                </li>
                <li class="text-base text-gray-600">
                    <span class="mr-2">
                        <font-awesome-icon icon="fa-solid fa-stopwatch" />
                    </span>
                    Tempo de preparo: {{ recipe.estimated_time }}
                </li>                    
            </ul>
        </div>
        <div class="w-full pt-2 pb-2 text-center mt-3">
            <Link :ref="route('home')" class="px-4 py-2 font-semibold text-sm bg-teal-600 text-white rounded-md shadow-sm hover:bg-teal-700 ease-in-out delay-150" 
            
            />
                <span class="mr-2">
                    <font-awesome-icon icon="fa-solid fa-rectangle-list" />
                </span>
                Ver receita
           
        </div>
    </div>
</template>