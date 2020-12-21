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
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> Services</h5>
                <div id="service_table"></div>
            </td>
            <td class="bg-light" id="service_search" width="350px">
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
            <td class="bg-light" id="service_info" width="350px">
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        // manage ui
        $service_data = $('#service_data');
        $service_search = $('#service_search');
        $service_search.hide();
        toggle_search = () => {
            $service_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $service_table = $('#service_table');
        search_post = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            data.paginate = 10;
            $.post("{{ route('admin.services.search') }}?page=" + selected_page, data, (result) => {
                $service_table.html(result);
            }).fail((xhr) => {
                $service_table.html(xhr.responseText);
            });
        }
        search_post();
        $search_form.submit((e) => {
            e.preventDefault();
            search_post();
        })

        // crud
        $service_info = $('#service_info');
        $service_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.services.info') }}", data, (result) => {
                $service_info.html(result);
                $service_info.show();
            }).fail((xhr) => {
                $service_info.html(xhr.responseText);
                $service_info.show();
            });
        }
        edit_post = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.services.info') }}", data, (result) => {
                $service_info.html(result);
                $service_info.show();
            }).fail((xhr) => {
                $service_info.html(xhr.responseText);
                $service_info.show();
            });
        }
        clear_form = () => {
            $service_info.html('');
            $service_info.hide();
        }
    </script>
@endpush
