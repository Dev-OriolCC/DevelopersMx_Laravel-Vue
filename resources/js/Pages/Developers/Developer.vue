<template>
    <Head title="Developer"/>
    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister"></NavBar>

    <!--//! Information about developer -->
    <!-- PROFILE TEMPLATE -->
    <div class="grid grid-flow-row-dense md:grid-cols-3">
        <!-- PROFILE INFORMATION -->
        <div class="col-span-2 sm:col-span-1 bg-green-200">
            <p class="text-center py-2">Projects & Skills</p>
                <!-- CIRCLE-PROFILE -->
                <div class="flex justify-center">
                    <div v-if="this.developer.profile_pic">
                        <img
                            alt="..."
                            :src="this.public+'storage/'+this.developer.profile_pic"
                            class="shadow-xl rounded-full h-auto align-middle border-none "
                            style="max-width: 150px;"
                        />
                    </div>
                    <div v-else>
                        <img
                            alt="..."
                            :src="this.public+'/images/default-profile.jpg'"
                            class="shadow-xl rounded-full h-auto align-middle border-none "
                            style="max-width: 150px;"
                        />
                    </div>
                </div>
        </div>
        <!-- PROFILE SKILLS & PROJECTS -->
        <div class="col-span-2 bg-red-200">Profile Information</div>
    </div>
    <p>Single page for developer</p>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import NavBar from '../../Components/NavBar.vue';

export default {
    components: {
        Head, NavBar,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        developer: Array,
    },
    data() {
        return {
            public: 'http://localhost/Inertia/DevelopersMexico/public/',
        }
    }
}
</script>