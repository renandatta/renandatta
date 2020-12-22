<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="30px">No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Date</th>
            <th>Image</th>
            <th width="30px">Action</th>
        </tr>
        </thead>
        <tbody>
        @if(method_exists($posts, 'links'))
            @php
                $posts = $posts ?? null;
                $no = (($posts->currentPage()-1) * $posts->perPage()) + 1
            @endphp
        @else
            @php($no = 1)
        @endif
        @foreach($posts as $post)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->tags }}</td>
                <td class="text-nowrap">{{ format_date($post->date) }}</td>
                <td class="py-0 vertical-middle"><img src="{{ asset("assets/$post->image") }}" alt="" class="img-fluid" style="height: 35px;"></td>
                <td class="p-0 text-center vertical-middle" width="30px">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-menu-left"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit_post({{ $post->id }})">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($posts, 'links'))
    {{ $posts->links('vendor.pagination.custom', ['function' => 'search_post']) }}
@endif
