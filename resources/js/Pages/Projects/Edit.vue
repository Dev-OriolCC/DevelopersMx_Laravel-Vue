<template>
    <Head title="Edit Developer" />
    <BreezeAuthenticatedLayout>
        
        <div class="text-gray-800 mt-64 antialiased">
            <div class="profile-page">
                <section class="relative py-16">
                    <div class="container mx-auto px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white mb-6 shadow-xl rounded-lg -mt-64">
                            <form class="w-full" @submit.prevent="update" enctype="multipart/form-data">
                                <div class="px-6 mt-10 mb-10">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <!-- COMPONENTES DE FORMULARIO -->
                                        
                                        <!-- TITLE -->
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="title">
                                                Title
                                            </label>
                                            <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"
                                                required autofocus autocomplete="title" 
                                            />
                                        </div>

                                        <!-- IMAGE -->
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="project_image">
                                                Project Image
                                            </label>
                                            <!-- <BreezeInput id="project_image" type="file" class="mt-1 block w-full" 
                                            ref="photo" v-model="form.project_image"
                                                required autofocus autocomplete="project_image" 
                                            /> -->
                                            <input type="file" ref="photo" class="w-full px-2 py-1 border rounded-md focus:outline-none
                                                focus:ring-1 focus:ring-blue-600"/>
                                        </div>

                                        <!-- DESCRIPTION -->
                                        <div class="w-full md:w-1/1 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="description">
                                                Description
                                            </label>
                                            <textarea name="description" id="description" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg"
                                            cols="" rows="4" v-model="form.description">
                                            </textarea>
                                        </div>

                                        <!-- DEMO LINK -->
                                        <div class="w-full md:w-1/2 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="demo_link">
                                                Demo Link
                                            </label>
                                            <BreezeInput id="demo_link" type="text" class="mt-1 block w-full" v-model="form.demo_link"
                                                required autofocus autocomplete="demo_link" 
                                            />
                                        </div>

                                        <!-- REPO CODE -->
                                        <div class="w-full md:w-1/2 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="repo_link">
                                                Repo Link
                                            </label>
                                            <BreezeInput id="repo_link" type="text" class="mt-1 block w-full" v-model="form.repo_link"
                                                required autofocus autocomplete="repo_link" 
                                            />
                                        </div>

                                        <div class="ml-3">
                                            <button class="bg-green-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none
                                            mt-4 focus:outline-none sm:mr-2 mb-1" tabindex="-1" 
                                            type="button" @click="addNewProject">Add New Project</button>
                                        </div>
                                        
                                        <div class="ml-3">
                                            <Link :href="route('profile.projects')" class="bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded inline-flex 
                                            mt-4 focus:outline-none sm:mr-2 mb-1">Cancel</Link>
                                        </div>

                                        
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    
    </BreezeAuthenticatedLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeInput from '@/Components/Input.vue'

export default {
    components: {
        Head, Link, BreezeAuthenticatedLayout, BreezeInput
    }, 

    props: {
        developer: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                    developer_id: '',
                    title: 'ExampleTitle',
                    project_image: '',
                    description: '',
                    demo_link: '',
                    repo_link: ''
            }),
            image: 'http://localhost/Inertia/DevelopersMexico/public/'
        }
    }, 

    methods: {
        addNewProject(){
            if (this.$refs.photo) {
                this.form.project_image = this.$refs.photo.files[0];
            }
            // console.log(this.form.project_image.name)
            this.form.post(this.route('projects.store'))
        }
    }

}
</script>