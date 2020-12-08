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
                    <form method="post" action="{{route('category.store')}}">
                    	@csrf
					  <div class="form-group">
					    <label for="category_name">Category Name</label>
					     <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" required autocomplete="category_name" autofocus>
					    @error('category_name')
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
