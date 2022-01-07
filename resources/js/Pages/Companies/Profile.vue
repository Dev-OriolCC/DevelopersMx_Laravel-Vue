<template>
    <AuthenticatedCompany>

        <div class="grid grid-flow-row-dense md:grid-cols-1">
            <div class="col-span-2 sm:col-span-1 ">
                <div class="flex bg-blue-400 justify-center text-justify">
                    <img v-if="this.image"
                        :src="this.image+this.company.image" 
                        alt=""
                    />
                    <p class="my-10 text-4xl font-bold">{{ this.company.name }}</p>
                    <p>{{ this.company.description }}</p>
                    <!-- //? Social media icons -->
                </div>
                <div align="right">
                    <Link
                        class="bg-indigo-600 active:bg-pink-600 uppercase text-white font-bold 
                        hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none
                        focus:outline-none sm:mr-4 mb-1"
                        :href="route('companies.edit', this.company.id)"
                        style="transition: all 0.15s ease 0s;"
                    >
                    Edit
                    </Link>

                </div>
            </div>
        </div>

        {{this.company}}


    </AuthenticatedCompany>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3';
import AuthenticatedCompany from '../../Layouts/AuthenticatedCompany.vue'
import BreezeInput from '@/Components/Input.vue'

export default {
    components: {
        Head, 
        Link, 
        AuthenticatedCompany, 
        BreezeInput
    },
    
    props: {
        'company': Array,
    },
    data() {
        return {
            image: 'http://localhost/Inertia/DevelopersMexico/public/',
        }
    }

}
</script>