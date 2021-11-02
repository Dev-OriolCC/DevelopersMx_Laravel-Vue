<template>
    <Head title="Developers"/>

    <!--//! Aside with filter options -->
    
    
    <!--//! List of developers in square -->

    <NavBar :canLogin="this.canLogin" :canRegister="this.canRegister" test="Walter"></NavBar>

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
        test: String,
    },
    
    mounted() {
        console.log('INDEX');
        console.log(this.canLogin); 
    }



}
</script>