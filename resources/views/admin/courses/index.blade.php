@extends('admin.main')
    @section('content')
        <h5>courses List</h5>
        <ul class="nav navbar mb-2 list-unstyled">
            <li class="nav-item">
                <a class="btn btn-success " href="{{route('courses.create')}}" title="For create new course ">Create course</a>
            </li>
        </ul>
        <input class="form-control mb-2" id="dashboardsearch" type="text" placeholder="Search">
        <div class="table-responsive" id="myDashboardTable">
            <table class="table table-hover table-secondary rounded table-sm">
                <thead >
                    <th >Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                </thead>
                @forelse ($courses as $course)
                <tbody >
                    <td>{{$course->id}}</td>
                    <td>{{Str::limit($course->image,20) }}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->description}}</td>
                    <td>
                        <a class="btn btn-sm btn-link" href="{{route('courses.show',$course->id)}}" title="For show course detailes ">
                            Show
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-link" href="{{route('courses.edit',$course->id)}}" title="For update course detiles and upload new course image ">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form class="d-inline" action="{{ route('courses.destroy', $course->id)}}" method="post" title="For delete course">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <input class="btn btn-sm btn-link " type="submit" value="Delete">
                        </form>
                    </td>
                </tbody>
                @empty
                    <div class="alert alert-warning">
                        course is empty
                    </div>
                @endforelse
            </table>
        </div>
    @endsection
