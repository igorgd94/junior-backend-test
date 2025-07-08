<template>
    <div class="mb-4">
        <label class="block mb-1">{{ label }}</label>
        <input
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="border rounded w-full p-2"
            :class="{ 'border-red-500': error }"
        />
        <div v-if="error" class="text-red-600 text-sm mt-1">{{ error }}</div>
    </div>
</template>

<script setup>
defineProps({
    label: String,
    type: {
        type: String,
        default: 'text',
    },
    error: String,
    modelValue: [String, Number],
})

defineEmits(['update:modelValue'])
</script>
