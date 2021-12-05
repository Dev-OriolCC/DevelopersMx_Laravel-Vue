<template>
    <Head title="Developers"/>
    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister" test="Walter"></NavBar>
    <div class="container">
        <div class="bg-red-300 md:flex flex-col md:flex-row md:min-h-screen w-full">
            <!--//! Aside with filter options -->
            <div class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
                <div class="flex-shrink-0 px-8 py-4 items-center ">
                    <!--//? FILTERS SEARCH -->
                    <p class="text-black text-lg font-semibold">Type Developer</p>
                        <ul>
                            <div v-for="type in this.typeDevelopers">
                                <li class="ml-2">
                                    <button name="filterSearch" id="filterSearch"
                                        @click="filterSearch(type.id, 'type')">{{ type.name }}
                                    </button>
                                </li>
                            </div>
                        </ul>
                    <p class="text-black text-lg font-semibold">Location</p>
                        <ul>
                            <div v-for="location in this.locations">
                                <li class="ml-2">
                                    <button name="" id=""
                                    @click="filterSearch(location, 'location')">{{ location }}
                                    </button>
                                </li>
                            </div>
                        </ul>
                </div>
            </div>
            <!--//! List of developers in square -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4" v-if="this.developersTotal > 0" >
                <div v-for="developer in this.developers">
                    <div class="mt-5 flex mx-5 items-center justify-center py-50">
                        <div class="border-2 border-indiglo-600 max-w-md bg-white rounded-xl overflow-hidden cursor-pointer hover:shadow-2xl hover:scale-105 
                            transform transition-all duration-500">
                            <!-- Images Section -->
                            <div v-if="developer.profile_pic" class="p-4">
                                <img class="rounded-xl" :src="this.public+'storage/'+developer.profile_pic" width="200" height="200" alt="no-image" />
                            </div>
                            <div v-else>
                                <img class="rounded-xl" :src="this.public+'images/default-profile.jpg'" width="230" height="230" alt="no-image" />
                            </div>
                            <div class=" p-6">
                                <div class="">
                                    <h1 class="text-lg font-bold text-center">{{ developer.user.name }}</h1>
                                    <h1 class="text-lg ">📍 {{ developer.location }}</h1>
                                    <h3 class="text-md">{{ developer.type_developer.name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else align="center">
                <p class=" text-lg">No developers found 😢</p>
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
        developersTotal: Number,
        locations: Array,
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
        
        },
        filterSearch(id, name) {
            console.log("searching "+name)
            console.log(id)
            this.$inertia.get(this.route('developers.search',[name, id]))
        }
    },
    mounted() {
        // console.log('INDEX');
        // console.log(this.canLogin); 
        // this.filterSearch(1000, 'test')
    }



}
</script>