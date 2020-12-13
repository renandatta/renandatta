@if(!empty($category))
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-pencil mr-2"></i> Edit</h5>
@else
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-plus mr-2"></i> Add New</h5>
@endif
<form id="category_form" method="post">
    @csrf
    <x-alert type="error" id="alert_category" />
    <input type="hidden" name="id" value="{{ $category->id ?? '' }}">
    <x-form-group id="name" caption="Name">
        <x-input name="name" caption="Enter name" value="{{ $category->name ?? '' }}" />
    </x-form-group>
    <x-form-group id="description" caption="Description">
        <x-textarea name="description" caption="Enter description" rows="5" value="{{ $category->description ?? '' }}" />
    </x-form-group>
    <div class="text-right">
        @if(!empty($category))
            <button type="button" class="btn btn-danger px-3 float-left" onclick="confirm_delete({{ $category->id }})">Delete</button>
        @endif
        <button type="button" class="btn btn-default px-3" onclick="clear_form()">Cancel</button>
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>
</form>


<script>
    $category_form = $('#category_form');
    $category_form.submit((e) => {
        e.preventDefault();
        let data = new FormData($category_form.get(0));
        $.ajax({
            url: "{{ route('admin.categories.save') }}",
            type: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                search_category(selected_page);
                clear_form();
            },
        }).fail((xhr) => {
            let error = JSON.parse(xhr.responseText);
            if (error.errors) {
                displayErrors('alert_category', error.errors);
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
                delete_category(id);
            }
        })
    }
    delete_category = (id) => {
        let data = {_token: '{{ csrf_token() }}', id};
        $.post("{{ route('admin.categories.delete') }}", data, () => {
            search_category(selected_page);
            clear_form();
        }).fail((xhr) => {
            console.log(xhr.responseText);
        });
    }
</script>
