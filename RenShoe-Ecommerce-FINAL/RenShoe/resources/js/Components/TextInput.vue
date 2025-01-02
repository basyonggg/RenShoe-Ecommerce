<!--INPUT ON TEXT FORMS-->

<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-black focus:border-gray-500 text-sm" v-model="model" ref="input" />
</template>
