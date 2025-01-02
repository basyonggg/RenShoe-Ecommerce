<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};

const toggleAccordion = (id) => {
    const accordion = document.getElementById(id);
    const icon = document.getElementById(id + 'Icon');
    if (accordion.classList.contains('hidden')) {
        accordion.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        accordion.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
};
</script>

<template>
  <div class="bg-white shadow rounded">
    <button @click="toggleAccordion('changePassword')" class="w-full text-left px-4 py-3 font-bold text-gray-700 flex justify-between items-center">
      CHANGE PASSWORD
      <span id="changePasswordIcon" class="transform transition-transform">&#x25BC;</span>
    </button>

    <div id="changePassword" class="hidden px-4 py-6 space-y-4">
      <form @submit.prevent="updatePassword">
        <!-- Current Password Field -->
        <div>
            <InputLabel for="current_password" class="text-sm text-gray-600">Current Password</InputLabel>
            <TextInput id="current_password" ref="currentPasswordInput" v-model="form.current_password" type="password" class="w-full border rounded px-3 py-2 text-gray-700" autocomplete="current-password"/>
            <p v-if="form.errors.current_password" class="text-red-500 text-sm">{{ form.errors.current_password }}</p>
        </div>

        <!-- New Password Field -->
        <div class="mt-6">
            <InputLabel for="password" class="text-sm text-gray-600">New Password</InputLabel>
            <TextInput id="password" ref="passwordInput" v-model="form.password" type="password" class="w-full border rounded px-3 py-2 text-gray-700" placeholder="8+ characters" autocomplete="new-password"/>
            <p v-if="form.errors.password" class="text-red-500 text-sm">{{ form.errors.password }}</p>
        </div>

        <!-- Confirm Password Field -->
        <div class="mb-4 mt-6">
            <InputLabel for="password_confirmation" class="text-sm text-gray-600">Confirm Password</InputLabel>
            <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password" class="w-full border rounded px-3 py-2 text-gray-700" autocomplete="new-password"/>
            <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm">{{ form.errors.password_confirmation }}</p>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
          <PrimaryButton type="submit" class="w-48 bg-black text-white font-bold py-2 px-4 rounded hover:bg-gray-700" :disabled="form.processing">Save Changes</PrimaryButton>
        </div>
      </form>
    </div>
  </div>
</template>
