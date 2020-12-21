<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="30px">No</th>
            <th>Name</th>
            <th>Content</th>
            <th width="30px">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(method_exists($profiles, 'links'))
            @php
                $profiles = $profiles ?? null;
                $no = (($profiles->currentPage()-1) * $profiles->perPage()) + 1
            @endphp
        @else
            @php($no = 1)
        @endif
        @foreach($profiles as $profile)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-nowrap">{{ $profile->name }}</td>
                @if($profile->type == 'text')
                    <td>{{ $profile->content }}
                @else
                    <td class="py-0 vertical-middle"><img src="{{ asset("assets/$profile->content") }}" alt="" class="img-fluid" style="height: 35px;"></td>
                @endif
                <td class="p-0 text-center vertical-middle" width="30px">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-menu-left"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit_profile({{ $profile->id }})">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($profiles, 'links'))
    {{ $profiles->links('vendor.pagination.custom', ['function' => 'search_profile']) }}
@endif
