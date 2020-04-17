@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Business Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addvendor') }}">
                        @csrf
                        <input type="hidden" name="userId" value="{{\Auth::user()->id}}">


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name">


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="logo" value="">


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="des" class="col-md-4 col-form-label text-md-right">{{ __('Business Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="des" type="text" class="form-control" name="des" value="{{ old('des') }}" required autocomplete="description"></textarea>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Business type') }}</label>

                            <div class="col-md-6">
                              <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required autocomplete="new-type">
                                <option value="">Choose Business type</option>
                                <option value="food">Food</option>
                                <option value="jewlery">Jewlery</option>
                                <option value="accessories">Accessories</option>
                              </select>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Business') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
