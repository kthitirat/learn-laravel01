<template>
    <Layout>
       <div class="px-4 md:px-8 lg:px-10 xl:px-16">
            <div class="card bg-base-100 w-96 shadow-xl">
            <figure>
                <img
                src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                alt="Shoes" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{$page.props.user.institution}}</h2>
                <p>If a dog chews shoes whose shoes does he choose?</p>
                <div class="card-actions justify-end">
                <Link :href="route('form')" class="btn btn-primary">แก้ไข</Link>
                </div>
            </div>
            </div>
       </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {Layout, Link},
    props: {
        
    },
    data() {
        return {
           
        };
    },
    mounted() {
       
    },
    methods: {
        
    },
    watch: {
        
    },
    computed: {}
};
</script>

<style scoped>
</style>
