@php
$class ??= null;
$name ??= '';
$value ??= '';
$label ??=ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{  $name }}">{{ $label }}</label>
    <select  id="{{  $name }}" name="{{ $name }}[]" multiple>

        @foreach($options as $k =>$v)
        <option value="{{ $k }}" >
            {{ $v }}
        </option>
        @endforeach
        
    @error($name)
    <div class="invalid-feeback">
        {{ $message }}
    </div>
    @enderror
</div>
