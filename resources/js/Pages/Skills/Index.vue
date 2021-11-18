<template>
    <Head title="Skills" />

    <BreezeAuthenticatedLayout>
        <section class="relative py-16">
                <div class="container mx-auto px-4">
                    <p>Total Skills: {{this.totalSkills}}</p>
                    <div align="right" v-if="formOpen == false">
                        <button 
                            class="bg-green-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded inline-flex 
                            focus:outline-none sm:mr-2 mb-1" @click="switchFormState" >
                            <span class="iconify" data-icon="carbon:add-alt" style="color: white;" data-width="25" data-height="25"></span>
                            <p class="ml-2 mt-1"> Skill</p>
                        </button>
                    </div>
                    <!-- //! FORM FOR NEW SKILL -->
                    <div v-if="formOpen">
                        <form class="w-full" @submit.prevent="submit">
                            <div class="px-6 mt-10 mb-10">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="name">
                                            Name
                                        </label>
                                        <BreezeInput id="name" type="text" class="mt-1 block w-full" 
                                            v-model="form.name" required autofocus autocomplete="name" 
                                        />
                                    </div>
                                    <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="email">
                                            Description
                                        </label>
                                        <BreezeInput id="description" type="text" class="mt-1 block w-full" 
                                            v-model="form.description" required autofocus autocomplete="description" 
                                        />
                                    </div>
                                    <!-- BUTTON -->
                                    <div class="ml-3">
                                        <button class="bg-green-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none
                                        mt-4 focus:outline-none sm:mr-2 mb-1" tabindex="-1" 
                                        type="button" @click="addNewSkill">Add New Skill</button>
                                    </div>
                                    <div class="ml-3">
                                        <button class="bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded inline-flex 
                                            mt-4 focus:outline-none sm:mr-2 mb-1" @click="switchFormState" >Cancel</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- TABLE -->
                    <div class="flex flex-col mt-2">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table v-if="totalSkills > 0" class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-blue-300">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-white-100 uppercase tracking-wider">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center text-sm font-medium text-white-100 uppercase tracking-wider">
                                                    Description
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr v-for="skill in skills">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ skill.name }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ skill.description }}</div>
                                                </td>
                                                <!--    BUTTONS TO EDIT & DELETE   -->
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button
                                                        class="bg-indigo-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                                        @click="switchModalState(skill.id, skill.name, skill.description)" type="button"
                                                    >
                                                    Edit
                                                    </button>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button
                                                        class="bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                                        @click="deleteSkill(skill.id, skill.name)" type="button"
                                                    >
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div v-else>
                                        <p>You don't have skills registered for this profile 😢</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END-TABLE -->
                </div>
        </section>
                    <!-- MODAL EDIT -->
                <div v-if="modalOpen == true" class="container flex justify-center mx-auto">
                        <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                            <div class="max-w-2xl p-6 bg-white">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-2xl">Edit Skill</h3>
                                    <!-- //! PENDING TASK -->
                                    <!--// ! CREATE BUTTON TO RESET AND SET MODAL TO TRUE & FALSE -->
                                    <button @click="switchModalState" type="button">
                                        <span class="iconify" data-icon="mdi:close-circle-outline" style="color: black;" 
                                        data-width="35" data-height="35"></span>
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <form @submit.prevent="update">
                                        <div class="mb-5">
                                            <label for="name" class="block font-bold text-gray-600">Name</label>
                                            <input type="text" name="name"
                                                class="w-full p-2 border border-gray-300 rounded-l shadow focus:outline-none focus:ring-2 focus:ring-purple-600"
                                                v-model="form.name">
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="block font-bold text-gray-600">Email</label>
                                            <input type="text" name="email" class="w-full p-2 border border-gray-300 rounded-l shadow"
                                                v-model="form.description">
                                        </div>
                                        <button type="submit" @click="updateSkill(form.id)"
                                            class="block w-full p-3 font-bold text-white bg-blue-500 rounded-l">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END MODAL -->

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue'


export default {
    components: {
        BreezeAuthenticatedLayout, BreezeInput,
        Head,
        Link
    },
    
    props: {
        developer: Object,
        user: Object,
        skills: Array,
        totalSkills: Number,
    },

    data() {
        return { 
            modalOpen: false,
            formOpen: false,

            form: this.$inertia.form({
                    id: '',
                    name: '',
                    description: '',
            })
        }
    },

    methods: {
        deleteSkill(id, name){
            if (confirm('Are you sure you want to delete this skill: '+name+' ?')) {
                this.$inertia.delete(this.route('skills.destroy', id))
            }
        },

        updateSkill(id) {
            // console.log('Edit - '+id)
            this.form.put(this.route('skills.update', id))
            this.switchModalState();
        },

        addNewSkill() {
            this.form.post(this.route('skills.store'))
            this.switchFormState();

        },

        switchFormState(){
            this.cleanFormData()
            this.formOpen = !this.formOpen
        },

        switchModalState(id, name, description){
            this.modalOpen = !this.modalOpen
            if (name != null && id != null) {
                this.form.id = id
                this.form.name = name
                this.form.description = description
            }
        },

        cleanFormData(){
            this.form.id = '';
            this.form.name = '';
            this.form.description = '';
        }
    }
}
</script>