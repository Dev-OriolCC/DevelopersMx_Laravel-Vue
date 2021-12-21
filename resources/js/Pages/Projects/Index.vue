<template>
    <Head title="Projects" />
    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister"></NavBar>
    <div class="container">
        <!-- CONTENT FOR THIS SPECIFIG PAGE -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4" v-if="this.projects.length > 0" >
            <div v-for="project in this.projects">
                <a href="/">
                    <div class="mt-5 flex mx-5 items-center justify-center py-50">
                        <div class="border-2 border-indiglo-600 max-w-md bg-white rounded-xl overflow-hidden cursor-pointer hover:shadow-2xl hover:scale-105 
                            transform transition-all duration-500">
                            <!-- Images Section -->
                            <div v-if="project.project_image" class="p-4">
                                <img class="rounded-xl" :src="this.public+'storage/'+project.project_image" width="200" height="200" alt="no-image" />
                            </div>
                            <div v-else>
                                <img class="rounded-xl" :src="this.public+'images/default-profile.jpg'" width="230" height="230" alt="no-image" />
                            </div>
                            <div class=" p-6">
                                <div class="">
                                    <h1 class="text-lg font-bold text-center">{{ project.title }}</h1>
                                    <h1 class="text-lg ">{{ project.description }}</h1>
                                    <h3 class="text-md">By </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div v-else align="center">
            <p class=" text-lg">No projects found 😢</p>
        </div>
    </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import NavBar from '../../Components/NavBar.vue'

export default {
    components: {
        Head, NavBar
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        projects: Array
    },
    data() {
        return {
            public: 'http://localhost/Inertia/DevelopersMexico/public/',
        }
    },


}
</script>