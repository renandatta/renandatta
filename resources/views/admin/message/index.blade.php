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
                <button class="btn btn-sm btn-info float-right px-3 mr-3" onclick="toggle_search()">search</button>
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-database mr-2"></i> message</h5>
                <div id="message_table"></div>
            </td>
            <td class="bg-light" id="message_search" width="350px">
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
            <td class="bg-light" id="message_info" width="350px">
            </td>
        </tr>
    </table>
@endsection

@push('scripts')
    <script>
        // manage ui
        $message_data = $('#message_data');
        $message_search = $('#message_search');
        $message_search.hide();
        toggle_search = () => {
            $message_search.toggle();
        }

        // search
        let selected_page = 1;
        $search_form = $('#search_form');
        $message_table = $('#message_table');
        search_post = (page = 1) => {
            if (page.toString() === '+1') selected_page++;
            else if (page.toString() === '-1') selected_page--;
            else selected_page = page;

            let data = getFormData($search_form);
            data.paginate = 10;
            $.post("{{ route('admin.messages.search') }}?page=" + selected_page, data, (result) => {
                $message_table.html(result);
            }).fail((xhr) => {
                $message_table.html(xhr.responseText);
            });
        }
        search_post();
        $search_form.submit((e) => {
            e.preventDefault();
            search_post();
        })

        // crud
        $message_info = $('#message_info');
        $message_info.hide();
        add_new = () => {
            let data = {_token: '{{ csrf_token() }}'};
            $.post("{{ route('admin.messages.info') }}", data, (result) => {
                $message_info.html(result);
                $message_info.show();
            }).fail((xhr) => {
                $message_info.html(xhr.responseText);
                $message_info.show();
            });
        }
        edit_post = (id) => {
            let data = {_token: '{{ csrf_token() }}', id};
            $.post("{{ route('admin.messages.info') }}", data, (result) => {
                $message_info.html(result);
                $message_info.show();
            }).fail((xhr) => {
                $message_info.html(xhr.responseText);
                $message_info.show();
            });
        }
        clear_form = () => {
            $message_info.html('');
            $message_info.hide();
        }
    </script>
@endpush
