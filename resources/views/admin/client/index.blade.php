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
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> Clients</h5>
                <div id="client_table"></div>
            </td>
            <td class="bg-light" id="client_search" width="350px">
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
            <td class="bg-light" id="client_info" width="350px">
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        // manage ui
        $client_data = $('#client_data');
        $client_search = $('#client_search');
        $client_search.hide();
        toggle_search = () => {
            $client_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $client_table = $('#client_table');
        search_post = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            data.paginate = 10;
            $.post("{{ route('admin.clients.search') }}?page=" + selected_page, data, (result) => {
                $client_table.html(result);
            }).fail((xhr) => {
                $client_table.html(xhr.responseText);
            });
        }
        search_post();
        $search_form.submit((e) => {
            e.preventDefault();
            search_post();
        })

        // crud
        $client_info = $('#client_info');
        $client_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.clients.info') }}", data, (result) => {
                $client_info.html(result);
                $client_info.show();
            }).fail((xhr) => {
                $client_info.html(xhr.responseText);
                $client_info.show();
            });
        }
        edit_post = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.clients.info') }}", data, (result) => {
                $client_info.html(result);
                $client_info.show();
            }).fail((xhr) => {
                $client_info.html(xhr.responseText);
                $client_info.show();
            });
        }
        clear_form = () => {
            $client_info.html('');
            $client_info.hide();
        }
    </script>
@endpush
