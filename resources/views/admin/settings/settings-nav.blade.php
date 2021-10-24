<div class="flex flex-col">
    <a href="{{ route('admin.profile') }}" class="p-4 flex space-x-2 items-center justify-between border-b {{ $active == 'profile' ? 'bg-green-100' : 'bg-white hover:bg-gray-100' }} transition-all">
        <div class="flex items-center justify-start space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
            <p class="font-semibold {{ $active == 'profile' ? 'text-gray-700' : 'text-gray-400' }}">Edit Profile</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $active == 'profile' ? '' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </a>
    <a href="{{ route('admin.change-password') }}" class="p-4 flex space-x-2 items-center justify-between border-b {{ $active == 'change-password' ? 'bg-green-100' : 'bg-white hover:bg-gray-100' }} transition-all">
        <div class="flex items-center justify-start space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <p class="font-semibold {{ $active == 'change-password' ? 'text-gray-700' : 'text-gray-400' }}">Change Password</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $active == 'change-password' ? '' : 'hidden' }}" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </a>
</div>
