<template>
    <Head title="Projects" />
    <BreezeAuthenticatedLayout>
        <div class="container">
            <div v-if="this.totalProjects">
                <h5 class="mt-4 ml-6 text-2xl">Total Projects: {{ this.totalProjects }} </h5>
            </div>
            <div v-else>
                <h5 class="mt-4 ml-6 text-2xl text-center">You have dont have any projects 😢</h5>
            </div>
            <div align="right" class="mr-4">
                <Link class="bg-green-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded inline-flex
                focus:outline-none sm:mr-2 mb-1"
                :href="route('projects.create')"
                >
                    <span class="iconify" data-icon="carbon:add-alt" style="color: white;" data-width="25" data-height="25"></span>
                    <p class="mt-1 ml-2">Project</p>
                </Link>
            </div>
        <!-- GRID TEST -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4" v-if="this.totalProjects > 0">
                <!--    CONDITION BEFORE CYCLE    -->
                <div v-for="project in projects">
                    
                    <!-- PROJECT CARD -->
                    <div class="mt-10 bg-gray-100 flex mx-5 items-center justify-center py-50">
                        <div class="max-w-md bg-white rounded-xl overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl hover:scale-105 
                            transform transition-all duration-500">
                            <!-- Images Section -->
                            <div v-if="project.project_image" class="p-4">
                                <img class="rounded-xl" :src="this.public+'storage/'+project.project_image" width="300" height="250" alt="no-image" />
                            </div>
                            <div v-else>
                                <img class="rounded-xl" :src="this.public+'images/no-image.jpg'" width="250" height="250" alt="Dog" />
                            </div>
                            <!-- END - Images Section -->
                            <div class="flex justify-between p-6">
                                <div class="flex items-center space-x-4">
                                    <h1 class="text-lg text-gray-900 font-bold">{{ project.title }}</h1>
                                </div>
                                <div class="flex space-x-6 items-center">
                                    <div class="flex space-x-2 items-center" v-if="project.demo_link">
                                        <span class="iconify" data-icon="mdi:github" data-width="25" data-height="25"></span>
                                    </div>
                                    <div class="flex space-x-2 items-center pr-4" v-if="project.repo_code">
                                        <span class="iconify" data-icon="mdi:application-outline" data-width="25" data-height="25"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between p-6">
                                <Link class="flex items-center space-x-4 bg-blue-600 uppercase text-white font-bold 
                                    hover:shadow-md shadow text-xs px-2 py-2 rounded focus:outline-none sm:mr-2 mb-1"
                                    :href="route('projects.edit',project.id)">
                                    Edit
                                </Link>
                                <!-- DELETE -->
                                <button class="flex items-center space-x-4 bg-red-600 uppercase text-white font-bold 
                                    hover:shadow-md shadow text-xs px-2 py-2 rounded focus:outline-none sm:mr-2 mb-1"
                                    @click="deleteProject(project.id, project.title)">
                                    Delete
                                </button>
                            </div>
                            
                        </div>
                    </div>
                    <!-- END - CARD -->

                </div>
            </div>
        <!-- END GRID -->
        </div>
    </BreezeAuthenticatedLayout>

</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue'
export default {
    components: {
        Head, Link, BreezeAuthenticatedLayout, BreezeInput,
    },
    props: {
        totalProjects: Number,
        projects: Array,
    },
    data() {
        return { 
            public: 'http://localhost/Inertia/DevelopersMexico/public/'
        }
    },
    methods: {
        deleteProject(id, title) {
            if (confirm('Are you sure you want to delete this skill: '+title+' ?')) {
                this.$inertia.delete(this.route('projects.destroy', id))
            }
        }
    }
}
</script>