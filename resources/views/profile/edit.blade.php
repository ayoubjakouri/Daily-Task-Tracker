<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Information Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('Profile Information') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('Update your personal information') }}</p>
                </div>
                <div class="p-4 sm:p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="px-4 py-5 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('Update Password') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('Change your account password') }}</p>
                </div>
                <div class="p-4 sm:p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-red-200">
                <div class="px-4 py-5 sm:p-6 border-b border-red-200 bg-red-50">
                    <h3 class="text-lg font-semibold text-red-900 mb-2">{{ __('Danger Zone') }}</h3>
                    <p class="text-sm text-red-700">{{ __('Delete your account permanently') }}</p>
                </div>
                <div class="p-4 sm:p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
