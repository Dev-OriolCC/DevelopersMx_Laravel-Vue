<template>
    <header class="header-2">
        <nav class="bg-white py-2 md:py-4">
            <div class="container px-4 mx-auto md:flex md:items-center">

                <div class="flex justify-between items-center">
                    <Link :href="route('index')" class="font-bold h text-2xl text-indigo-600">Developers Mexico</Link>
                    <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
                    <Link :href="route('index')" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Home</Link>
                    
                    <Link :href="route('developers.index')" 
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded transition-colors hover:bg-gray-200 duration-300"
                        :class="isUrl('developers') ? 'bg-gray-200' : ''"
                        >Developers</Link>
                    <Link :href="route('projects.index')" 
                        class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"
                        :class="isUrl('projects') ? 'bg-gray-200' : ''"
                        >Projects</Link>
                    <a href="#" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Companies</a>
                    <a href="#" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">About</a>
                    <a href="#" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">API</a>
                    <div v-if="canLogin" class="mt-2">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class=" p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">
                            Profile
                        </Link>
                        <div v-else>
                            <Link :href="route('login')"  
                            class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">
                                Login
                            </Link>
                            <Link v-if="canRegister" :href="route('register')" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">
                                Register
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
    </header>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "NavBar",
    
    components: {
        Link,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        test: String,
    },

    mounted() {
        console.log('NAVBAR');
        console.log(this.canLogin); 
        // console.log(test); 
    },

    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1)
            if (urls[0] === '') {
                return currentUrl === ''
            }
            // console.log("LINK: "+currentUrl)
            return urls.filter((url) => currentUrl.endsWith(url)).length
        },
    }



}

</script>