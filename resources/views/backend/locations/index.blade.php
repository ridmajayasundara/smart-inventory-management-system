@extends('backend.layouts.app')

@section('title', __('Locations'))

@section('content')
    <div>
        <x-backend.card>
            <x-slot name="header">
                Locations
            </x-slot>

            @if ($logged_in_user->hasAllAccess())
                <x-slot name="headerActions">
                    <x-utils.link
                            icon="c-icon cil-plus"
                            class="card-header-action"
                            :href="route('admin.locations.create')"
                            :text="__('Create Location')"></x-utils.link>
                </x-slot>
            @endif

            <x-slot name="body">
                <div class="container table-responsive pt-3">
                    <table class="table table-striped">
                        <tr>
                            <th>Location Name</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($locations as $key => $value)
                            <tr>
                                <td>{{ $value }}</td>
                                <td>
                                    <div class="d-flex px-0 mt-0 mb-0">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @if ($value != "Makerspace Lab")
                                                <a href=" {{route('admin.locations.edit', $key) }}"
                                                   class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i>
                                                </a>
                                                <a href="{{ route('admin.locations.delete', $key) }}"
                                                   class="btn btn-danger btn-xs"><i class="fa fa-trash"
                                                                                    title="Delete"></i>
                                                </a>
                                            @else
                                                <p>[Not Editable]</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </x-slot>
        </x-backend.card>
    </div>
@endsection
