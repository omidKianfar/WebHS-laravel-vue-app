@extends('admin.main')
    @section('content')

        <h5 class="m-2">users Tables</h5>
        <input class="form-control mb-2" id="dashboardsearch" type="text" placeholder="Search">
        <div class="table-responsive" id="myDashboardTable">
            <table class="table table-hover table-secondary rounded table-sm">
                <thead>
                    <th >Id</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>type</th>
                </thead >
                @foreach ($users as $user)
                <tbody>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->type}}</td>
                    <td>
                        <form action="{{ route('users.update', $user->id)}}" method="post" >
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <input class="btn btn-sm btn-link " type="submit" value="Admin">
                        </form>
                    </td>
                    <td>
                        <form class="d-inline" action="{{ route('users.destroy', $user->id)}}" method="post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <input class="btn btn-sm btn-link " type="submit" value="Delete">
                        </form>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
    @endsection
