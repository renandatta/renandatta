<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="30px">No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(method_exists($categories, 'links'))
            @php
                $categories = $categories ?? null;
                $no = (($categories->currentPage()-1) * $categories->perPage()) + 1
            @endphp
        @else
            @php($no = 1)
        @endif
        @foreach($categories as $category)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-nowrap">{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td class="p-0 text-center vertical-middle" width="30px">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-menu-left"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit_category({{ $category->id }})">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($categories, 'links'))
    {{ $categories->links('vendor.pagination.custom', ['function' => 'search_category']) }}
@endif
