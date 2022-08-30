@extends('admin.index')
@push('custom-css')
<style type="text/css">
  .search{
    margin-top: 20px;
  }
  .btn-search{
    position: relative;
    top: -38px;
    right: 112%;
  }
</style>
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('main.show all users')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('users.create')}}" class="btn btn-primary">@lang('main.add new user')</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 card">
              <form>
                <div class="col-md-4">
                  <input type="text" name="search" class="form-control search" placeholder="@lang('main.search')">
                  <button type="submit" class="btn btn-success btn-search"><li class="fa fa-search"></li> @lang('main.search')  </button>
                </div>
              </form>

            <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <th>#</th>
                <th>@lang('main.name')</th>
                <th>@lang('main.email')</th>
                <th>@lang('main.actions')</th>

              </thead>
              <tbody>
                @foreach ($users as $key => $user)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                      <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">@lang('main.show')</a>
                      @can('user-edit')
                          <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">@lang('main.edit')</a>
                      @endcan
                      @if($user->id > 1)
                      @can('user-delete')
                          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                          <button type="submit" class="btn btn-danger">@lang('main.delete')</button>
                          {!! Form::close() !!}
                      @endcan
                      @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection