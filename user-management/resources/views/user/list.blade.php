@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Users</div>
                        <div>
                            <a class="btn btn-primary btn-sm" href="{{ route('registeruser') }}">{{ __('Register') }}</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Register Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <form method="POST" class="switchToggle" action="{{ route('changeuserloginstatus', ['id' => $item->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="checkbox" id="`switch_{{ $item->id }}`" {{ $item->status ? 'checked' : ''}} onChange="this.closest('form').submit()">
                                        <label for="`switch_{{ $item->id }}`">Toggle</label>
                                    </form>
                                </td>
                                <td>{{ $item->created_at->format('F d, Y') }}</td>
                                <td>
                                    <span class="btn btn-sm btn-danger text-capitalize" data-toggle="modal" data-target="#staticBackdrop" onClick="setDeleteUser({{$item->id}}, '{{$item->name}}')">delete</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- display pagination links -->
                    {{ $list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Permission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="deleteUserForm">
        @csrf
        @method('delete')
        <div class="modal-body">
            <p>Do you really want to delete <b id="deleteUserName" class="text-capitalize"></b></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button class="btn btn-primary">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

<script>
    function setDeleteUser(id, name) {
        try {
            document.getElementById('deleteUserForm').setAttribute('action', `/users/${id}`)
            document.getElementById('deleteUserName').innerHTML = name
        } catch (err) {

        }
    }
</script>