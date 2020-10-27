@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-note icon-gradient bg-premium-dark"></i>
            </div>
            <div>Monthly Billing
                <div class="page-title-subheading">Welcome to SPE Admin</div>
            </div>
        </div>

        <div class="page-title-actions">
            <button type="button" data-toggle="modal" data-target="#addMonthlyBill" class="btn-shadow btn btn-info">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="fa fa-file-medical fa-w-20"></i>
                </span>
                Add Bill
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

              <div class="card-title">Billing List</div>

              <table class="mb-0 table table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Shop Name</th>
                      <th>Billing Date</th>
                      <th>Reason</th>
                      <th>Month</th>
                      <th>Payment Type</th>
                      <th>Payment Via</th>
                      <th>Amount</th>
                      <th>Collected By</th>
                      <th>Remarks</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sl = 1;
                    foreach($monthly_bills as $bill):
                    ?>
                      <tr>
                          <th scope="row"><?php echo $sl; ?></th>
                          <td><?php echo $bill->pharmacy_name; ?></td>
                          <td><?php echo date("jS F, Y", strtotime($bill->pay_date)); ?></td>
                          <td><?php echo $bill->payment_for; ?></td>
                          <td><?php echo $bill->month; ?></td>
                          <td><?php echo $bill->payment_type; ?></td>
                          <td><?php echo $bill->payment_by; ?></td>
                          <td><?php echo $bill->amount; ?></td>
                          <td><?php echo $bill->user_name; ?></td>
                          <td><?php echo $bill->remarks; ?></td>
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
<div class="modal fade" style="display:none;" id="addMonthlyBill" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Bill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('save-monthly-bill') }}">
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
                        <label for="pay_date" class="col-md-4 col-form-label text-md-right">{{ __('Payment Date') }}</label>
                        <div class="col-md-6">
                            <input type="date" name="pay_date" class="form-control form-control-1 input-sm from" required placeholder="Payment Date" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="payment_for" class="col-md-4 col-form-label text-md-right">{{ __('Reason Of Payment') }}</label>
                        <div class="col-md-6">
                            <select name="payment_for" id="payment_for" required class="form-control @error('payment_for') is-invalid @enderror" name="payment_for">
                                <option value="Feature Development">Feature Development</option>
                                <option value="Report">Report</option>
                                <option value="Monthly Bill">Monthly Bill</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="payment_type" class="col-md-4 col-form-label text-md-right">{{ __('Payment Type') }}</label>
                        <div class="col-md-6">
                            <select name="payment_type" id="payment_type" required class="form-control @error('payment_type') is-invalid @enderror" name="payment_type">
                                <option value="Full">Full</option>
                                <option value="Partial">Partial</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="month" class="col-md-4 col-form-label text-md-right">{{ __('Month') }}</label>
                        <div class="col-md-6">
                            <input type="month" name="month" required class="form-control form-control-1 input-sm from @error('month') is-invalid @enderror" placeholder="Month" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="payment_by" class="col-md-4 col-form-label text-md-right">{{ __('Payment Via') }}</label>
                        <div class="col-md-6">
                            <select name="payment_by" id="payment_by" required class="form-control @error('payment_by') is-invalid @enderror" name="payment_by">
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="bKash">bKash</option>
                                <option value="Bank">Bank</option>
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
                    <div class="form-group row">
                        <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
                        <div class="col-md-6">
                            <input type="number" name="amount" required class="form-control form-control-1 input-sm from @error('amount') is-invalid @enderror" placeholder="Amount" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="remarks" class="col-md-4 col-form-label text-md-right">{{ __('Remarks') }}</label>
                        <div class="col-md-6">
                            <textarea name="remarks" id="remarks" autocomplete="remarks" class="form-control @error('remarks') is-invalid @enderror">{{ old('remarks') }}</textarea>
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