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
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> Features</h5>
                <div id="feature_table"></div>
            </td>
            <td class="bg-light" id="feature_search">
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database-search mr-2"></i> Search</h5>
                <form id="search_form">
                    @csrf
                    <x-form-group id="name" caption="Name">
                        <x-input name="name" caption="Search by name" />
                    </x-form-group>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </td>
            <td class="bg-light" id="feature_info" width="350px">
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        // manage ui
        $feature_data = $('#feature_data');
        $feature_search = $('#feature_search');
        $feature_search.hide();
        toggle_search = () => {
            $feature_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $feature_table = $('#feature_table');
        search_feature = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            $.post("{{ route('admin.features.search') }}", data, (result) => {
                $feature_table.html(result);
            }).fail((xhr) => {
                $feature_table.html(xhr.responseText);
            });
        }
        search_feature();
        $search_form.submit((e) => {
            e.preventDefault();
            search_feature();
        })

        // crud
        $feature_info = $('#feature_info');
        $feature_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.features.info') }}", data, (result) => {
                $feature_info.html(result);
                $feature_info.show();
            }).fail((xhr) => {
                $feature_info.html(xhr.responseText);
                $feature_info.show();
            });
        }
        edit_feature = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.features.info') }}", data, (result) => {
                $feature_info.html(result);
                $feature_info.show();
            }).fail((xhr) => {
                $feature_info.html(xhr.responseText);
                $feature_info.show();
            });
        }
        clear_form = () => {
            $feature_info.html('');
            $feature_info.hide();
        }
    </script>
@endpush
