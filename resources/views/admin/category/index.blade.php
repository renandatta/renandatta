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
    <table class="table bg-main" >
        <tr>
            <td>
                <button class="btn btn-sm btn-success float-right px-3" onclick="add_new()">add new</button>
                <button class="btn btn-sm btn-info float-right px-3 mr-3" onclick="toggle_search()">search</button>
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> Categories</h5>
                <div id="category_table"></div>
            </td>
            <td class="bg-light" id="category_search">
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database-search mr-2"></i> Search</h5>
                <form id="search_form">
                    @csrf
                    <x-form-group id="search_name" caption="Name">
                        <x-input prefix="search_" name="name" caption="Search by name" />
                    </x-form-group>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </td>
            <td class="bg-light" id="category_info" width="350px">
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        // manage ui
        $category_data = $('#category_data');
        $category_search = $('#category_search');
        $category_search.hide();
        toggle_search = () => {
            $category_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $category_table = $('#category_table');
        search_category = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            data.paginate = 10;
            $.post("{{ route('admin.categories.search') }}?page=" + selected_page, data, (result) => {
                $category_table.html(result);
            }).fail((xhr) => {
                $category_table.html(xhr.responseText);
            });
        }
        search_category();
        $search_form.submit((e) => {
            e.preventDefault();
            search_category();
        })

        // crud
        $category_info = $('#category_info');
        $category_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.categories.info') }}", data, (result) => {
                $category_info.html(result);
                $category_info.show();
            }).fail((xhr) => {
                $category_info.html(xhr.responseText);
                $category_info.show();
            });
        }
        edit_category = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.categories.info') }}", data, (result) => {
                $category_info.html(result);
                $category_info.show();
            }).fail((xhr) => {
                $category_info.html(xhr.responseText);
                $category_info.show();
            });
        }
        clear_form = () => {
            $category_info.html('');
            $category_info.hide();
        }
    </script>
@endpush
