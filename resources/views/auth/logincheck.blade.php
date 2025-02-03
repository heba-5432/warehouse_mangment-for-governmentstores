<x-guest-layout>




<!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @include('lang-sel-icon')
    <form method="POST" action="{{ route('checkid') }}">
        @csrf
        @if (session('messege'))
    <div class="alert alert-danger">
        {{ session('messege') }}
    </div>
@endif

        <!-- id Address -->
        <div>

            <x-text-input id="email" class="block mt-1 w-full" type="text" name="nat_id" :value="old('nat_id')" required autofocus  />

        </div>


<div><br>
</div>


            <x-primary-button class="ms-3">
                {{ __('check') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
