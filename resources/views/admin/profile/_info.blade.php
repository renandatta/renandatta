@if(!empty($profile))
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-pencil mr-2"></i> Edit</h5>
@else
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-plus mr-2"></i> Add New</h5>
@endif
<form id="profile_form" method="post">
    @csrf
    <x-alert type="error" id="alert_profile" />
    <input type="hidden" name="id" value="{{ $profile->id ?? '' }}">
    <x-form-group id="name" caption="Name">
        <x-input name="name" caption="Enter name" value="{{ $profile->name ?? '' }}" />
    </x-form-group>
    <x-form-group id="type" caption="Type">
        <x-select name="type" class="select2" :options="$types" value="{{ $profile->type ?? '' }}" />
    </x-form-group>
    <x-form-group id="content" caption="Content">
        <x-textarea name="content" caption="Enter content" rows="5" value="{{ $profile->content ?? '' }}" />
    </x-form-group>
    <x-form-group id="image" caption="Image">
        <x-input
            type="file" name="image" class="dropify" data-height="250"
            data-allowed-file-extensions="png jpg jpeg" accept="image/jpeg, image/png"
            :data-default-file="(!empty($profile) && $profile->type == 'image') ? asset('assets/'.$profile->content) : ''"
        />
    </x-form-group>
    <div class="text-right">
        @if(!empty($profile))
            <button type="button" class="btn btn-danger px-3 float-left" onclick="confirm_delete({{ $profile->id }})">Delete</button>
        @endif
        <button type="button" class="btn btn-default px-3" onclick="clear_form()">Cancel</button>
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>
</form>

<script>
    init_form_element();
    $profile_form = $('#profile_form');
    $profile_form.submit((e) => {
        e.preventDefault();
        let data = new FormData($profile_form.get(0));
        $.ajax({
            url: "{{ route('admin.profiles.save') }}",
            type: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                search_profile(selected_page);
                clear_form();
            },
        }).fail((xhr) => {
            let error = JSON.parse(xhr.responseText);
            if (error.errors) {
                displayErrors('alert_profile', error.errors);
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
                delete_profile(id);
            }
        })
    }
    delete_profile = (id) => {
        let data = {_token: '{{ csrf_token() }}', id};
        $.post("{{ route('admin.profiles.delete') }}", data, () => {
            search_profile(selected_page);
            clear_form();
        }).fail((xhr) => {
            console.log(xhr.responseText);
        });
    }

    // page action
    $type = $('#type');
    $type.change(() => {
        let type = $type.find('option:selected').val();
        console.log(type);
        let $form_group_content = $('#form_group_content');
        let $form_group_image = $('#form_group_image');
        $form_group_content.hide();
        $form_group_image.hide();
        switch (type) {
            case 'text' : $form_group_content.show(); break;
            case 'image' : $form_group_image.show(); break;
        }
    });
    $type.trigger('change');
</script>
