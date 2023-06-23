@props(['errors'])

@if (is_array($errors) && !empty($errors) || $errors->any())
    <div {{ $attributes }}>
        <div class="alert alert-danger" role="alert">
            @if (is_array($errors))
                @foreach ($errors as $error)
                    {{ $error }}<br>
                @endforeach
            @else
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            @endif
        </div>
    </div>
@endif
