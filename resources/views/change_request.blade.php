@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-note icon-gradient bg-premium-dark"></i>
            </div>
            <div>Change Request
                <div class="page-title-subheading">Welcome to SPE Admin</div>
            </div>
        </div>

        <div class="page-title-actions">
            <button type="button" data-toggle="modal" data-target="#UserAdd" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-file-medical fa-w-20"></i>
                </span>
                Add New CR
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

              <div class="card-title">Change Request List</div>

              <table class="mb-0 table table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Shop Name</th>
                      <th>CR Date</th>
                      <th>Feature</th>
                      <th>Details</th>
                      <th>Payment Type</th>
                      <th>Collected By</th>
                      <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sl = 1;
                    foreach($crLists as $cr):
                    ?>
                      <tr>
                          <th scope="row"><?php echo $sl; ?></th>
                          <td><?php echo $cr->pharmacy_name; ?></td>
                          <td><?php echo date("jS F, Y", strtotime($cr->created_at)); ?></td>
                          <td><?php echo $cr->feature; ?></td>
                          <td><?php echo $cr->details; ?></td>
                          <td><?php echo $cr->payment_type; ?></td>
                          <td><?php echo $cr->user_name; ?></td>
                          <td><?php echo $cr->status; ?></td>
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
<div class="modal fade" id="UserAdd" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Change Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('save-cr') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="pharmacy_id" class="col-md-4 col-form-label text-md-right">{{ __('Shop') }}</label>
                        <div class="col-md-6">
                          <select name="pharmacy_id" id="pharmacy_id" required class="form-control @error('pharmacy_id') is-invalid @enderror">
                              <?php
                              foreach($pharmacies as $pharmacy):
                              ?>
                                <option value="<?php echo $pharmacy->id; ?>"><?php echo $pharmacy->name; ?></option>
                              <?php
                              endforeach; 
                              ?>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="feature" class="col-md-4 col-form-label text-md-right">{{ __('Feature') }}</label>

                        <div class="col-md-6">
                            <select name="feature" id="feature" required class="form-control @error('feature') is-invalid @enderror" name="feature">
                                <option value="Dashboard">Dashboard</option>
                                <option value="Purchase">Purchase</option>
                                <option value="Sale">Sale</option>
                                <option value="Stock">Stock</option>
                                <option value="Consumer Product">Consumer Product</option>
                                <option value="Report">Report</option>
                                <option value="User">User</option>
                                <option value="Notification">Notification</option>
                                <option value="Billing">Billing</option>
                                <option value="Support">Support</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label>

                        <div class="col-md-6">
                            <textarea name="details" id="details" required autocomplete="details" class="form-control @error('details') is-invalid @enderror">{{ old('details') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="payment_type" class="col-md-4 col-form-label text-md-right">{{ __('Payment Type') }}</label>
                        <div class="col-md-6">
                            <select name="payment_type" id="payment_type" required class="form-control @error('payment_type') is-invalid @enderror" name="payment_type">
                                <option value="FREE">FREE</option>
                                <option value="PARTIAL-PAID">PARTIAL-PAID</option>
                                <option value="FULLY-PAID">FULLY-PAID</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="collected_by" class="col-md-4 col-form-label text-md-right">{{ __('Collected By') }}</label>
                        <div class="col-md-6">
                            <select name="collected_by" id="collected_by" required class="form-control @error('collected_by') is-invalid @enderror">
                                <?php
                                foreach($users as $user):
                                ?>
                                  <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                                <?php
                                endforeach; 
                                ?>
                            </select>
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