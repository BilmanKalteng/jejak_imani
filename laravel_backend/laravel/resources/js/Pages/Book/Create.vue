<script setup>
import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
  paket: Array,
  maskapai: Array,
});

const form = useForm({
  customer_nama: '',
  tanggal_berangkat: '',
  paket_id: '',
  maskapai_id: '',
  book_sheet: 1,
});
</script>

<template>
  <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Form Booking</h2>

    <form @submit.prevent="form.post(route('book.store'))" class="space-y-4">

      <!-- customer_nama -->
      <div>
        <label class="block mb-1 font-medium">Nama Customer</label>
        <input v-model="form.customer_nama" type="text" class="w-full border px-3 py-2 rounded"
          :class="{ 'border-red-500': form.errors.customer_nama }" />
        <div v-if="form.errors.customer_nama" class="text-red-500 text-sm mt-1">{{ form.errors.customer_nama }}</div>
      </div>

      <!-- Tanggal -->
      <div>
        <label class="block mb-1 font-medium">Tanggal Berangkat</label>
        <input v-model="form.tanggal_berangkat" type="date" class="w-full border px-3 py-2 rounded"
          :class="{ 'border-red-500': form.errors.tanggal_berangkat }" />
        <div v-if="form.errors.tanggal_berangkat" class="text-red-500 text-sm mt-1">{{ form.errors.tanggal_berangkat }}</div>
      </div>

      <!-- Paket -->
      <div>
        <label class="block mb-1 font-medium">Pilih Paket</label>
        <select v-model="form.paket_id" class="w-full border px-3 py-2 rounded"
          :class="{ 'border-red-500': form.errors.paket_id }">
          <option value="" disabled>Pilih Paket</option>
          <option v-for="paket in paket" :key="paket.id" :value="paket.id">
            {{ paket.nama_paket }} - Rp{{ paket.harga_paket.toLocaleString('id-ID') }}
          </option>
        </select>
        <div v-if="form.errors.paket_id" class="text-red-500 text-sm mt-1">{{ form.errors.paket_id }}</div>
      </div>

      <!-- Maskapai -->
      <div>
        <label class="block mb-1 font-medium">Pilih Maskapai</label>
        <select v-model="form.maskapai_id" class="w-full border px-3 py-2 rounded"
          :class="{ 'border-red-500': form.errors.maskapai_id }">
          <option value="" disabled>Pilih Maskapai</option>
          <option v-for="maskapai in maskapai" :key="maskapai.id" :value="maskapai.id">
            {{ maskapai.nama_maskapai }} - Tiket: Rp{{ maskapai.harga_tiket.toLocaleString('id-ID') }}
          </option>
        </select>
        <div v-if="form.errors.maskapai_id" class="text-red-500 text-sm mt-1">{{ form.errors.maskapai_id }}</div>
      </div>

      <!-- Jumlah Sheet -->
      <div>
        <label class="block mb-1 font-medium">Jumlah Kursi</label>
        <input v-model="form.book_sheet" type="number" min="1" class="w-full border px-3 py-2 rounded"
          :class="{ 'border-red-500': form.errors.book_sheet }" />
        <div v-if="form.errors.book_sheet" class="text-red-500 text-sm mt-1">{{ form.errors.book_sheet }}</div>
      </div>

      <!-- Submit -->
      <div class="pt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
          :disabled="form.processing">
          Simpan Booking
        </button>
      </div>
    </form>
  </div>
</template>
