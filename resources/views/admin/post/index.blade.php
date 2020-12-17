@extends('admin.layouts.index')

@section('title')
    {{ $title }} -
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{ $title }}</h4>
            </div>
        </div>
    </div>
    <div class="card" id="post_info">
        <div class="card-body"></div>
    </div>
    <table class="table bg-main" >
        <tr>
            <td>
                <button class="btn btn-sm btn-success float-right px-3" onclick="add_new()">add new</button>
                <button class="btn btn-sm btn-info float-right px-3 mr-3" onclick="toggle_search()">search</button>
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> Posts</h5>
                <div id="post_table"></div>
            </td>
            <td class="bg-light" id="post_search">
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database-search mr-2"></i> Search</h5>
                <form id="search_form">
                    @csrf
                    <x-form-group id="search_name" caption="Name">
                        <x-input prefix="search_" name="name" caption="Search by name" />
                    </x-form-group>
                    <x-form-group id="search_tags" caption="Name">
                        <x-input prefix="search_" name="tags" caption="Search by tag" />
                    </x-form-group>
                    <x-form-group id="search_category_id" caption="Category">
                        <x-select prefix="search_" name="category_id" :options="$categories" default="1" />
                    </x-form-group>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        // manage ui
        $post_data = $('#post_data');
        $post_search = $('#post_search');
        $post_search.hide();
        toggle_search = () => {
            $post_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $post_table = $('#post_table');
        search_post = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            data.paginate = 10;
            $.post("{{ route('admin.posts.search') }}?page=" + selected_page, data, (result) => {
                $post_table.html(result);
            }).fail((xhr) => {
                $post_table.html(xhr.responseText);
            });
        }
        search_post();
        $search_form.submit((e) => {
            e.preventDefault();
            search_post();
        })

        // crud
        $post_info = $('#post_info');
        $post_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.posts.info') }}", data, (result) => {
                $post_info.find('.card-body').html(result);
                $post_info.show();
            }).fail((xhr) => {
                $post_info.find('.card-body').html(xhr.responseText);
                $post_info.show();
            });
        }
        edit_post = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.posts.info') }}", data, (result) => {
                $post_info.find('.card-body').html(result);
                $post_info.show();
            }).fail((xhr) => {
                $post_info.find('.card-body').html(xhr.responseText);
                $post_info.show();
            });
        }
        clear_form = () => {
            $post_info.html('');
            $post_info.hide();
        }
    </script>
@endpush
