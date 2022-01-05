<template>
    <Head title="Company Jobs" />
    <AuthenticatedCompany>
        <h3 v-if="this.jobs.length > 0" class="text-center my-3 text-lg font-semibold">
            <!-- //! Button -->
            <div class="" align="right">
                <Link class="mt-4 bg-indigo-600 uppercase text-white font-bold hover:shadow-md shadow text-xs
                px-4 py-2 rounded outline-none focus:outline-none sm:mr-16 mb-1"
                :href="route('jobs.create')" >Create a job</Link>
            </div>
            List of current job positions opened ({{this.jobs.length}}).
            <div class="grid grid-flow-row-dense md:grid-cols-1">
                <div class="col-span-2 sm:col-span-1 ">
                    <!--//* DIVIDEND -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden rounded-lg">
                                    <table class="min-w-full">
                                        <thead class="bg-blue-200 border-b">
                                            <tr>
                                                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                    Title
                                                </th>
                                                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                    Role
                                                </th>
                                                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                    Valid until
                                                </th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="job in jobs" class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ job.title }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ job.type_developer.name }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ formatDate(job.schedule)}}
                                                </td>
                                                <td>
                                                    <Link class="mt-4 bg-indigo-600 uppercase text-white font-bold hover:shadow-md shadow text-xs
                                                        px-4 py-2 rounded outline-none focus:outline-none sm:mr-16 mb-1"
                                                        :href="route('jobs.edit', job.id )" >
                                                        Edit
                                                    </Link>
                                                </td>
                                                <td>
                                                    <button type="button" class="mt-2 bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs
                                                        px-4 py-2 rounded outline-none focus:outline-none sm:mr-16 mb-1"
                                                        @click="deleteJob(job.id)"
                                                    >
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </h3>
        <div v-else>
            <h3 class="text-center my-3 text-lg font-semibold">
                No current job positions opened.
            </h3>
            <div class="" align="center">
                <Link class=" my-3 text-md"
                :href="route('jobs.create')" >Create a job position?</Link>
            </div>
        </div>
    </AuthenticatedCompany>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3';
import AuthenticatedCompany from '../../Layouts/AuthenticatedCompany.vue'

export default {
    components: {
        Head, AuthenticatedCompany, Link,

    },
    
    props: {
        'company': Array,
        'jobs': Array,
    },

    methods: {
        formatDate(date){
            var today = new Date();
            var newDate = new Date(date)

            const options = { year: "numeric", month: "long", day: "numeric" }
            var humanDate = new Date(date).toLocaleDateString(undefined, options)

            var difference = newDate.getTime() - today.getTime();
            var days = Math.ceil(difference / (1000 * 3600 * 24));
            console.log(days)
            return humanDate+" ("+days+" days left)";
        }, 
        deleteJob(id) {
            this.$inertia.delete(this.route('jobs.delete', id));
        }
    }


}
</script>