@if(!empty($feature))
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-pencil mr-2"></i> Edit</h5>
@else
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-plus mr-2"></i> Add New</h5>
@endif
<form id="feature_form" method="post">
    @csrf
    <x-alert type="error" id="alert_feature" />
    <input type="hidden" name="id" value="{{ $feature->id ?? '' }}"">
    <input type="hidden" name="code" value="{{ $code }}">
    <input type="hidden" name="parent_code" value="{{ $parent_code }}">
    <x-form-group id="name" caption="Name">
        <x-input name="name" caption="Enter name" value="{{ $feature->name ?? '' }}" />
    </x-form-group>
    <x-form-group id="url" caption="Url">
        <x-input name="url" caption="Enter url route" value="{{ $feature->url ?? '' }}" />
    </x-form-group>
    <x-form-group id="icon" caption="Icon">
        <x-input name="icon" caption="Enter mdi icon code" value="{{ $feature->icon ?? '' }}" />
    </x-form-group>
    <div class="text-right">
        @if(!empty($feature))
            <button type="button" class="btn btn-danger px-3 float-left" onclick="delete_feature({{ $feature->id }})">Delete</button>
        @endif
        <button type="button" class="btn btn-default px-3" onclick="clear_form()">Cancel</button>
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>
</form>


<script>
    $feature_form = $('#feature_form');
    $feature_form.submit((e) => {
        e.preventDefault();
        let data = new FormData($feature_form.get(0));
        $.ajax({
            url: "{{ route('admin.features.save') }}",
            type: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                search_feature(1);
                clear_form();
            },
        }).fail((xhr) => {
            let error = JSON.parse(xhr.responseText);
            if (error.errors) {
                displayErrors('alert_feature', error.errors);
            } else {
                console.log(xhr.responseText);
            }
        });
    });
    delete_feature = (id) => {
        let data = {_token: '{{ csrf_token() }}', id};
        $.post("{{ route('admin.features.delete') }}", data, () => {
            search_feature(selected_page);
            clear_form();
        }).fail((xhr) => {
            console.log(xhr.responseText);
        });
    }
</script>
