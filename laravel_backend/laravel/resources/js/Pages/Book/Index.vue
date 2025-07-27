<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  book: Object
});

const formatHarga = (harga) => {
  if (!harga) return '-';
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
  }).format(harga);
};

function formatTanggal(tanggal) {
  if (!tanggal) return '-';
  const options = { day: '2-digit', month: 'long', year: 'numeric' };
  return new Date(tanggal).toLocaleDateString('id-ID', options);
}

function goTo(url) {
  router.visit(url, {
    preserveScroll: true,
    preserveState: true,
  });
}
</script>

<template>
  <Head title="Daftar Booking" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Daftar Booking
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-4 text-right">
              <Link
                :href="route('book.create')"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
              >
                + Book Tour
              </Link>
            </div>

            <table class="min-w-[1000px] table-auto">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Sheet</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paket</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maskapai</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keberangkatan</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Di Pesan</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Creator</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Update</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="(item, index) in book.data" :key="item.id">
                  <td class="px-6 py-4 text-sm text-gray-900 max-w-[200px] break-words">{{ item.customer_nama }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ item.book_sheet }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <div>{{ item.paket?.nama_paket }}</div>
                    <div class="text-gray-500 text-xs mt-1">
                      {{ formatHarga(item.paket?.harga_paket) }}
                    </div>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-900 max-w-[200px] break-words">
                    <div>{{ item.maskapai?.nama_maskapai }}</div>
                    <div class="text-gray-500 text-xs mt-1">
                      {{ formatHarga(item.maskapai?.harga_tiket) }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ formatTanggal(item.tanggal_berangkat) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ formatHarga(item.harga_total) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ formatTanggal(item.created_at) }}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-900 max-w-[200px] break-words">
                    {{ item.user?.name || '-' }}
                  </td>
                  <td class="px-6 py-4 text-sm">
                    <Link :href="route('book.edit', item.id)" class="text-blue-500 hover:text-blue-700">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5h2M12 3v2m1 4h.01M12 7v1m-4 4l6 6M6 18l6-6" />
                      </svg>
                    </Link>
                  </td>
                </tr>
              </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4 flex gap-2">
              <button
                v-if="book.prev_page_url"
                @click="goTo(book.prev_page_url)"
                class="px-3 py-1 bg-gray-200 rounded"
              >
                Prev
              </button>
              <button
                v-if="book.next_page_url"
                @click="goTo(book.next_page_url)"
                class="px-3 py-1 bg-gray-200 rounded"
              >
                Next
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
