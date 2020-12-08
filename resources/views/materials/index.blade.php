@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Categories') }}
                    <a href="{{route('material.create')}}"><input type="button" class="btn btn-primary" id="exampleFormControlInput1" value="Create Material">
                </div>

                <div class="card-body">
                   <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Material Name</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                        @foreach($materials as $material)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$material->material_name}}</td>
                          <td>{{$material->category_name}}</td>
                          <td>
                            <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{route('material.edit',$material->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                            <a class="btn btn-datatable btn-icon btn-transparent-dark" href="{{route('material.delete',$material->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                       
                      </tbody>
                    </table>
                    {{$materials->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
