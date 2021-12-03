<template>
    <Head title="Developers"/>
    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister" test="Walter"></NavBar>
    <div class="container">
        <!--//! Aside with filter options -->
        <div class="bg-red-300 md:flex flex-col md:flex-row md:min-h-screen w-full">
            <div class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
                <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                    <p class="">Type Developer</p>
                    --
                    <p class="">Location</p>

                </div>
            </div>
            <!--//! List of developers in square -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                        <div v-for="developer in this.developers">
                            <div class="mt-5  flex mx-5 items-center justify-center py-50">
                                    <div class="border-2 border-indiglo-600 max-w-md bg-white rounded-xl overflow-hidden cursor-pointer hover:shadow-2xl hover:scale-105 
                                        transform transition-all duration-500">
                                        <!-- Images Section -->
                                        <div v-if="developer.profile_pic" class="p-4">
                                            <img class="rounded-xl" :src="this.public+'storage/'+developer.profile_pic" width="200" height="200" alt="no-image" />
                                        </div>
                                        <div v-else>
                                            <img class="rounded-xl" :src="this.public+'images/no-image.jpg'" width="250" height="250" alt="no-image" />
                                        </div>

                                        <div class=" p-6">
                                            <div class="">
                                                <h1 class="text-lg font-bold text-center">{{ developer.user.name }}</h1>
                                                <h1 class="text-lg font-bold">📍 {{ developer.location }}</h1>
                                                <h3 class="text-md">{{ developer.type_developer.name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
        </div><!-- END -->

    </div><!-- CONTAINER -->

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import NavBar from '../../Components/NavBar.vue';

export default {
    components: {
        Head, NavBar
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        developers: Array,
        typeDevelopers: Array,
    },
    data() {
        return { 
            public: 'http://localhost/Inertia/DevelopersMexico/public/',
            open: false,
        }
    },
    methods: {
        changeMenu(){
            this.open = !this.open
        
        }
    },
    mounted() {
        console.log('INDEX');
        console.log(this.canLogin); 
    }



}
</script>