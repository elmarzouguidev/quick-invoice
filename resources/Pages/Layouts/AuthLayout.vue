<template>
  <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <!-- Logo/Brand Section -->
      <div class="text-center">
        <div class="mx-auto h-12 w-12 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
          <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
        </div>
        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
          Invoiceable
        </h2>
        <p class="mt-2 text-sm text-gray-600">
          {{ subtitle }}
        </p>
      </div>

      <!-- Main Content -->
      <div class="bg-white py-8 px-6 shadow-xl rounded-xl border border-gray-100">
        <slot />
      </div>

      <!-- Footer -->
      <div class="text-center">
        <p class="text-xs text-gray-500">
          © {{ new Date().getFullYear() }} Invoiceable. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  subtitle: {
    type: String,
    default: 'Manage your invoices with ease'
  }
})
</script>
