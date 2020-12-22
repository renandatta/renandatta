@if(!empty($post))
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-pencil mr-2"></i> Edit</h5>
@else
    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-plus mr-2"></i> Add New</h5>
@endif
<form id="post_form" method="post">
    @csrf
    <x-alert type="error" id="alert_post" />
    <input type="hidden" name="id" value="{{ $post->id ?? '' }}">
    <div class="row">
        <div class="col-md-8">
            <x-form-group id="name" caption="Name">
                <x-input name="name" caption="Enter name" :value="$post->name ?? ''" />
            </x-form-group>
            <div class="row">
                <div class="col-md-3">
                    <x-form-group id="date" caption="Date Published">
                        <x-input name="date" caption="Enter date" :value="format_date($post->date ?? date('d-m-Y'))" class="datepicker" />
                    </x-form-group>
                </div>
                <div class="col-md-4">
                    <x-form-group id="search_category_id" caption="Category">
                        <x-select prefix="search_" name="category_id" :options="$categories" :value="$post->category_id ?? ''" class="select2" />
                    </x-form-group>
                </div>
                <div class="col-md-5">
                    <x-form-group id="tags" caption="Tags">
                        <x-input name="tags" caption="Enter tags" :value="$post->tags ?? ''" />
                    </x-form-group>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <x-form-group id="file" caption="Image">
                <x-input
                    type="file" name="file" class="dropify" data-height="100"
                    data-allowed-file-extensions="png jpg jpeg" accept="image/jpeg, image/png"
                    :data-default-file="(!empty($post)) ? asset('assets/'.$post->image) : ''"
                />
            </x-form-group>
        </div>
    </div>
    <x-form-group id="content" caption="Content">
        <x-textarea name="content" :value="$post->content ?? ''" class="summernote" />
    </x-form-group>
    <div class="text-right">
        @if(!empty($post))
            <button type="button" class="btn btn-danger px-3 float-left" onclick="confirm_delete({{ $post->id }})">Delete</button>
        @endif
        <button type="button" class="btn btn-default px-3" onclick="clear_form()">Cancel</button>
        <button type="submit" class="btn btn-primary px-3">Save</button>
    </div>
</form>


<script>
    init_form_element();
    $post_form = $('#post_form');
    $post_form.submit((e) => {
        e.preventDefault();
        let data = new FormData($post_form.get(0));
        $.ajax({
            url: "{{ route('admin.posts.save') }}",
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
        $.post("{{ route('admin.posts.delete') }}", data, () => {
            search_post(selected_page);
            clear_form();
        }).fail((xhr) => {
            console.log(xhr.responseText);
        });
    }
</script>
