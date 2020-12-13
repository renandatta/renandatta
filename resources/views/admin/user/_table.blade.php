<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="30px">No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(method_exists($users, 'links'))
            @php
                $users = $users ?? null;
                $no = (($users->currentPage()-1) * $users->perPage()) + 1
            @endphp
        @else
            @php($no = 1)
        @endif
        @foreach($users as $user)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="p-0 text-center vertical-middle" width="30px">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-menu-left"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit_user({{ $user->id }})">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($users, 'links'))
    {{ $users->links('vendor.pagination.custom', ['function' => 'search_user']) }}
@endif
