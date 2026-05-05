<template>
    <Layout>
        <div class="min-h-screen bg-gray-50 py-8">
            <div class="mx-auto w-full max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                <h1 class="text-2xl font-bold text-gray-800">แก้ไขข้อมูลผู้ใช้งาน</h1>
                <p class="text-sm text-gray-500">
                    จัดการข้อมูลผู้ใช้งานในระบบ
                </p>
                </div>

                <div class="flex items-center gap-3">
                <button
                    @click="goBack"
                    type="button"
                    class="rounded-xl border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-100"
                >
                    ย้อนกลับ
                </button>
                </div>
            </div>

            <!-- Card -->
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
                
                <!-- Top bar -->
                <div class="border-b border-gray-100 bg-gradient-to-r from-pink-50 to-white px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-800">แบบฟอร์มแก้ไขข้อมูล</h2>
                <p class="mt-1 text-sm text-gray-500">
                    กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนบันทึก
                </p>
                </div>

                <!-- Form -->
                <form class="p-6"  @submit.prevent="submit">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    
                    <!-- ชื่อ - นามสกุล -->
                    <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        ชื่อ - นามสกุล
                    </label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-100"
                        placeholder="กรอกชื่อ - นามสกุล"
                    />
                    </div>
                    <div v-if="$page.props.errors.name" class="text-red-500 text-sm">
                        {{ $page.props.errors.name }}
                    </div>

                    <!-- หน่วยงาน -->
                    <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        หน่วยงาน
                    </label>
                    <input
                        v-model="form.institution"
                        type="text"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-100"
                        placeholder="กรอกชื่อหน่วยงาน"
                    />
                    </div>
                    <div v-if="$page.props.errors.institution" class="text-red-500 text-sm">
                        {{ $page.props.errors.institution }}
                    </div>

                    <!-- อีเมล -->
                    <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        อีเมล
                    </label>
                    <input
                        v-model="form.email"
                        type="email"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-100"
                        placeholder="กรอกอีเมล"
                    />
                    </div>
                    <div v-if="$page.props.errors.email" class="text-red-500 text-sm">
                        {{ $page.props.errors.email }}
                    </div>

                    <!-- เบอร์โทร -->
                    <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        เบอร์โทร
                    </label>
                    <input
                        v-model="form.tel"
                        type="text"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-100"
                        placeholder="กรอกเบอร์โทร"
                    />
                    </div>
                    <div v-if="$page.props.errors.tel" class="text-red-500 text-sm">
                        {{ $page.props.errors.tel }}
                    </div>

                    <!-- รหัสผ่าน -->
                    <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        รหัสผ่าน (หากไม่ต้องการเปลี่ยนให้เว้นว่างไว้)
                    </label>
                    <input
                        v-model="form.password"
                        type="password"
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-100"
                        placeholder="กรอกรหัสผ่าน"
                    />
                    </div>
                    <div v-if="$page.props.errors.password" class="text-red-500 text-sm">
                        {{ $page.props.errors.password }}
                    </div>


                    <!-- สิทธิ์ -->
                    <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        สิทธิ์
                    </label>
                    <select
                        v-model="form.role_id" 
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-pink-400 focus:ring-2 focus:ring-pink-100"
                    >   <option value="">เลือกสิทธิ์</option>
                        <option v-for="role in roles" :key="role.id" :value="role.id"> {{ role.name }}</option>
                    </select>
                    </div>
                    <div v-if="$page.props.errors.role_id" class="text-red-500 text-sm">
                        {{ $page.props.errors.role_id }}
                    </div>
                    
                </div>

                <!-- Footer buttons -->
                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:justify-end">
                    <button
                    @click="goBack"
                    type="button"
                    class="rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-100"
                    >
                    ยกเลิก
                    </button>

                    <button
                    type="submit"
                    class="rounded-xl bg-pink-500 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-pink-600"
                    >
                    บันทึกการแก้ไข
                    </button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
import { Link, router, useForm } from "@inertiajs/vue3";


export default {
    name: "UserEdit",
    components: {Layout, Link},
    props: {
       user: {
            type: Object,
            required: true
       },
       roles:{
            type: Array,
            required: true
       },
       errors: Object,
    },
    mounted() {
    },
    data() {
        return {
           submitting: false,
           form: useForm({
                name: this.user.name ?? "",
                institution: this.user.institution,
                email: this.user.email,
                tel: this.user.tel,
                role_id: this.user.role_id,
                password:null

           })
        };
    },
    methods: {
        goBack() {
            window.history.back();
        },
        submit() {
            this.submitting = true;
            const url = this.route('dashboard.users.update', this.user.id);           
            router.post(url, {
                _method: 'patch',
                user_id: this.user.id,
                name: this.form.name,
                institution: this.form.institution,
                email: this.form.email,
                tel: this.form.tel,
                role_id: this.form.role_id,
                password: this.form.password,
            });
        },
    },
    watch: {}
};
</script>
