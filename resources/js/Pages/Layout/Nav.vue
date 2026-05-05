<template>
    <div class="w-full">
        <div class="w-full bg-blue-600 h-10 flex items-center px-4 lg:px-32">
            <p class="text-white">Phranakhon Si Ayutthaya Rajabhat University</p>
        </div>
        <div class="w-full shadow-md h-20 flex items-center justify-between px-4 lg:px-32">
            <div class="flex items-center">
                <h1 class="text-4xl font-bold uppercase">xxxx</h1>
                <h1 class="text-4xl font-bold text-blue-600">xxxx</h1>
            </div>
            <div class="flex gap-2">
                <!-- <Link
                    :href="route('index')"
                    class="text-blue-600 px-1 py-0.5 border-blue-600 border-l-0 border-r-0 border-t-0 border-2 font-bold hidden lg:block">
                    Home
                </Link> -->
                <Link
                    v-if="!$page.props.user"
                    :href="route('login')"
                    class="group flex items-center gap-1.5 text-blue-600 px-2.5 py-1   text-sm font-semibold transition-all duration-300"
                >
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="2" 
                        stroke="currentColor" 
                        class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-0.5"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>

                    <span class="hidden sm:block">Login</span>
                </Link>
                <!-- ถ้า login แล้ว -->
                <!-- <div v-if="this.$page.props.user">
                    <img :src="this.$page.props.user.profile_photo_url" class="h-8 w-8 rounded-full object-cover">                    
                </div> -->
                <div v-if="this.$page.props.user" class="flex-none gap-2">
                    <div class="dropdown dropdown-end">
                        <div class="btn btn-ghost btn-circle avatar" role="button" tabindex="0">
                            <div  class="w-10 rounded-full" >
                                <img :src="this.$page.props.user.profile_photo_url" alt="Admin Logo"/>
                            </div>
                        </div>
                        <ul class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52"
                            tabindex="0">                            
                            <!-- <li><a>Settings</a></li> -->
                            <li>
                                <button @click.prevent="logout">Logout</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "Nav",
    components: {Link},
    data() {
        return {};
    },
    methods: {
        logout() {
            Inertia.post(this.route('logout'));
        }
    },
    mounted() {
        
    },
};
</script>
