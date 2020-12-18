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
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> Profiles</h5>
                <div id="profile_table"></div>
            </td>
            <td class="bg-light" id="profile_search">
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database-search mr-2"></i> Search</h5>
                <form id="search_form">
                    @csrf
                    <x-form-group id="search_name" caption="Name">
                        <x-input prefix="search_" name="name" caption="Search by name" />
                    </x-form-group>
                    <x-form-group id="search_type" caption="Type">
                        <x-select prefix="search_" class="select2" name="type" :options="$types" default="1" />
                    </x-form-group>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </td>
            <td class="bg-light" id="profile_info" width="350px">
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        init_form_element();

        // manage ui
        $profile_data = $('#profile_data');
        $profile_search = $('#profile_search');
        $profile_search.hide();
        toggle_search = () => {
            $profile_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $profile_table = $('#profile_table');
        search_profile = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            data.paginate = 10;
            $.post("{{ route('admin.profiles.search') }}?page=" + selected_page, data, (result) => {
                $profile_table.html(result);
            }).fail((xhr) => {
                $profile_table.html(xhr.responseText);
            });
        }
        search_profile();
        $search_form.submit((e) => {
            e.preventDefault();
            search_profile();
        })

        // crud
        $profile_info = $('#profile_info');
        $profile_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.profiles.info') }}", data, (result) => {
                $profile_info.html(result);
                $profile_info.show();
            }).fail((xhr) => {
                $profile_info.html(xhr.responseText);
                $profile_info.show();
            });
        }
        edit_profile = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.profiles.info') }}", data, (result) => {
                $profile_info.html(result);
                $profile_info.show();
            }).fail((xhr) => {
                $profile_info.html(xhr.responseText);
                $profile_info.show();
            });
        }
        clear_form = () => {
            $profile_info.html('');
            $profile_info.hide();
        }
    </script>
@endpush
