@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                     @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                         @foreach ($errors->all() as $error)
                              {{ $error }}
                            @endforeach
                    </div>
                    @elseif(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <br />
                    <form method="post" action="{{route('material.update',$material->id)}}">
                        @csrf
                        @method('patch')
                      <div class="form-group">
                        <label for="material_name">Material Name</label>
                         <input id="material_name" type="text" class="form-control @error('material_name') is-invalid @enderror" name="material_name" value="{{ old('material_name',$material->material_name) }}" required autocomplete="material_name" autofocus>
                        @error('material_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="category">Category Name</label>
                         <select id="category" name="category" class="form-control">
                            @foreach($categories as $category)
                             <option value="{{$category->id}}"{{$material->category_id == $category->id?'selected':''}}>{{$category->category_name}}</option>
                             @endforeach
                         </select>
                        @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="opening_balance">Opening Balance</label>
                         <input id="opening_balance" type="text" class="form-control @error('opening_balance') is-invalid @enderror" name="opening_balance" value="{{ old('opening_balance',$material->opening_balance) }}" required autocomplete="opening_balance" autofocus>
                        @error('opening_balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="exampleFormControlInput1" value="submit">
                      </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
