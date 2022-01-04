<template>
    <Head title="Company Create Job" />
    <AuthenticatedCompany>
        <div class="text-gray-800 mt-64 antialiased">
            <div class="relative py-1">
                <div class="container mx-auto px-4">
                    <div class="relative flex flex-col min-w-0 break words bg-white mb-6 shadow-xl rounded-lg -mt-64">
                        <form class="w-full" action="">
                            <!-- //! FIELDS FOR A NEW JOB -->
                            <p class="ml-4 mt-4">Complete all the required fields to post the job.</p>
                            <div class="px-6 mt-10 mb-10">
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <!-- //* Layer 1- [2] Items -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="title">
                                            Title
                                        </label>
                                        <BreezeInput id="title" type="text" class="mt-1 block w-full" 
                                            v-model="form.title" required autofocus autocomplete="title" 
                                        />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="role">
                                            Role
                                        </label>
                                        <select v-model="form.type_id" name="type_id" id="type_id" 
                                            class="w-full px-4 py-2 border-gray-300 rounded-lg" >
                                            <option v-for="role in roles" :value="role.id">
                                                {{role.name}}
                                            </option>
                                        </select>
                                    </div>
                                    <!-- //* Layer 2- [1] Items -->
                                    <div class="w-full md:w-1/1 px-3 mt-3 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="description">
                                            Description
                                        </label>
                                        <textarea name="description" id="description"
                                            class="w-full mt-2 px-4 py-2 border-gray-300 rounded-lg" 
                                            cols="" rows="2" v-model="form.description">

                                        </textarea>
                                    </div>
                                    <!-- //* Layer 3- [3] Items -->
                                    <div class="w-full mt-2 md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="location">
                                            Location
                                        </label>
                                        <BreezeInput id="location" type="text" class="mt-1 block w-full" 
                                            v-model="form.location" required autofocus autocomplete="location" 
                                        />
                                    </div>
                                    <div class="w-full mt-2 md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="level">
                                            Level
                                        </label>
                                        <select v-model="form.level" name="level" id="level" 
                                            class="w-full px-4 py-2 border-gray-300 rounded-lg" >
                                            <option v-for="level in levels" :value="level">
                                                {{level}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="w-full mt-2 md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="schedule">
                                            Schedule
                                        </label>
                                        <input type="date" id="schedule" class="w-full px-4 py-2 border-gray-300 rounded-lg"
                                            v-model="form.schedule" required autofocus autocomplete="schedule"
                                            :min="currentDate"
                                        >
                                        
                                    </div>
                                    <!-- //* Layer 4- [4] Items -->
                                    <div class="w-full mt-4 md:w-1/4 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="benefit_flexible">
                                            Flexible Hours
                                        </label>
                                        <input id="benefit_flexible" type="checkbox" class="rounded-md appearance-none
                                        checked:bg-blue-600 checked:border-transparent"
                                        v-model="form.benefit_flexible" required autofocus autocomplete="benefit_flexible"
                                        >
                                        Yes
                                    </div>
                                    <div class="w-full mt-4 md:w-1/4 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="benefit_dress">
                                            Informal Dress Code
                                        </label>
                                        <input id="benefit_dress" type="checkbox" class="rounded-md appearance-none
                                        checked:bg-blue-600 checked:border-transparent"
                                        v-model="form.benefit_dress" required autofocus autocomplete="benefit_dress"
                                        >
                                        Yes
                                    </div>
                                    <div class="w-full mt-4 md:w-1/4 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="benefit_medical">
                                            Health Coverage
                                        </label>
                                        <input id="benefit_medical" type="checkbox" class="rounded-md appearance-none
                                        checked:bg-blue-600 checked:border-transparent"
                                        v-model="form.benefit_medical" required autofocus autocomplete="benefit_medical"
                                        >
                                        Yes
                                    </div>
                                    <div class="w-full mt-4 md:w-1/4 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="benefit_vacation">
                                            Vacation Over Legal
                                        </label>

                                        <input id="benefit_vacation" type="checkbox" class="rounded-md appearance-none
                                        checked:bg-blue-600 checked:border-transparent"
                                        v-model="form.benefit_vacation" required autofocus autocomplete="benefit_vacation"
                                        >
                                        Yes
                                    </div>

                                    <!-- //! BUTTON -->
                                    <button class="mt-4 ml-2 bg-indigo-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" tabindex="-1"
                                    type="button" @click="createJob"
                                    >
                                    Create Job
                                    </button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedCompany>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3';
import AuthenticatedCompany from '../../Layouts/AuthenticatedCompany.vue'
import BreezeInput from '@/Components/Input.vue'


export default {
    components: {
        Head, Link, AuthenticatedCompany, BreezeInput
    },
    
    props: {
        'company': Array,
        'roles': Array,
        'levels': Array,
    },

    data() {
        return { 
            form: this.$inertia.form({
                type_id: '',
                title: '',
                description: '',
                location: '',
                level: '',
                schedule: '',
                benefit_flexible: '',
                benefit_dress: '',
                benefit_medical: '',
                benefit_vacation: '',
            }),
            currentDate: '',
        }
    },

    mounted() {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        this.currentDate = date
    },

    methods: {
        createJob() {
            this.form.post(this.route('jobs.store'))
            console.log('Job created')
        }
    },


}
</script>