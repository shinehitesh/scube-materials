@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Inward-Outward Quantity') }}</div>

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
                    <form method="post" action="{{route('quantity.store')}}">
                    	@csrf
          					  <div class="form-group">
          					    <label for="category">Material Category</label>
          					     <select id="material-category" name="category" class="form-control">
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option> 
                            @endforeach    
                         </select>
          					    @error('category')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
          					  </div>
                      <div class="form-group" id="material-name-div" style="display: none">
                        <label for="material_name">Material Name</label>
                         <select id="material_name" name="material_name" class="form-control">
                            
                             
                         </select>
                        @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="date">Date</label>
                         <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                        @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="quantity">Inward-outward Quantity</label>
                         <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                        @error('quantity')
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
