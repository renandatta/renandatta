<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="30px">No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th width="30px">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(method_exists($services, 'links'))
            @php
                $services = $services ?? null;
                $no = (($services->currentPage()-1) * $services->perPage()) + 1
            @endphp
        @else
            @php($no = 1)
        @endif
        @foreach($services as $service)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-nowrap">{{ $service->name }}</td>
                <td>{{ $service->description }}</td>
                <td class="p-0 vertical-middle"><img src="{{ asset("assets/$service->image") }}" alt="" class="img-fluid" style="height: 35px;"></td>
                <td class="p-0 text-center vertical-middle" width="30px">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-menu-left"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit_post({{ $service->id }})">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($services, 'links'))
    {{ $services->links('vendor.pagination.custom', ['function' => 'search_post']) }}
@endif
