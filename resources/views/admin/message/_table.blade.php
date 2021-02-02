<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th width="30px">No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        @if(method_exists($messages, 'links'))
            @php
                $messages = $messages ?? null;
                $no = (($messages->currentPage()-1) * $messages->perPage()) + 1
            @endphp
        @else
            @php($no = 1)
        @endif
        @foreach($messages as $message)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-nowrap">{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->message }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(method_exists($messages, 'links'))
    {{ $messages->links('vendor.pagination.custom', ['function' => 'search_post']) }}
@endif
