<template>
  <AuthLayout subtitle="Reset your password">
    <div class="text-center mb-6">
      <p class="text-sm text-gray-600">
        Enter your new password below.
      </p>
    </div>

    <Form
      :action="route('password.update')"
      method="post"
      #default="{ errors, processing, wasSuccessful }"
    >
      <!-- Hidden fields for email and token -->
      <input type="hidden" name="email" :value="request.email" />
      <input type="hidden" name="token" :value="request.token" />

      <!-- Email Field (readonly) -->
      <div class="space-y-2">
        <label for="email_display" class="block text-sm font-medium text-gray-700">
          Email address
        </label>
        <input
          id="email_display"
          type="email"
          :value="request.email"
          readonly
          class="appearance-none relative block w-full px-3 py-2 border border-gray-300 bg-gray-50 text-gray-500 rounded-lg sm:text-sm"
        />
      </div>

      <!-- Password Field -->
      <div class="space-y-2 mt-4">
        <label for="password" class="block text-sm font-medium text-gray-700">
          New Password
        </label>
        <input
          id="password"
          name="password"
          type="password"
          autocomplete="new-password"
          required
          class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-colors duration-200"
          :class="{ 'border-red-500 focus:ring-red-500 focus:border-red-500': errors.password }"
          placeholder="Enter your new password"
        />
        <div v-if="errors.password" class="text-sm text-red-600">
          {{ errors.password }}
        </div>
      </div>

      <!-- Password Confirmation Field -->
      <div class="space-y-2 mt-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
          Confirm New Password
        </label>
        <input
          id="password_confirmation"
          name="password_confirmation"
          type="password"
          autocomplete="new-password"
          required
          class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-colors duration-200"
          placeholder="Confirm your new password"
        />
      </div>

      <!-- Submit Button -->
      <div class="mt-6">
        <button
          type="submit"
          :disabled="processing"
          class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 shadow-lg hover:shadow-xl"
        >
          <span v-if="processing" class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </span>
          {{ processing ? 'Resetting...' : 'Reset password' }}
        </button>
      </div>

      <!-- Success Message -->
      <div v-if="wasSuccessful" class="mt-4 p-3 bg-green-50 border border-green-200 rounded-lg">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm text-green-800">
              Password reset successfully! You can now sign in.
            </p>
          </div>
        </div>
      </div>
    </Form>

    <!-- Back to Login -->
    <div class="mt-6 text-center">
      <p class="text-sm text-gray-600">
        Remember your password?
        <Link
          :href="route('login')"
          class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200"
        >
          Back to login
        </Link>
      </p>
    </div>
  </AuthLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { Form } from '@inertiajs/vue3'
import AuthLayout from '../Layouts/AuthLayout.vue'

defineProps({
  request: {
    type: Object,
    required: true
  }
})
</script>
