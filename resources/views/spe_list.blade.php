@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-home icon-gradient bg-premium-dark"></i>
            </div>
            <div>SPE List
                <div class="page-title-subheading">Welcome to SPE Admin</div>
            </div>
        </div>

        <div class="page-title-actions">
            <button type="button" data-toggle="modal" data-target="#UserAdd" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-file-medical fa-w-20"></i>
                </span>
                Add New SPE
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
              @if (session('message'))
                <div class="page-title-heading">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
              @endif

              <div class="card-title">SPE List</div>

              <table class="mb-0 table table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Code</th>
                      <th>Shop Name</th>
                      <th>Location</th>
                      <th>License No</th>
                      <th>Model Pharmacy No</th>
                      <th>Owner Name</th>
                      <th>Contact Person</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Start Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sl = 1;
                    foreach($pharmacies as $pharmacy):
                    ?>
                      <tr>
                          <th scope="row"><?php echo $sl; ?></th>
                          <td><?php echo $pharmacy->pharmacy_code; ?></td>
                          <td><?php echo $pharmacy->name; ?></td>
                          <td><?php echo $pharmacy->location; ?></td>
                          <td><?php echo $pharmacy->license_no; ?></td>
                          <td><?php echo $pharmacy->model_pharmacy_no; ?></td>
                          <td><?php echo $pharmacy->owner_name; ?></td>
                          <td><?php echo $pharmacy->contact_person; ?></td>
                          <td><?php echo $pharmacy->mobile_no; ?></td>
                          <td><?php echo $pharmacy->address; ?></td>
                          <td><?php echo $pharmacy->status; ?></td>
                          <td><?php echo $pharmacy->start_date; ?></td>
                      </tr>
                    <?php
                    $sl++;
                    endforeach;
                    ?>
                  </tbody>
              </table>
                
            </div>
        </div>
    </div>
</div>

@endsection

<!-- modal -->
<div class="modal fade" style="display:none;" id="UserAdd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Pharmacy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('save-pharmacy') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="pharmacy_code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                        <div class="col-md-6">
                            <input id="pharmacy_code" type="number" class="form-control @error('pharmacy_code') is-invalid @enderror" name="pharmacy_code" value="{{ old('pharmacy_code') }}" required autocomplete="pharmacy_code" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <textarea name="address" id="address" required autocomplete="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                        <div class="col-md-6">
                            <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="owner_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner Name') }}</label>
                        <div class="col-md-6">
                            <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" required autocomplete="owner_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="license_no" class="col-md-4 col-form-label text-md-right">{{ __('License No') }}</label>
                        <div class="col-md-6">
                            <input id="license_no" type="text" class="form-control @error('license_no') is-invalid @enderror" name="license_no" value="{{ old('license_no') }}" required autocomplete="license_no">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="model_pharmacy_no" class="col-md-4 col-form-label text-md-right">{{ __('Model Pharmacy No') }}</label>
                        <div class="col-md-6">
                            <input id="model_pharmacy_no" type="text" class="form-control @error('model_pharmacy_no') is-invalid @enderror" name="model_pharmacy_no" value="{{ old('model_pharmacy_no') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_person" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}</label>
                        <div class="col-md-6">
                            <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person No.') }}</label>
                        <div class="col-md-6">
                            <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>
                        <div class="col-md-6">
                            <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End modal -->


