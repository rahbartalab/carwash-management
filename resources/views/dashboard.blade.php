<x-layout>

    @if (Auth::user()->email != 'admin@user.com')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    @else @include('admin-dashboard'); @endif

    <div style="height: 320px"></div>
</x-layout>
