<template>
    <Layout>
        <AnnouncementForm :all-categories="allCategories" :all-types="allTypes"
                          :announcement="announcement"
                          mode="edit"
        />
    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link} from "@inertiajs/vue3";
import {useForm} from '@inertiajs/inertia-vue3';

export default {
    name: "AnnouncementCreate",
    components: {Layout, Link},
    props: {
       
    },
    mounted() {
    },
    data() {
        return {};
    },
    methods: {},
    watch: {}
};
</script>
