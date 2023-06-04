<x-app-layout>

    <!-- Header -->
    <x-slot name="header">
        <h2>Kapcsolat</h2>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="p-6">
            <div style="margin: auto; width: 50%; text-align: center;" class="mb-3">
                Ha bármi kérdésed van, írj nyugodtan itt.
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}<br>
                </div>
            @else
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <form style="margin: auto; width: 50%;" action="{{ route('contact-send') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Név" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="E-mail cím" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}" placeholder="Tárgy" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="message" name="message" placeholder="Üzenet" required>{{old('message')}}</textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Küldés">
                </form>
            @endif
        </div>
    </div>

</x-app-layout>
