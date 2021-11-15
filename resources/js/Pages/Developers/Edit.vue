<template>
    <Head title="Developer"/>
    
    <BreezeAuthenticatedLayout>

    <div class="text-gray-800 mt-64 antialiased">
        <div class="profile-page">
            <section class="relative py-16">
                <div class="container mx-auto px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white mb-6 shadow-xl rounded-lg -mt-64">
                        <form class="w-full" @submit.prevent="update">
                            <!--//! EDIT Information about developer -->
                            <div class="px-6 mt-10 mb-10">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <!-- // ? TWO -->
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="name">
                                                Name
                                            </label>
                                            <BreezeInput id="name" type="text" class="mt-1 block w-full" 
                                                v-model="form.name" required autofocus autocomplete="name" 
                                            />
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="email">
                                                Email
                                            </label>
                                            <BreezeInput id="email" type="text" class="mt-1 block w-full" 
                                                v-model="form.email" required autofocus autocomplete="email" 
                                            />
                                        </div>
                                        <!-- // ? THREE -->
                                        <div class="w-full md:w-1/3 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="location">
                                                Location
                                            </label>
                                            <BreezeInput id="location" type="text" class="mt-1 block w-full" 
                                                v-model="form.location" required autofocus autocomplete="location" 
                                            />
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="experience">
                                                Years of experience
                                            </label>
                                            <BreezeInput id="experience" type="number" class="mt-1 block w-full" 
                                                v-model="form.experience" required autofocus autocomplete="experience" 
                                            />
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="type_developer">
                                                Type of Developer
                                            </label>
                                            <select v-model="form.type_id" name="type_id" id="type_id" >
                                                <option v-for="type in DeveloperTypes" :value="type.id">
                                                    {{type.name}}
                                                </option>

                                                <!-- <option  v-for="type in DeveloperTypes" value="type.id">{{type.name}}</option> -->
                                            </select>
                                            <!-- <BreezeInput id="type_developer" type="text" class="mt-1 block w-full" 
                                                v-model="form.type_developer" required autofocus autocomplete="type_developer" 
                                            /> -->
                                        </div>
                                        <!-- // ? FOUR -->
                                        <div class="w-full md:w-1/3 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="social_github">
                                                Github
                                            </label>
                                            <BreezeInput id="social_github" type="text" class="mt-1 block w-full" 
                                                v-model="form.social_github" required autofocus autocomplete="social_github" 
                                            />
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="social_twitter">
                                                Twitter
                                            </label>
                                            <BreezeInput id="social_twitter" type="text" class="mt-1 block w-full" 
                                                v-model="form.social_twitter" required autofocus autocomplete="social_twitter" 
                                            />
                                        </div>
                                        <div class="w-full md:w-1/3 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="social_email">
                                                Contact Email
                                            </label>
                                            <BreezeInput id="social_email" type="text" class="mt-1 block w-full" 
                                                v-model="form.social_email" required autofocus autocomplete="social_email" 
                                            />
                                        </div>
                                        <div class="w-full md:w-1/1 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="bio">
                                                Bio
                                            </label>
                                            <BreezeInput id="bio" type="text" class="mt-1 block w-full" 
                                                v-model="form.bio" required autofocus autocomplete="bio" 
                                            />
                                        </div>
                                        <div class="w-full md:w-1/1 px-3 mt-4">
                                            <label class="block uppercase tracking-wide text-blue-700 text-xs font-bold mb-2" for="description">
                                                Description
                                            </label>
                                            <textarea name="description" id="description"
                                            class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg" cols="" rows="2" v-model="form.description">

                                            </textarea>
                                        </div>
                                        <!--  -->
                                        <Link :href="route('dashboard')"  
                                            class="bg-red-600 uppercase text-white font-bold hover:shadow-md 
                                            shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1">
                                            Cancel
                                        </Link>
                                        <!-- BUTTON -->
                                        <button class="bg-indigo-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1" tabindex="-1" 
                                        type="button" @click="update">Update Profile</button>
                                        
                                    </div>

                            </div>
                            
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

        <!-- <p>Developer: {{this.Developer}} </p> <br>
        <p>User: {{this.User}} </p>
        <p>User: {{this.Type_Developer}} </p>
        <p>User: {{this.DeveloperTypes}} </p> -->
        
    </BreezeAuthenticatedLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeInput from '@/Components/Input.vue'

export default {
    // name: "DeveloperEdit",
    
    components: {
        Head, Link, BreezeAuthenticatedLayout, BreezeInput
    },
    
    props: {
        User: Object,
        Developer: Object,
        Developer_Skills: Array,
        Type_Developer: Object,
        DeveloperTypes: Array,
    },

    remember: 'form',

    data() {
        return {
            form: this.$inertia.form({
                    name: this.User.name,
                    email: this.User.email,
                    profile_pic: this.Developer.profile_pic,
                    location: this.Developer.location,
                    description: this.Developer.description,
                    experience: this.Developer.experience,
                    social_github: this.Developer.social_github,
                    social_twitter: this.Developer.social_twitter,
                    social_email: this.Developer.social_email,
                    //
                    bio: this.Developer.bio,
                    //
                    type_id: this.Developer.type_id,
                }),
        }
    },

    methods: {
        update(){
            if (confirm('Are you sure you want to update?')) {
                this.form.put(this.route('developers.update', this.User.id))
                console.log('Walter');
            }
        }
    }

}
</script>