<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template> -->

        <!-- PROFILE-TEMPLATE -->
        <div class="text-gray-800 antialiased">
            <div class="profile-page">
                <!-- BACKGROUND-IMAGE -->
                <section class="relative block" style="height: 500px;">
                    <div
                    class="absolute top-0 w-full h-full bg-center bg-cover"
                    style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'
                    >
                        <span
                            id="blackOverlay"
                            class="w-full h-full absolute opacity-50 bg-black"
                        ></span>
                    </div>
                    <div
                    class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                    style="height: 70px;"
                    >
                        <svg
                            class="absolute bottom-0 overflow-hidden"
                            xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="none"
                            version="1.1"
                            viewBox="0 0 2560 100"
                            x="0"
                            y="0"
                        >
                            <polygon
                            class="text-gray-300 fill-current"
                            points="2560 0 2560 100 0 100"
                            ></polygon>
                        </svg>
                    </div>
                </section>
                <!-- END-BACKGROUND-IMAGE -->
                <!-- PROFILE CONTENT -->
                <section class="relative py-16 bg-gray-300">
                    <div class="container mx-auto px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                            <div class="px-6">
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                        <div class="relative">
                                            <!-- CIRCLE-PROFILE -->
                                            <div v-if="this.developer.profile_pic">
                                                <img
                                                alt="..."
                                                :src="this.image+this.developer.profile_pic"
                                                class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                                style="max-width: 150px;"
                                                />
                                            </div>
                                            <div v-else>
                                                <img
                                                alt="..."
                                                src="https://previews.123rf.com/images/thesomeday123/thesomeday1231712/thesomeday123171200009/91087331-default-avatar-profile-icon-for-male-grey-photo-placeholder-illustrations-vector.jpg"
                                                class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                                style="max-width: 150px;"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                        <div class="py-6 px-3 mt-32 sm:mt-0">
                                            <Link
                                                class="bg-indigo-600 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                                :href="route('developers.edit', { developer: $page.props.auth.user.id })"
                                                style="transition: all 0.15s ease 0s;"
                                            >
                                            Edit
                                            </Link>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                            <div v-if="this.developer.social_twitter" class="mr-4 p-3 text-center">
                                                <a href="#" class="footer-icon hover:bg-blue-400">
                                                    <span class="iconify" data-icon="mdi:twitter" data-width="35" data-height="35"></span>
                                                </a>
                                            </div>
                                            <div v-if="this.developer.social_github" class="mr-4 p-3 text-center">
                                                <a href="#" class="footer-icon hover:bg-blue-400">
                                                    <span class="iconify" data-icon="mdi:github" data-width="35" data-height="35"></span>
                                                </a>
                                            </div>
                                            <div class="lg:mr-4 p-3 text-center">
                                                <a v-if="this.developer.social_email" href="#" class="footer-icon hover:bg-blue-400">
                                                    <span class="iconify" data-icon="mdi:email" data-width="35" data-height="35"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- GENERAL INFO -->
                                <div class="text-center align-center mt-12">
                                    <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2">{{ this.user.name }}</h3>
                                    <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase">                                        
                                        🏢🚩{{ this.developer.location }}, Mexico
                                    </div>
                                    <div v-if="this.type_developer" class="mb-2 text-gray-700 mt-4">
                                        <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                                        ><b>{{ this.type_developer.name }}</b>
                                    </div>
                                    <div class="mb-2 text-gray-700">
                                        <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                                        >{{ this.developer.experience }} Years of experience
                                    </div>
                                </div>
                                <!-- END-GENERAL INFO -->

                                <!-- LAST-DESCRIPTION-INFO -->
                                <div class="mt-10 py-10 border-t border-gray-300 text-center">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full lg:w-9/12 px-4">
                                            <p v-if="this.developer.description" class="mb-4 text-lg leading-relaxed text-gray-800 text-justify">
                                                {{ this.developer.description }}
                                            </p>
                                            <p v-else>
                                                <i>Enter a description about yourself to make this profile more interesting.</i> 😎👍
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END-DESCRIPTION-INFO -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END-PROFILE CONTENT -->
            </div>
        </div>

        <!-- END-PROFILE-TEMPLATE -->

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link
    },

    props: {
        developer: Object,
        user: Object,
        type_developer: Object,
    },
    data () {
        return { 
            image: 'http://localhost/Inertia/DevelopersMexico/public/storage/',
        }
    }
}
</script>
