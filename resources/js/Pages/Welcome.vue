<template>
    <Head title="Welcome" />
    
    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister" test="Walter"></NavBar>
    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0" style="background-color: #619DF2">
        <div class="w-full text-center">
            <h1 class="title mt-5 text-white">Discover Developers & Tech Companies from Mexico</h1>
            <div class="text-center  mt-10">
                <img class="img-fluid mx-auto" :src="this.image+'index-1.png'" 
                width="350" height="350" alt="image-1">
            </div>
        
            <!-- ABOUT-->
            <div id="feature" class="bg-blue-100 py-24 mt-5">
                <div class="container">
                    <div class="flex flex-wrap items-center">
                        <div class="w-full lg:w-1/2">
                            <div class="mb-5 lg:mb-0">
                                <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">Learn More About Us</h2>
                                <div class="flex flex-wrap">
                                    <div class="w-full sm:w-1/2 lg:w-1/2">
                                        <div class="m-3 text-left ml-10">
                                            <div class="icon text-4xl">
                                                <span class="iconify" data-icon="mdi:briefcase-outline" style="color: #4F46E5;" data-width="45" data-height="45"></span>
                                            </div>
                                            <div class="features-content">
                                                <h4 class="feature-title">Discover Jobs</h4>
                                                <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam tempora quidem vel sint.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full sm:w-1/2 lg:w-1/2">
                                        <div class="m-3 text-left ml-10">
                                            <div class="icon text-4xl">
                                                <span class="iconify" data-icon="mdi:account-box" style="color: #4f46e5;" data-width="45" data-height="45"></span>
                                            </div>
                                            <div class="features-content">
                                                <h4 class="feature-title">Share Your Profile</h4>
                                                <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam tempora quidem vel sint.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full sm:w-1/2 lg:w-1/2">
                                        <div class="m-3 text-left ml-10">
                                            <div class="icon text-4xl">
                                                <span class="iconify" data-icon="mdi:human-greeting-proximity" style="color: #4f46e5;" data-width="45" data-height="45"></span>
                                            </div>
                                            <div class="features-content">
                                                <h4 class="feature-title">Connect with Companies</h4>
                                                <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam tempora quidem vel sint.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full sm:w-1/2 lg:w-1/2">
                                        <div class="m-3 text-left ml-10">
                                            <div class="icon text-4xl">
                                                <span class="iconify" data-icon="mdi:palette-outline" style="color: #4f46e5;" data-width="45" data-height="45"></span>
                                            </div>
                                            <div class="features-content">
                                                <h4 class="feature-title">Easy to Personalize</h4>
                                                <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam tempora quidem vel sint.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="mx-3 lg:mr-0 lg:ml-3 wow fadeInRight" data-wow-delay="0.3s">
                            <img :src="this.image+'index-2.png'" alt="">
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        
        
        <!-- SEEN ON -->
        <div id="clients" class="py-16 bg-blue-100">
            <div class="container-sm    ">
                <div class="text-center">
                    <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">As Seen On</h2>
                </div>
                <div class="flex flex-wrap justify-center">
                    <div class="w-1/2 md:w-1/4 lg:w-1/4">
                        <div class="m-3 wow fadeInUp">
                            <img class="client-logo" width="200" height="200" :src="this.image+'index-icon-1.png'" alt="">
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/4 lg:w-1/4">
                        <div class="m-3 wow fadeInUp" data-wow-delay="0.6s">
                            <img class="client-logo" width="200" height="200" :src="this.image+'index-icon-2.png'" alt="">
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/4 lg:w-1/4">
                        <div class="m-3 wow fadeInUp" data-wow-delay="0.9s">
                            <img class="client-logo" width="200" height="200" :src="this.image+'index-icon-3.png'" alt="">
                        </div>
                    </div>
                    <div class="w-1/2 md:w-1/4 lg:w-1/4">
                        <div class="m-3 wow fadeInUp" data-wow-delay="1.2s">
                            <img class="client-logo" width="200" height="200" :src="this.image+'index-icon-4.png'" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END-SEEN -->
        <!-- START-FREE -->
            <section id="Subscribes" class="text-center py-20 bg-blue-100">
                <div class="container">
                    <div class="flex justify-center mx-3 ">
                        <div class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2">
                            <h4 class="mb-3 section-heading wow fadeInUp">Start For Free</h4>
                            <p class="mb-4 text-gray-600  text-lg">
                                Create a developers or company account today!
                            </p>
                            <div class="flex justify-center mx-5">
                                <Link :href="route('register')" class="bg-white-200">
                                    <span class="iconify" data-icon="mdi:circle-edit-outline" style="color: #4f46e5;" data-width="60" data-height="60"></span>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- END-START -->
        </div>
    </div>

    <Footer></Footer>
</template>

<style scoped>
    .title { 
        font-size: 35px;
        font-weight: 900;
    }
    .feature-title {
        font-size: 25px;
    }
    .section-heading {
        font-size: 30px;
        font-weight: 700;
    }
</style>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from '../Components/NavBar';
import Footer from '../Components/Footer';

export default {
    components: {
        Head,
        Link,
        NavBar,
        Footer,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
    data () {
        return { 
            image: 'http://localhost/Inertia/DevelopersMexico/public/images/',
        }
    }
}
</script>
