<select
    name="{{ $name }}"
    id="{{ $prefix.$name }}"
    class="form-control {{ $class }}"
    {{ $attributes }}
>
    @if($default == '1')
        <option value="">{{ $caption }}</option>
    @endif
    @foreach($options as $key => $value)
        <option value="{{ $key }}" @if($key == $value) selected @endif>{{ $value }}</option>
    @endforeach
</select>
