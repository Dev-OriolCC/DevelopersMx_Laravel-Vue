<template>
    <Head title="Company"/>
    <AuthenticatedCompany>

        <div class="grid grid-flow-row-dense md:grid-cols-1">
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex bg-blue-300 justify-center text-justify">
                    <p class="my-10 text-4xl font-bold">{{ this.company.name }}</p>
                </div>
                <p class="text-center my-3 text-lg font-semibold">List of interesting developers to connect with your company.</p>
                <!--//! NEW -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden  rounded-lg">
                                <table class="min-w-full">
                                    <thead class="bg-blue-200 border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Name
                                            </th>
                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Role
                                            </th>
                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Experience (Years)
                                            </th>
                                            <th>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="developer in developers" class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <!-- //! FINISH LINK -->
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{developer.user.name}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{developer.type_developer.name}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{developer.experience}}
                                                </td>
                                                <td>
                                                    <Link :href="route('developers.show', developer.id)">View</Link>
                                                </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </AuthenticatedCompany>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import AuthenticatedCompany from '../../Layouts/AuthenticatedCompany.vue'
import { Link } from '@inertiajs/inertia-vue3';


export default {
    components: {
        Head, AuthenticatedCompany, Link
    },

    props: {
        'company': Array,
        'developers': Array,
    }

}
</script>