<template>
    <Layout>
        <div class="min-h-screen bg-base-200 py-10 px-4">
            <div class="max-w-4xl mx-auto text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="avatar">
                <div class="w-24 h-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2 overflow-hidden">
                    <img src="/images/logo.png" class="object-cover" />
                </div>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-base-content">การลงทะเบียนเข้าร่วมงานศิลปะ</h1>
            <p class="text-gray-500 mt-2">ระหว่างวันที่ 23-25 กุมภาพันธ์ 2567 ณ มหาวิทยาลัย...</p>
            </div>

            <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-8">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                    <div class="form-control w-full">
                        <label class="label">
                        <span class="label-text font-semibold">Email</span>
                        </label>
                        <input 
                        disabled
                        v-model="form.email" 
                        type="text" 
                        placeholder="ระบุชื่อสถาบัน" 
                        class="input input-bordered w-full focus:input-primary"
                        :class="{'input-error': $page.props.errors.email}"
                        />
                        <label v-if="$page.props.errors.email" class="label">
                        <span class="label-text-alt text-error">{{ $page.props.errors.email }}</span>
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                        <span class="label-text font-semibold">ชื่อหน่วยงาน / สถานศึกษา</span>
                        </label>
                        <input 
                        disabled
                        v-model="form.institution" 
                        type="text" 
                        placeholder="ระบุชื่อสถาบัน" 
                        class="input input-bordered w-full focus:input-primary"
                        :class="{'input-error': $page.props.errors.institution}"
                        />
                        <label v-if="$page.props.errors.institution" class="label">
                        <span class="label-text-alt text-error">{{ $page.props.errors.institution }}</span>
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                        <span class="label-text font-semibold">ชื่อ-นามสกุล ผู้ประสานงาน</span>
                        </label>
                        <input 
                        v-model="form.name" 
                        type="text" 
                        placeholder="ชื่อ-นามสกุล" 
                        class="input input-bordered w-full"
                        />
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-semibold">หมายเลขโทรศัพท์ ผู้ประสานงานประจำสถาบัน</span>
                        </label>
                        <input 
                            
                            v-model="form.coordinator_phone" 
                            type="text" 
                            placeholder="หมายเลขโทรศัพท์" 
                            class="input input-bordered w-full focus:input-primary"
                            :class="{'input-error': $page.props.errors.coordinator_phone}"
                        />
                        <label v-if="$page.props.errors.coordinator_phone" class="label">
                            <span class="label-text-alt text-error">{{ $page.props.errors.coordinator_phone }}</span>
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-semibold">ประเภทชุดการแสดง(ตัวอย่าง)</span>
                        </label>
                        <div class="flex flex-col gap-2 p-2 bg-base-100 rounded-lg border border-base-200" :class="{'border-error': $page.props.errors.type}">
                            <label class="label cursor-pointer justify-start gap-3 py-1">
                                <input v-model="form.type" type="checkbox" value="การแสดงนาฏศิลป์ไทย" class="checkbox checkbox-primary checkbox-sm" />
                                <span class="label-text">การแสดงนาฏศิลป์ไทย</span>
                            </label>
                            <label class="label cursor-pointer justify-start gap-3 py-1">
                                <input v-model="form.type" type="checkbox" value="การแสดงนาฏศิลป์พื้นบ้าน" class="checkbox checkbox-primary checkbox-sm" />
                                <span class="label-text">การแสดงนาฏศิลป์พื้นบ้าน</span>
                            </label>
                            <label class="label cursor-pointer justify-start gap-3 py-1">
                                <input v-model="form.type" type="checkbox" value="การแสดงนาฏศิลป์ร่วมสมัย" class="checkbox checkbox-primary checkbox-sm" />
                                <span class="label-text">การแสดงนาฏศิลป์ร่วมสมัย</span>
                            </label>
                        </div>
                        <label v-if="$page.props.errors.type" class="label">
                            <span class="label-text-alt text-error">{{ $page.props.errors.type }}</span>
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-semibold">คำอธิบายประกอบชุดการแสดง</span>
                        </label>
                        <textarea 
                            v-model="form.description" 
                            placeholder="ระบุรายละเอียดหรือเนื้อหาโดยสังเขปของการแสดง" 
                            rows="4"
                            class="textarea textarea-bordered w-full focus:textarea-primary text-base"
                            :class="{'textarea-error': $page.props.errors.description}"
                        ></textarea>
                        <label v-if="$page.props.errors.description" class="label">
                            <span class="label-text-alt text-error">{{ $page.props.errors.description }}</span>
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-semibold">จำนวนนักศึกษาที่เข้าร่วม (คน)</span>
                        </label>
                        <input 
                            v-model="form.number_of_students" 
                            type="number" 
                            min="0"
                            placeholder="เช่น 10" 
                            class="input input-bordered w-full focus:input-primary"
                            :class="{'input-error': $page.props.errors.number_of_students}"
                        />
                        <label v-if="$page.props.errors.number_of_students" class="label">
                            <span class="label-text-alt text-error">{{ $page.props.errors.number_of_students }}</span>
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-semibold">รายชื่อนักศึกษาที่เข้าร่วม</span>
                        </label>
                        
                        <textarea 
                            v-model="form.list_of_students" 
                            placeholder="เช่น 10 (ระบุรายละเอียดเพิ่มเติมได้ที่นี่)" 
                            class="textarea textarea-bordered w-full focus:textarea-primary h-24"
                            :class="{'textarea-error': $page.props.errors?.list_of_students}"
                        ></textarea>

                        <label v-if="$page.props.errors?.list_of_students" class="label">
                            <span class="label-text-alt text-error">
                                {{ $page.props.errors.list_of_students }}
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-semibold">วันที่เดินทางมา</span>
                        </label>
                        <input 
                            v-model="form.arrival_date" 
                            type="date" 
                            class="input input-bordered w-full focus:input-primary"
                            :class="{'input-error': $page.props.errors.arrival_date}"
                        />
                        <label v-if="$page.props.errors.arrival_date" class="label">
                            <span class="label-text-alt text-error">{{ $page.props.errors.arrival_date }}</span>
                        </label>
                    </div>

                     <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text font-semibold">วันที่เดินทางกลับ</span>
                        </label>
                        <input 
                            v-model="form.departure_date" 
                            type="date" 
                            class="input input-bordered w-full focus:input-primary"
                            :class="{'input-error': $page.props.errors.departure_date}"
                        />
                        <label v-if="$page.props.errors.departure_date" class="label">
                            <span class="label-text-alt text-error">{{ $page.props.errors.departure_date }}</span>
                        </label>
                    </div>
               

                </div>

                <div class="mt-10 flex flex-col gap-3">
                
                <button :disabled="isSubmitting" type="button" @click.prevent="saveDraft" class="btn btn-warning w-full text-white">
                    บันทึกร่าง
                </button>

                <button :disabled="isSubmitting" type="button" class="btn  btn-success w-full text-lg">
                    ยืนยันการลงทะเบียนเข้าร่วมงาน
                </button>
                </div>
            </form>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
import axios from 'axios';
import { router } from "@inertiajs/vue3";
import { useForm, Link } from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {Layout, Link},
    props: {
        
    },
    data() {
        return {
            isSubmitting:false,
            form: useForm({
                institution: this.$page.props.user?.institution || '',
                email: this.$page.props.user?.email || '',
                name: this.$page.props.user?.name || '',
                coordinator_phone: '',
                type: [],
                description: '',
                number_of_students: '',
                list_of_students: '',
                arrival_date: '',
                departure_date: '',      
            }),
           
        };
    },
    mounted() {
        
    },
    methods: {
        async saveDraft() {
            this.isSubmitting = true;
            const url = this.route('save_draft');
            const res = await axios.post(url, this.form);

            //console.log('savedraft');
        }
    },
    watch: {
        
    },
    computed: {}
};
</script>

<style scoped>
</style>