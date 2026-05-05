<template>
    <Layout>
         <div class="mt-6 bg-white border border-gray-100 shadow-sm sm:rounded-xl overflow-hidden">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-400 uppercase bg-gray-50/50 border-b border-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold text-center w-16">#</th>
                            <th scope="col" class="px-6 py-4 font-semibold">ชื่อ - นามสกุล</th>
                            <th scope="col" class="px-6 py-4 font-semibold">หน่วยงาน</th>
                            <th scope="col" class="px-6 py-4 font-semibold">อีเมล</th>
                            <th scope="col" class="px-6 py-4 font-semibold">เบอร์โทร</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">สิทธิ์ / สถานะ</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">จัดการ</th>
                        </tr>
                    </thead>
                    
                    <tbody v-if="userData != null">
                        <tr v-for="(user, index) in userData" :key="index"
                            class="bg-white border-b border-gray-50 last:border-0 hover:bg-blue-50/30 transition-colors duration-200">
                            
                            <td class="px-6 py-4 text-center font-medium text-gray-400">
                                {{ user.id }}
                            </td>
                            
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">
                                    <Link :href="route('dashboard.users.edit',user.id)">
                                        {{ user.name }}
                                    </Link>
                                </div>
                            </td>
                             <td class="px-6 py-4">
                                {{ user.institution }}
                            </td>
                            
                            <td class="px-6 py-4 text-gray-500">
                                {{ user.email }}
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ user.tel }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ user.role.name }}
                                </span>
                            </td>
                            
                            <td class="px-6 py-4 text-right">
                                <button 
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg text-xs font-bold transition-all duration-200"
                                    type="button"
                                    @click="handleDeleteUser(user)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                         />
                                    </svg>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div v-if="pagination != null" class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="text-sm text-gray-500">
                แสดง <span class="font-semibold text-gray-900">{{ pagination.from }}</span> 
                ถึง <span class="font-semibold text-gray-900">{{ pagination.to }}</span> 
                จาก <span class="font-semibold text-gray-900">{{ pagination.total }}</span> รายการ
            </div>
            
            <div class="inline-flex shadow-sm rounded-xl overflow-hidden border border-gray-200 bg-white">
                <button 
                    v-for="(pag, index) in pagination.links" 
                    :key="index"
                    @click="selectPage(pag)"
                    :disabled="!pag.url"
                    v-html="pag.label"
                    class="px-4 py-2 text-sm font-medium transition-all duration-200 border-r last:border-0"
                    :class="[
                        pag.active 
                            ? 'bg-blue-600 text-white border-blue-600' 
                            : 'text-gray-600 hover:bg-gray-50 bg-white',
                        !pag.url ? 'opacity-30 cursor-not-allowed' : 'cursor-pointer'
                    ]"
                >
                </button>
            </div>
        </div>
    </Layout>

</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import {Link} from "@inertiajs/vue3";
import {nextTick} from "vue";

export default {
    name: "UserIndex",
    components: {Layout, Link},
    props: {
        users: {
            type: Object,
            required: true
        },
      
       
    },
    mounted() {
        this.userData = this.users.data;
        this.pagination = this.users.meta.pagination;
        //console.log(this.users)
    },
  
    data() {
        return {
            userData: null,
            pagination: null
        };
    },
    methods: {
        handleDeleteUser(user) {
            this.$swal.fire({
                title: "คุณต้องการที่จะลบชื่อผู้ใช้ " + user.name + '?',
                showDenyButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                denyButtonText: 'ลบ'
            }).then((result) => {
                if (result.isDenied) {
                    Inertia.delete(this.route('dashboard.users.destroy', user.id));
                    nextTick(() => {
                        window.location.reload();
                    })
                }
            });
        },
        selectPage(pag) {
            Inertia.get(pag.url);
        },
    }

};
</script>
