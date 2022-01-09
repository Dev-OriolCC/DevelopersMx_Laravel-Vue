<template>
    <Head title="Companies" />
    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister"></NavBar>
    <!-- //* START LIST -->
    <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table v-if="this.companies.length > 0" class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Contact Email</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Location</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left"></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr v-for="company in companies">
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/user-36-05.jpg" width="40" height="40" alt="Alex Shatov"></div>
                                            <div class="font-medium text-gray-800">{{ company.name }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ company.social_email }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium">{{ company.location }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-sm text-center text-indigo-600">View</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-else>
                            <p>No companies found...</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- //* END LIST -->

</template>

<script>
import NavBar from '../../Components/NavBar.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import BreezeInput from '@/Components/Input.vue';

export default {
    components: {
        NavBar, BreezeInput, Head, Link
    },
    props: {
        user: Object,
        companies: Array,
        canLogin: Boolean,
        canRegister: Boolean,
    },  
}
</script>