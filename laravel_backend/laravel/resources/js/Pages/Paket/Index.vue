<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  pakets: Object, 
});

function goTo(url) {
  router.visit(url, {
    preserveScroll: true,
    preserveState: true,
  });
}
</script>

<template>
  <Head title="Daftar Paket" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Daftar Paket
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-4 text-right">
              <Link
                :href="route('paket.create')"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
              >
                + Tambah Paket
              </Link>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Creator</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="(paket, index) in pakets.data" :key="paket.id">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ (pakets.current_page - 1) * pakets.per_page + index + 1 }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ paket.nama_paket }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    Rp{{ (paket.harga_paket ?? 0).toLocaleString('id-ID') }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ paket.user?.name || '-' }}</td>
                </tr>
              </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4 flex gap-2">
              <button
                v-if="pakets.prev_page_url"
                @click="goTo(pakets.prev_page_url)"
                class="px-3 py-1 bg-gray-200 rounded"
              >
                Prev
              </button>
              <button
                v-if="pakets.next_page_url"
                @click="goTo(pakets.next_page_url)"
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
