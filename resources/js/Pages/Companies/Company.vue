<template>
    <Head title="Company"/>
    <AuthenticatedCompany />
    <p>Panel for a company</p>
    <p>{{ this.company }}</p>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import AuthenticatedCompany from '../../Layouts/AuthenticatedCompany.vue'

export default {
    components: {
        Head, AuthenticatedCompany
    },

    props: {
        'company': Array
    }

}
</script>