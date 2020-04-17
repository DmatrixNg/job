@extends('layouts.app')
@section('title', 'Set location')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <?php //dd($user->profile()->first()->hostel) ?>
          @if(is_null($user->profile()->first()->hostel))
            <div class="card">
                <div class="card-header">{{ __('Set Default Location') }}</div>

                <div class="card-body">
                  @if(session('message'))
                <span role="alert" style="padding:3px; text-align:center">
                  <strong>{{ session('message') }} </strong>
                </span>
                @endif
                    <form method="POST" action="{{ route('Deflocation') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="hostel" class="col-md-4 col-form-label text-md-right">{{ __('Hostel') }}</label>

                            <div class="col-md-6">

                                <select id="hostel" type="text" class="form-control" name="hostel" value="{{ $user->profile()->first()->hostel }}" required autocomplete="hostel">
                                  <option value="" select>Choose you hostel</option>
                                  <option value="caleb" @if($user->profile()->first()->hostel == "caleb") select @endif>Caleb Hall</option>
                                  <option value="joshua" @if($user->profile()->first()->hostel == "joshua") select @endif>Joshua Hall</option>
                                  <option value="joseph" @if($user->profile()->first()->hostel == "joseph") select @endif>Joseph Hall</option>
                                  <option value="mary" @if($user->profile()->first()->hostel == "mary") select @endif>Mary Hall</option>
                                  <option value="deborah" @if($user->profile()->first()->hostel == "deborah") select @endif>Deborah Hall</option>
                                  <option value="rebecca" @if($user->profile()->first()->hostel == "rebecca") select @endif>Rebecca Hall</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_no" class="col-md-4 col-form-label text-md-right">{{ __('Room number') }}</label>

                            <div class="col-md-6">
                                <input id="room_no" type="number" class="form-control" name="room_no" value="{{ old('room_no') }}"></input>


                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Business type') }}</label>

                            <div class="col-md-6">
                              <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required autocomplete="new-type">
                                <option value="">Choose Business type</option>
                                <option value="food">Food</option>
                                <option value="jewlery">Jewlery</option>
                                <option value="accessories">Accessories</option>
                              </select>
                            </div>
                        </div> -->



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Setting') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="card mt-2">
                <div class="card-header">{{ __('Set Delivery Location') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('location') }}">
                        @csrf
                        <div class="form-group row">
                          <div class="col-md-4 col-form-label ">

                          </div>
                          <div class="col-md-6">
                        <input type="checkbox"  name="location" value="default_location">  <span> {{ __('Check to use Default Location') }}</span>

                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4 col-form-label ">

                      </div>
                      <div class="col-md-6">
                    <span>OR</span>
                  </div>
                </div>
                        <div class="form-group row">
                            <label for="hostel" class="col-md-4 col-form-label text-md-right">{{ __('hostel') }}</label>

                            <div class="col-md-6">

                                <select id="hostel" type="text" class="form-control" name="hostel" value="{{ $user->profile()->first()->hostel }}" required autocomplete="hostel">
                                  <option value="" select>Choose you hostel</option>
                                  <option value="caleb" @if($user->profile()->first()->hostel == "caleb") select @endif>Caleb Hall</option>
                                  <option value="joshua" @if($user->profile()->first()->hostel == "joshua") select @endif>Joshua Hall</option>
                                  <option value="joseph" @if($user->profile()->first()->hostel == "joseph") select @endif>Joseph Hall</option>
                                  <option value="marry" @if($user->profile()->first()->hostel == "marry") select @endif>Marry Hall</option>
                                  <option value="rebecca" @if($user->profile()->first()->hostel == "rebecca") select @endif>Rebecca Hall</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_no" class="col-md-4 col-form-label text-md-right">{{ __('room_no') }}</label>

                            <div class="col-md-6">
                                <input id="room_no" type="text" class="form-control" name="user_location" value="{{ old('user_location') }}"></input>


                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Business type') }}</label>

                            <div class="col-md-6">
                              <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required autocomplete="new-type">
                                <option value="">Choose Business type</option>
                                <option value="food">Food</option>
                                <option value="jewlery">Jewlery</option>
                                <option value="accessories">Accessories</option>
                              </select>
                            </div>
                        </div> -->



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Setting') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
