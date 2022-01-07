<template>
    <Head title="Edit Company" />
    <AuthenticatedCompany>
        <div class="text-gray-800 mt-64 antialiased">
            <div class="profile-page">
                <section class="relative py-16">
                    <div class="container mx-auto px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white mb-6 shadow-xl rounded-lg -mt-64">
                            <form class="w-full" @submit.prevent="update">
                                <!--//! EDIT Information about developer -->
                                <div class="px-6 mt-10 mb-10">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <!-- // ? ONE-[3 Items] -->
                                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="name">
                                                    Name
                                                </label>
                                                <BreezeInput id="name" type="text" class="mt-1 block w-full" 
                                                    v-model="form.name" required autofocus autocomplete="name" 
                                                />
                                            </div>
                                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="social_email">
                                                    Email
                                                </label>
                                                <BreezeInput id="social_email" type="text" class="mt-1 block w-full" 
                                                    v-model="form.social_email" required autofocus autocomplete="social_email" 
                                                />
                                            </div>
                                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="company_image">
                                                    Company Logo
                                                </label>
                                                <div v-if="this.form.company_image">
                                                    <img :src="this.image+'storage/'+this.form.company_image" alt="company_image" 
                                                    width="100" height="100" class="mb-2" >
                                                </div>
                                                <input type="file" ref="photo" class="w-full px-2 py-1 border rounded-md focus:outline-none
                                                    focus:ring-1 focus:ring-blue-600"
                                                />
                                            </div>
                                            <!-- // ? TWO-[3 Items] -->
                                            <div class="w-full md:w-1/2 px-3 mt-4">
                                                <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="location">
                                                    Location
                                                </label>
                                                <BreezeInput id="location" type="text" class="mt-1 block w-full" 
                                                    v-model="form.location" required autofocus autocomplete="location" 
                                                />
                                            </div>
                                            <div class="w-full md:w-1/2 px-3 mt-4">
                                                <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" 
                                                for="social_linkedin">
                                                    LinkedIn
                                                </label>
                                                <BreezeInput id="social_linkedin" type="text" class="mt-1 block w-full" 
                                                    v-model="form.social_linkedin" required autofocus autocomplete="social_linkedin" 
                                                />
                                            </div>
                                            
                                            <!--  -->
                                            <Link :href="route('company.profile')"  
                                                class="bg-red-600 uppercase text-white font-bold hover:shadow-md 
                                                shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1">
                                                Cancel
                                            </Link>
                                            <!-- BUTTON -->
                                            <button class="bg-indigo-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" tabindex="-1" 
                                            type="button" @click="updateCompany">Update Profile</button>
                                            
                                        </div>

                                </div>
                                
                            </form>
                        </div>
                    </div>
                </section>
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
        company: Array, 
    },
    data() {
        return { 
            form: this.$inertia.form({
                name: this.company.name,
                description: this.company.description,
                company_image: this.company.company_image,
                social_email: this.company.social_email,
                social_linkedin: this.company.social_linkedin,
                location: this.company.location,
            })
        }
    },
    methods: {
        updateCompany(){
            if (confirm('Are you sure you want to update?')) {
                let image = this.verifyImage()
                if (image) {
                    this.form.company_image = this.$refs.photo.files[0];
                }
                this.form.post(this.route('companies.updateProfile', this.company.id))
            }
        },
        verifyImage(){
            if (this.$refs.photo) {
                return true
            }
            return false
        }
    }

}
</script>