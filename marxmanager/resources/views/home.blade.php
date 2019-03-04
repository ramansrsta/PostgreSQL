@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('inc.messages')
                    <button type="button"
                    class="btn btn-primary btn-lg" 
                    data-toggle="modal" 
                    data-target="#addModal"
                    name="button">
                        Add Bookmark
                    </button>
                    <hr>

                    <h3>My Bookmarks</h3>
                    <ul class="list-group">
                        @foreach($bookmarks as $bookmark)
                            <li class="list-group-item clearfix">
                            <a href="{{$bookmark->url}}" target="_blank" style="position:absolute;top:30%"> {{$bookmark->name}} 
                                <span class="badge badge-dark"> {{$bookmark->description}} </span>
                            </a>
                                <span class="float-right button-group"> 
                                    <button data-id="{{$bookmark->id}}" class="delete-bookmark btn btn-danger" type="button" name="button">
                                        Delete
                                    </button>
                                </span>
                            </li>


                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add BookMark</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('bookmarks.store')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label> Bookmark Name </label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label> Bookmark URL</label>
                <input type="text" class="form-control" name="url">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"> </textarea>
            </div>

            <input type="submit" value="Submit" name="submit" class="btn btn-success">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
