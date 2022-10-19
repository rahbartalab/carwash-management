<x-layout>
    @if (!isAdmin())
        <x-user-navbar/>
    @endif
    @if (Auth::user()->email != 'admin@user.com')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                </div>
            </div>
        </div>
    @else @include('admin-dashboard'); @endif

    <div style="height: 400px"></div>
</x-layout>
