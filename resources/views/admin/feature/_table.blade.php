<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Url</th>
            <th>Icon</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($features as $feature)
            <tr>
                <td>{{ $feature->name }}</td>
                <td>{{ $feature->url }}</td>
                <td><i class="{{ $feature->icon }}"></i></td>
                <td class="p-0 text-center vertical-middle" width="30px">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-menu-left"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="edit_feature({{ $feature->id }})">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
