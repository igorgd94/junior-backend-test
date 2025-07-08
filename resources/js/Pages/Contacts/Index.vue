<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3'
defineProps(['contacts'])

const form = useForm({})

function destroy(id) {
    if (confirm('Tem certeza que deseja excluir este contato?')) {
        form.delete(`/contacts-inertia/${id}`)
    }
}
</script>

<template>
    <div class="p-6 max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Contatos</h1>
            <Link href="/contacts-inertia/create" class="bg-green-600 text-white px-4 py-2 rounded">Novo</Link>
        </div>

        <table class="w-full border-collapse border">
            <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2 text-left">Nome</th>
                <th class="border px-4 py-2 text-left">Email</th>
                <th class="border px-4 py-2 text-left">Telefone</th>
                <th class="border px-4 py-2 text-left">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts.data" :key="contact.id">
                <td class="border px-4 py-2">{{ contact.name }}</td>
                <td class="border px-4 py-2">{{ contact.email }}</td>
                <td class="border px-4 py-2">{{ contact.phone }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <Link :href="`/contacts-inertia/${contact.id}/edit`" class="text-blue-600">Editar</Link>
                    <button @click="destroy(contact.id)" class="text-red-600">Excluir</button>
                </td>
            </tr>
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="flex space-x-2 mt-4">
            <Link
                v-for="link in contacts.links"
                :key="link.label"
                v-html="link.label"
                :href="link.url || '#'"
                class="px-3 py-1 border rounded"
                :class="{
                    'bg-gray-200 text-black': link.active,
                    'text-gray-500 pointer-events-none': !link.url,
                }"
            />
        </div>

        <div v-if="$page.props.success" class="mt-4 text-green-600">
            {{ $page.props.success }}
        </div>
    </div>
</template>
