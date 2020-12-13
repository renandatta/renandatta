@if(!empty($user))
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-pencil mr-2"></i> Edit</h5>
@else
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-plus mr-2"></i> Add New</h5>
@endif
<form id="user_form" method="post">
    @csrf
    <x-alert type="error" id="alert_user" />
    <input type="hidden" name="id" value="{{ $user->id ?? '' }}">
    <x-form-group id="name" caption="Name">
        <x-input name="name" caption="Enter name" value="{{ $user->name ?? '' }}" />
    </x-form-group>
    <x-form-group id="email" caption="Email">
        <x-input name="email" type="email" caption="Enter email" value="{{ $user->email ?? '' }}" />
    </x-form-group>
    @if(!empty($user))
        <p>*) Leave blank if not changing password</p>
    @endif
    <x-form-group id="password" caption="Password">
        <x-input name="password" type="password" caption="Enter password" />
    </x-form-group>
    <x-form-group id="password_confirmation" caption="Repat Password">
        <x-input name="password_confirmation" type="password" caption="Repeat password" />
    </x-form-group>
    <div class="text-right">
        @if(!empty($user))
            <button type="button" class="btn btn-danger px-3 float-left" onclick="confirm_delete({{ $user->id }})">Delete</button>
        @endif
        <button type="button" class="btn btn-default px-3" onclick="clear_form()">Cancel</button>
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>
</form>


<script>
    $user_form = $('#user_form');
    $user_form.submit((e) => {
        e.preventDefault();
        let data = new FormData($user_form.get(0));
        $.ajax({
            url: "{{ route('admin.users.save') }}",
            type: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                search_user(1);
                clear_form();
            },
        }).fail((xhr) => {
            let error = JSON.parse(xhr.responseText);
            if (error.errors) {
                displayErrors('alert_user', error.errors);
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
                delete_user(id);
            }
        })
    }
    delete_user = (id) => {
        let data = {_token: '{{ csrf_token() }}', id};
        $.post("{{ route('admin.users.delete') }}", data, () => {
            search_user(selected_page);
            clear_form();
        }).fail((xhr) => {
            console.log(xhr.responseText);
        });
    }
</script>
