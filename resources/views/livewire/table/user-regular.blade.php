<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
{{--                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">--}}
{{--                    ID--}}
{{--                    @include('components.sort-icon', ['field' => 'id'])--}}
{{--                </a></th>--}}
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                    Email
                    @include('components.sort-icon', ['field' => 'email'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
{{--                    <td>{{ $user->id }}</td>--}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a href="{{ route('admin.user-regular.show', $user->id) }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-eye"></i> Lihat</a>
{{--                        <a role="button" href="{{ route('admin.user-regular.edit', $user->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>--}}
                        <a href="#" x-on:click.prevent="deleteItem" class="btn btn-icon icon-left btn-danger"><i class="fa fa-16px fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
