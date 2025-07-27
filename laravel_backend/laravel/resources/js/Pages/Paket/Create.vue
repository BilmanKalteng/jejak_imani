<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = useForm({
  nama_paket: '',
  harga_paket: ''
});

const submit = () => {
  form.post(route('paket.store'));
};
</script>

<template>
  <Head title="Tambah Paket" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Tambah Paket</h2>
    </template>

    <div class="py-12">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
          <form @submit.prevent="submit" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
              <input v-model="form.nama_paket" type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
              <div v-if="form.errors.nama_paket" class="text-sm text-red-600 mt-1">{{ form.errors.nama_paket }}</div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Harga Paket</label>
              <input v-model="form.harga_paket" type="number" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
              <div v-if="form.errors.harga_paket" class="text-sm text-red-600 mt-1">{{ form.errors.harga_paket }}</div>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
              Simpan
            </button>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
