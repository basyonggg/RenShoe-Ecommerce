<script setup>
import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const isAccountSettingOpen = ref(false); // Toggle accordion visibility
const placeholderTextVisible = ref(true); // Show placeholder text if no image is uploaded

// Toggle accordion visibility
const toggleAccordion = () => {
    isAccountSettingOpen.value = !isAccountSettingOpen.value;
};

// Get user data from props
const { auth } = usePage().props;
const user = auth.user;

// Initialize form data
const form = useForm({
    name: user.name,
    email: user.email,
    first_name: user.first_name,
    contact_num: user.contact_num,
    last_name: user.last_name,
    username: user.username
});
</script>

<template>
    <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
        <div class="bg-white shadow rounded">
            <!-- Accordion Toggle -->
            <button @click="toggleAccordion" class="w-full text-left px-4 py-3 font-bold text-gray-700 flex justify-between items-center">
                ACCOUNT SETTING
                <span :class="{ 'rotate-180': isAccountSettingOpen }" class="transform transition-transform">&#x25BC;</span>
            </button>

            <!-- Accordion Content -->
            <div v-show="isAccountSettingOpen" class="px-4 py-6">
                <div class="flex flex-col items-center space-y-6">
                    <!-- Upload Image -->
                    <div class="relative">
                        <label>
                            <div class="bg-gray-300 w-24 h-24 rounded-full flex items-center justify-center overflow-hidden">
                                <img v-if="previewImage" :src="previewImage" alt="Upload" class="object-cover w-full h-full" />
                                <span v-else class="text-gray-500 text-sm">Profile</span>
                            </div>
                        </label>
                    </div>

                    <!-- Form Fields -->
                    <div class="w-full space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <InputLabel for="username" value="Username" />
                                <TextInput id="username" v-model="form.username" type="text" class="w-full" />
                            </div>
                            <div>
                                <InputLabel for="contact_num" value="Phone Number" />
                                <TextInput id="contact_num" v-model="form.contact_num" type="text" class="w-full" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <InputLabel for="first_name" value="First Name" />
                                <TextInput id="first_name" v-model="form.first_name" type="text" class="w-full" />
                            </div>
                            <div>
                                <InputLabel for="last_name" value="Last Name" />
                                <TextInput id="last_name" v-model="form.last_name" type="text" class="w-full" />
                            </div>
                        </div>
                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput id="email" v-model="form.email" type="email" class="w-full" />
                        </div>
                        <div class="flex items-center gap-4">
                            <PrimaryButton type="submit" :disabled="form.processing" class="w-48">Save Changes</PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
