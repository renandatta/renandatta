@if(!empty($service))
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-pencil mr-2"></i> Edit</h5>
@else
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-plus mr-2"></i> Add New</h5>
@endif
<form id="service_form" method="post">
    @csrf
    <x-alert type="error" id="alert_post" />
    <input type="hidden" name="id" value="{{ $service->id ?? '' }}">
    <x-form-group id="name" caption="Name">
        <x-input name="name" caption="Enter name" :value="$service->name ?? ''" />
    </x-form-group>
    <x-form-group id="description" caption="Content">
        <x-textarea name="description" :value="$service->description ?? ''" rows="8" />
    </x-form-group>
    <x-form-group id="file" caption="Image">
        <x-input
            type="file" name="file" class="dropify" data-height="250"
            data-allowed-file-extensions="png jpg jpeg" accept="image/jpeg, image/png"
            :data-default-file="(!empty($service)) ? asset('assets/'.$service->image) : ''"
        />
    </x-form-group>
    <div class="text-right">
        @if(!empty($service))
            <button type="button" class="btn btn-danger px-3 float-left" onclick="confirm_delete({{ $service->id }})">Delete</button>
        @endif
        <button type="button" class="btn btn-default px-3" onclick="clear_form()">Cancel</button>
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>
</form>


<script>
    init_form_element();
    $service_form = $('#service_form');
    $service_form.submit((e) => {
        e.preventDefault();
        let data = new FormData($service_form.get(0));
        $.ajax({
            url: "{{ route('admin.services.save') }}",
            type: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                search_post(selected_page);
                clear_form();
            },
        }).fail((xhr) => {
            let error = JSON.parse(xhr.responseText);
            if (error.errors) {
                displayErrors('alert_post', error.errors);
            } else {
                console.log(xhr.responseText);
            }
        });
    });
    confirm_delete = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
            console.log(result);
            if (result.value === true) {
                delete_post(id);
            }
        })
    }
    delete_post = (id) => {
        let data = {_token: '{{ csrf_token() }}', id};
        $.post("{{ route('admin.services.delete') }}", data, () => {
            search_post(selected_page);
            clear_form();
        }).fail((xhr) => {
            console.log(xhr.responseText);
        });
    }
</script>
