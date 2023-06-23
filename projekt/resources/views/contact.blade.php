<x-app-layout>

    <x-slot name="t">
        Kapcsolat
    </x-slot>

    <x-slot name="header">
        <h2>Kapcsolat</h2>
    </x-slot>

    <x-slot name="bg">
        url('assets/img/contact.jpg')
    </x-slot>

    <!-- Main Content -->
    <div class="mb-3">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}<br>
            </div>
        @else
            <div class="mb-3 center">
                Ha bármi kérdésed van, írj nyugodtan itt.
            </div>

            <x-validation-errors :errors="$errors" />

            <form class="center-form" method="POST" action="{{ route('contact-send') }}">
                @csrf

                <div class="mb-3">
                    <x-input id="name" name="name" value="{{old('name')}}" placeholder="Név" required />
                </div>

                <div class="mb-3">
                    <x-input id="email" name="email" type="email" value="{{old('email')}}" placeholder="E-mail cím" required />
                </div>

                <div class="mb-3">
                    <x-input id="subject" name="subject" value="{{old('subject')}}" placeholder="Tárgy" required />
                </div>

                <div class="mb-3">
                    <textarea class="form-control" id="message" name="message" placeholder="Üzenet" required>{{ old('message') }}</textarea>
                </div>

                <div style="text-align: center;" class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Küldés"/>
                </div>
            </form>
            @endif
        </div>
    </div>

</x-app-layout>
