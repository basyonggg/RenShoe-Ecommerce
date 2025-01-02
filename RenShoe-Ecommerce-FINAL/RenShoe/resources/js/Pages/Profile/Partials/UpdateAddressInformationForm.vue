<script setup>
import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const isAddressSettingOpen = ref(false); // Toggle accordion visibility

// Toggle accordion visibility
const toggleAccordion = () => {
    isAddressSettingOpen.value = !isAddressSettingOpen.value;
};

// Get user data from props
const { auth } = usePage().props;
const user = auth.user;

// Initialize form data
const form = useForm({
    street: user.address?.street || '',
    purok: user.address?.purok || '',
    barangay: user.address?.barangay || '',
    city: user.address?.city || '',
    zipcode: user.address?.zipcode || '',
    isMain: user.address?.isMain || false,
});
</script>

<template>
    <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
        <div class="bg-white shadow rounded">
            <!-- Accordion Toggle -->
            <button @click="toggleAccordion" class="w-full text-left px-4 py-3 font-bold text-gray-700 flex justify-between items-center">
                ADDRESS SETTING
                <span :class="{ 'rotate-180': isAddressSettingOpen }" class="transform transition-transform">&#x25BC;</span>
            </button>

            <!-- Accordion Content -->
            <div v-show="isAddressSettingOpen" class="px-4 py-6">
                <div class="w-full space-y-4">
                    <!-- Form Fields -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <InputLabel for="street" value="Street" />
                            <TextInput id="street" v-model="form.street" type="text" class="w-full" />
                        </div>
                        <div>
                            <InputLabel for="purok" value="Purok" />
                            <TextInput id="purok" v-model="form.purok" type="text" class="w-full" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <InputLabel for="barangay" value="Barangay" />
                            <TextInput id="barangay" v-model="form.barangay" type="text" class="w-full" />
                        </div>
                        <div>
                            <InputLabel for="city" value="City" />
                            <TextInput id="city" v-model="form.city" type="text" class="w-full" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <InputLabel for="zipcode" value="Zip Code" />
                            <TextInput id="zipcode" v-model="form.zipcode" type="text" class="w-full" />
                        </div>
                        <div>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" v-model="form.isMain" class="form-checkbox" />
                                <span>Set as Main Address</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <PrimaryButton type="submit" :disabled="form.processing" class="w-48">Save Address</PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
