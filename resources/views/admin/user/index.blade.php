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
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> Users</h5>
                <div id="user_table"></div>
            </td>
            <td class="bg-light" id="user_search">
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database-search mr-2"></i> Search</h5>
                <form id="search_form">
                    @csrf
                    <x-form-group id="search_name" caption="Name">
                        <x-input prefix="search_" name="name" caption="Search by name" />
                    </x-form-group>
                    <x-form-group id="search_email" caption="Email">
                        <x-input prefix="search_" email="email" caption="Search by email" />
                    </x-form-group>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </td>
            <td class="bg-light" id="user_info" width="400px">
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        // manage ui
        $user_data = $('#user_data');
        $user_search = $('#user_search');
        $user_search.hide();
        toggle_search = () => {
            $user_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $user_table = $('#user_table');
        search_user = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            $.post("{{ route('admin.users.search') }}?page=" + selected_page, data, (result) => {
                $user_table.html(result);
            }).fail((xhr) => {
                $user_table.html(xhr.responseText);
            });
        }
        search_user();
        $search_form.submit((e) => {
            e.preventDefault();
            search_user();
        })

        // crud
        $user_info = $('#user_info');
        $user_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.users.info') }}", data, (result) => {
                $user_info.html(result);
                $user_info.show();
            }).fail((xhr) => {
                $user_info.html(xhr.responseText);
                $user_info.show();
            });
        }
        edit_user = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.users.info') }}", data, (result) => {
                $user_info.html(result);
                $user_info.show();
            }).fail((xhr) => {
                $user_info.html(xhr.responseText);
                $user_info.show();
            });
        }
        clear_form = () => {
            $user_info.html('');
            $user_info.hide();
        }
    </script>
@endpush
