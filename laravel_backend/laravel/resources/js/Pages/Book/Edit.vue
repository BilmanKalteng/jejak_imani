<template>
  <div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-6 space-y-6">
    <h2 class="text-xl font-semibold text-gray-700 border-b pb-2">Update Data Booking</h2>

    <form @submit.prevent="form.put(route('book.update', book.id))" class="space-y-4">
      <!-- Customer Nama -->
      <div>
        <label class="block text-gray-600 mb-1">Customer Nama</label>
        <input
          v-model="form.customer_nama"
          type="text"
          class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.customer_nama">
          {{ form.errors.customer_nama }}
        </div>
      </div>

      <!-- Tanggal Berangkat -->
      <div>
        <label class="block text-gray-600 mb-1">Tanggal Berangkat</label>
        <input
          v-model="form.tanggal_berangkat"
          type="date"
          class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.tanggal_berangkat">
          {{ form.errors.tanggal_berangkat }}
        </div>
      </div>

      <!-- Paket -->
      <div>
        <label class="block text-gray-600 mb-1">Paket</label>
        <select
          v-model="form.paket_id"
          class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        >
          <option disabled value="">-- Pilih Paket --</option>
          <option v-for="paket in pakets" :key="paket.id" :value="paket.id">
            {{ paket.nama_paket }}
          </option>
        </select>
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.paket_id">
          {{ form.errors.paket_id }}
        </div>
      </div>

      <!-- Maskapai -->
      <div>
        <label class="block text-gray-600 mb-1">Maskapai</label>
        <select
          v-model="form.maskapai_id"
          class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        >
          <option disabled value="">-- Pilih Maskapai --</option>
          <option v-for="m in maskapais" :key="m.id" :value="m.id">
            {{ m.nama_maskapai }}
          </option>
        </select>
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.maskapai_id">
          {{ form.errors.maskapai_id }}
        </div>
      </div>

      <!-- Jumlah Sheet -->
      <div>
        <label class="block text-gray-600 mb-1">Jumlah Sheet</label>
        <input
          v-model="form.book_sheet"
          type="number"
          class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
          min="1"
        />
        <div class="text-red-500 text-sm mt-1" v-if="form.errors.book_sheet">
          {{ form.errors.book_sheet }}
        </div>
      </div>

      <!-- Submit -->
      <div class="pt-4">
        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition"
        >
          Update Booking
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  book: Object,
  pakets: Array,
  maskapais: Array,
})

const form = useForm({
  customer_nama: props.book.customer_nama,
  tanggal_berangkat: props.book.tanggal_berangkat,
  paket_id: props.book.paket_id,
  maskapai_id: props.book.maskapai_id,
  book_sheet: props.book.book_sheet,
})
</script>
