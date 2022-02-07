@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if (session()->has('Add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('Add') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('Delete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('Delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif






        <form action="{{ route('locations.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">أدخل إسم المنطقة</label>
              <input type="text" class="form-control" id="name"  placeholder="name of area" name="area">
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-success">إدخال</button>
        </form>






        <hr>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    
                <tr>
                  <th scope="row">1</th>
                  <td>{{ $location->area }}</td>
                  <td>
                    
                      
                      <form action="{{ route('location.destroy',  $location->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {!! method_field('DELETE') !!}
                            <button  class="btn btn-danger" type="submit"  >Delete</button>
                        </form>
                    
                  </td>
                
                </tr>



                @endforeach


            </tbody>
          </table>
    </div>

@endsection