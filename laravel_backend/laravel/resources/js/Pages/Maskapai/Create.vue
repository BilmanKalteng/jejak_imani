<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = useForm({
  nama_maskapai: '',
  harga_tiket: '',
  jumlah_sheet: ''
});
 ''
const submit = () => {
  form.post(route('maskapai.store'));
};
</script>

<template>
  <Head title="Tambah maskapai" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Tambah maskapai</h2>
    </template>

    <div class="py-12">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow sm:rounded-lg">
          <form @submit.prevent="submit" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Nama maskapai</label>
              <input v-model="form.nama_maskapai" type="text" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
              <div v-if="form.errors.nama_maskapai" class="text-sm text-red-600 mt-1">{{ form.errors.nama_maskapai }}</div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Jumlah Sheet</label>
              <input v-model="form.jumlah_sheet" type="number" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
              <div v-if="form.errors.jumlah_sheet" class="text-sm text-red-600 mt-1">{{ form.errors.jumlah_sheet }}</div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Harga maskapai</label>
              <input v-model="form.harga_tiket" type="number" class="mt-1 block w-full rounded border-gray-300 shadow-sm" />
              <div v-if="form.errors.harga_tiket" class="text-sm text-red-600 mt-1">{{ form.errors.harga_tiket }}</div>
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
