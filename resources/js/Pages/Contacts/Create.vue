<template>
    <div class="p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Novo Contato</h1>

        <form @submit.prevent="submit">
            <InputField label="Nome" v-model="form.name" :error="form.errors.name" />
            <InputField label="Email" v-model="form.email" :error="form.errors.email" />
            <InputField label="Telefone" v-model="form.phone" :error="form.errors.phone" />

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded" :disabled="form.processing">
                {{ form.processing ? 'Salvando...' : 'Salvar' }}
            </button>
            <div class="mt-4">
                <Link href="/contacts-inertia" class="text-blue-600 hover:underline">← Voltar para lista</Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3'
import InputField from "@/Pages/InputField.vue";

const form = useForm({
    name: '',
    email: '',
    phone: '',
})

function submit() {
    form.post('/contacts-inertia')
}
</script>
