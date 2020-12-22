@if(!empty($client))
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-pencil mr-2"></i> Edit</h5>
@else
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-plus mr-2"></i> Add New</h5>
@endif
<form id="client_form" method="post">
    @csrf
    <x-alert type="error" id="alert_post" />
    <input type="hidden" name="id" value="{{ $client->id ?? '' }}">
    <x-form-group id="name" caption="Name">
        <x-input name="name" caption="Enter name" :value="$client->name ?? ''" />
    </x-form-group>
    <x-form-group id="website" caption="Website">
        <x-input name="website" caption="https://..." :value="$client->website ?? ''" />
    </x-form-group>
    <x-form-group id="file" caption="Image">
        <x-input
            type="file" name="file" class="dropify" data-height="250"
            data-allowed-file-extensions="png jpg jpeg" accept="image/jpeg, image/png"
            :data-default-file="(!empty($client)) ? asset('assets/'.$client->image) : ''"
        />
    </x-form-group>
    <div class="text-right">
        @if(!empty($client))
            <button type="button" class="btn btn-danger px-3 float-left" onclick="confirm_delete({{ $client->id }})">Delete</button>
        @endif
        <button type="button" class="btn btn-default px-3" onclick="clear_form()">Cancel</button>
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>
</form>


<script>
    init_form_element();
    $client_form = $('#client_form');
    $client_form.submit((e) => {
        e.preventDefault();
        let data = new FormData($client_form.get(0));
        $.ajax({
            url: "{{ route('admin.clients.save') }}",
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
        $.post("{{ route('admin.clients.delete') }}", data, () => {
            search_post(selected_page);
            clear_form();
        }).fail((xhr) => {
            console.log(xhr.responseText);
        });
    }
</script>
