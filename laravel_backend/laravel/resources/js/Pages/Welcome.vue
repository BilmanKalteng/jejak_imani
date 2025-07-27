<template>
  <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 flex items-center justify-center px-6">
    <div class="max-w-2xl text-center bg-white shadow-lg rounded-2xl p-10 border border-gray-100">
      <h1 class="text-4xl font-extrabold text-blue-700 mb-4">Selamat Datang di Aplikasi Tour</h1>
      <p class="text-lg text-gray-600 mb-8">
        Aplikasi ini memungkinkan Anda mengelola data maskapai, tiket penerbangan, dan pengguna secara efisien.
      </p>
      <div class="flex justify-center space-x-4">
        <Link
          href="/login"
          class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg transition"
        >
          Login
        </Link>
        <Link
          href="/register"
          class="bg-white border border-blue-600 hover:bg-blue-50 text-blue-600 font-medium px-6 py-2 rounded-lg transition"
        >
          Register
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
