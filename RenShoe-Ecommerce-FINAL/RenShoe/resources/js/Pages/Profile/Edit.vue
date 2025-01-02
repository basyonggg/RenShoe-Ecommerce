<script setup>
import UserLayouts from '@/Layouts/UserLayouts.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import UpdateAddressInformationForm from './Partials/UpdateAddressInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>

    <UserLayouts>

        <div class="py-12">
            <div class="max-w-6xl ml-auto mr-56 sm:px-6 lg:px-8 space-y-6">
                <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl"/>
                <UpdateAddressInformationForm class="max-w-xl"/>
                <UpdatePasswordForm class="max-w-xl"/>
            </div>
        </div>
    </UserLayouts>
</template>
