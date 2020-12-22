<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="30px">No</th>
            <th>Name</th>
            <th>Website</th>
            <th>Image</th>
            <th width="30px">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(method_exists($clients, 'links'))
            @php
                $clients = $clients ?? null;
                $no = (($clients->currentPage()-1) * $clients->perPage()) + 1
            @endphp
        @else
            @php($no = 1)
        @endif
        @foreach($clients as $client)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-nowrap">{{ $client->name }}</td>
                <td>{{ $client->website }}</td>
                <td class="py-0 vertical-middle"><img src="{{ asset("assets/$client->image") }}" alt="" class="img-fluid" style="height: 35px;"></td>
                <td class="p-0 text-center vertical-middle" width="30px">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-menu-left"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit_post({{ $client->id }})">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($clients, 'links'))
    {{ $clients->links('vendor.pagination.custom', ['function' => 'search_post']) }}
@endif
