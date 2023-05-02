@extends('layouts.app')

@section('title', 'User Listing')

@section('content')
    <div style="margin: 16px">
        <a class="btn btn-md btn-default p-5" onClick="createUser()" data-toggle="modal" data-target="#createModal" style="float: right;">
            Create New User
        </a>
    </div>

    <div class="responsive-table col-md-12 col-lg-12" style="margin-top: 30px">
        <table style="width: 100%">
            <tbody>
                @foreach ($users as $user)
                    <tr class="table-row">
                        <td class="col-2" role='button'>{{ $user->full_name }}</td>
                        <td class="col-2" role='button'>{{ $user->email_address }}</td>
                        <td class="col-1" data-toggle="modal" data-target="#deleteUser{{ $user->id }}" role='button'>
                            <i class="fa fa-trash" style="color: red;"></i>
                        </td>
                    </tr>

                    @include('users/partials.delete-modal', ['user' => $user])
                @endforeach
            </tbody>
        </table>
    </div>

    @include('users/partials.create-modal')
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('click', '[data-user-id]', function (event) {
                event.preventDefault();
                const userId = $(this).data('user-id');
                $('#deleteUserModal').modal('show').find('form').attr('action', '/users/' + userId);
            });
        });

        function createUser() {
            $.ajax({
                url: '/users/create',
                type: 'get',
                success: function (data) {
                    console.log(data);
                    $("#createUserModal").html(data)
                }
            })
        }
    </script>
@endpush
