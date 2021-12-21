<template>
    <Head title="Developer"/>
    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister"></NavBar>

    <!--//! Information about developer -->
    <!-- PROFILE TEMPLATE -->
    <div class="grid grid-flow-row-dense md:grid-cols-3">
        <!-- PROFILE INFORMATION -->
        <div class="col-span-2 sm:col-span-1 ">
                <!-- CIRCLE-PROFILE-IMAGE -->
                <div class="flex justify-center">
                    <div class=" my-6 px-8 py-2 rounded-md border-2 border-indigo-600">
                        <img
                            v-if="this.developer.profile_pic"
                            alt="..."
                            :src="this.public+'storage/'+this.developer.profile_pic"
                            class="shadow-xl rounded-full my-6 h-auto mx-auto border-none "
                            style="max-width: 150px;"
                        />
                        <img
                            v-else
                            alt="..."
                            :src="this.public+'/images/default-profile.jpg'"
                            class="shadow-xl rounded-full my-6 h-auto mx-auto border-none "
                            style="max-width: 150px;"
                        />
                        <div>
                            <h4 class="text-center text-xl font-bold">{{ this.developer.user.name }}</h4>
                            <h4 class="text-center text-lg" >{{ this.developer.type_developer.name }}</h4>
                            <h4 class="text-center text-base text-stone-400" >🏢🚩{{ this.developer.location }}, Mexico</h4>
                            <div class="flex space-x-6 justify-center ">
                                <div v-if="this.developer.social_twitter" class=" text-center">
                                    <a href="#" class="footer-icon hover:bg-blue-400">
                                        <span class="iconify" data-icon="mdi:twitter" data-width="35" data-height="35"></span>
                                    </a>
                                </div>
                                <div v-if="this.developer.social_github" class=" text-center">
                                    <a href="#" class="footer-icon hover:bg-blue-400">
                                        <span class="iconify" data-icon="mdi:github" data-width="35" data-height="35"></span>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
        </div>
        <!-- PROFILE SKILLS & PROJECTS -->
        <div class="col-span-2 ">
            <h4 class=" text-xl my-3 ml-6 font-bold">Information About {{this.developer.user.name}}</h4>
            <p class="mx-6 text-justify">{{ this.developer.description }}</p>
            <div class="flex flex-wrap mb-6">
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h4 class=" text-xl my-3 ml-6 font-bold">Experience</h4>
                    <p class="mx-6 text-justify">{{ this.developer.experience }} years</p>
                </div>
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h4 class=" text-xl my-3 ml-6 font-bold">Type Developer</h4>
                    <p class="mx-6 text-justify">{{ this.developer.type_developer.name }}</p>
                </div>
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h4 class=" text-xl my-3 ml-6 font-bold">Bio</h4>
                    <p class="mx-6 text-justify">{{ this.developer.bio }}</p>
                </div>
            </div>
            <!-- SKILLS -->
            <h4 class=" text-xl my-3 ml-6 font-bold">Skills({{ this.developer.skills.length }}) </h4>
                <div v-if="this.developer.skills.length > 0">
                    <div v-for="skill in this.developer.skills">
                        <p class="mx-6 text-justify text-base font-semibold my-2">{{skill.name}}
                        <span class="ml-10 text-base font-medium ">{{skill.description}}</span></p>
                    </div>
                </div>
                <div v-else>
                    <p class="mx-6 text-justify text-base  my-2">This developer has no skills.</p>
                </div>
            <!-- PROJECTS -->
            <h4 class=" text-xl my-3 ml-6 font-bold">Projects({{ this.developer.projects.length }}) </h4>
                <div v-if="this.developer.projects.length >0" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3">
                    <div v-for="project in this.developer.projects">
                        <!-- INDIVIDUAL CARD FOR PROJECT -->
                        <div class="mt-3 flex mx-5 items-center justify-center py-50">
                            <div class="max-w-md bg-white rounded-xl overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl hover:scale-105 
                                transform transition-all duration-500 border-2 border-indigo-300">
                                <!-- Images Section -->
                                <div v-if="project.project_image" class="p-4">
                                    <img class="rounded-xl" :src="this.public+'storage/'+project.project_image" width="300" height="250" alt="no-image" />
                                </div>
                                <div v-else>
                                    <img class="rounded-xl" :src="this.public+'images/no-image.jpg'" width="350" height="250" alt="Dog" />
                                </div>
                                <!-- END - ICONS Section -->
                                <div class="text-justify mx-4 py-2">
                                    <div class="flex items-center space-x-4">
                                        <h1 class="text-lg text-gray-900 font-bold">{{ project.title }}</h1>
                                    </div>
                                        <p>{{ project.description }}</p>
                                    <div class="flex space-x-6 items-center">
                                        <div class="flex space-x-2 items-center" v-if="project.demo_link">
                                            <span class="iconify" data-icon="mdi:github" data-width="25" data-height="25"></span>
                                        </div>
                                        <div class="flex space-x-2 items-center pr-4" v-if="project.repo_link">
                                            <span class="iconify" data-icon="mdi:application-outline" data-width="25" data-height="25"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- END CARD -->
                    </div>
                </div>
                <div v-else>
                    <p class="mx-6 text-justify text-base  my-2">This developer has no projects.</p>
                </div>

        </div>
    </div>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import NavBar from '../../Components/NavBar.vue';

export default {
    components: {
        Head, NavBar,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        developer: Array,
    },
    data() {
        return {
            public: 'http://localhost/Inertia/DevelopersMexico/public/',
        }
    },
    methods: {
        
    },
    mounted() {

        console.log(this.developer.skills.length)
    },
}
</script>