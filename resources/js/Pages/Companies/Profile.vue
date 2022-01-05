<template>
    <AuthenticatedCompany>
        
        <p>Profilee</p>

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
        'company': Array,
    }

}
</script>