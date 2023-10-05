@extends('layouts.admin')

@section('title')
  {{ __('Quản lí Tiền lương') }}
@endsection

@section('header')
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-3">Tiền lương</h1>
    <a href="{{ route('payroll.report') }}" class="btn btn-secondary">
      <i class="fas fa-arrow-left"></i>
      <span class="ps-1">{{ __('Back') }}</span>
    </a>
  </div>
@endsection

@section('content')
<section class="row">
  <div class="col-12">
    <div class="card flex-fill">
      <div class="card-header">              
        <h5 class="card-title mb-0">{{ __('Nhân viên tham dự hàng ngày') }}</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('generate.payroll') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-3">
              {{-- <label for="year">Select Year:</label> --}}
              <select name="year" class="form-select" id="year">
                <option value="">{{ __('Chọn năm') }}</option>
                <option value="2023">{{ __('2023') }}</option>
              </select>
            </div>
            <div class="col-3">
              {{-- <label for="month">Select Month:</label> --}}
              <select name="month" class="form-select" id="month">
                <option value="">{{ __('Chọn tháng') }}</option>
                <option value="1">{{ __('Tháng 1') }}</option>
                <option value="2">{{ __('Tháng 2') }}</option>
                <option value="3">{{ __('Tháng 3') }}</option>
                <option value="4">{{ __('Tháng 4') }}</option>
                <option value="5">{{ __('Tháng 5') }}</option>
                <option value="6">{{ __('Tháng 6') }}</option>
                <option value="7">{{ __('Tháng 7') }}</option>
                <option value="8">{{ __('Tháng 8') }}</option>
                <option value="9">{{ __('Tháng 9') }}</option>
                <option value="10">{{ __('Tháng 10') }}</option>
                <option value="11">{{ __('Tháng 11') }}</option>
                <option value="12">{{ __('Tháng 12') }}</option>
              </select>
            </div>
            <div class="col-6">
              <button type="submit" class="btn btn-primary">{{ __('Generate') }}</button>
            </div>
          </div>
      </form>
      </div>
      <div class="table-responsive">
        @isset($selectedYear)
        @isset($selectedMonth)
          <h2>Salary Sheet for {{ $selectedMonth }}/{{ $selectedYear }}</h2>
          <table class="table table-hover my-0 table-bordered">
            <thead>
              <tr>
                <th scope="col" width="200px">{{ __('Tên nhân viên') }}</th>
                <th scope="col">{{ __('Vị trí nhân viên') }}</th>
                <th scope="col">Lương cơ bản</th>
                <th scope="col">Tiền thuê nhà</th>
                <th scope="col">Trợ cấp y tế</th>
                <th scope="col">Phụ cấp di chuyển</th>
                <th scope="col">Phụ cấp đặc biệt</th>
                <th scope="col">Tiền thưởng</th>
                <th scope="col">Có mặt</th>
                <th scope="col">Vắng mặt</th>
                <th scope="col">Tiền thưởng</th>
                {{-- <th scope="col">Overtime</th> --}}
                <th scope="col">Quỹ dự phòng</th>
                <th scope="col">Advanced</th>
                <th scope="col">Thuế</th>
                <th scope="col">Bảo hiểm nhân thọ</th>
                <th scope="col">Bảo hiểm y tế</th>
                <th scope="col">Lưong</th>
                <th scope="col">thưc nhận</th>
              </tr>
            </thead>
                <tbody>
                  @foreach ($salaryData as $data)
                  <tr>
                      <td>{{ $data->employee->firstname }}</td>
                      <td>{{ $data->basic }}</td>
                      <td>{{ $data->house_rent }}</td>
                      <td>{{ $data->medical }}</td>
                      <!-- Add more fields as needed -->
                  </tr>
              @endforeach
                </tbody>
          </table>
          @endisset
        @endisset
      </div>
      
    </div>
  </div>
    
</section>
@endsection

@section('script')
<script>
  $(document).ready(function() {
      $(".employee").each(function() {
          var $employee = $(this);
          var basic = parseFloat($employee.find(".basic").val());
          var rent = parseFloat($employee.find(".rent").val());
          var medical = parseFloat($employee.find(".medical").val());
          var transport = parseFloat($employee.find(".transport").val());
          var special = parseFloat($employee.find(".special").val());
          var bonus = parseFloat($employee.find(".bonus").val());
          // var present = $employee.find(".present").val();
          
          // if (present == 25 ) {
          //   bonus.val() + 500;
          // }

          var pf = parseFloat($employee.find(".pf").val());
          var advance = parseFloat($employee.find(".advance").val());
          var tax = parseFloat($employee.find(".tax").val());
          var life = parseFloat($employee.find(".life").val());
          var health = parseFloat($employee.find(".health").val());
          var absent = $employee.find(".absent").val();

          // if (absent > 0) {
          //   (basic.val() / 30) * absent;
          // }

          var grossSalary = basic + rent + medical + transport + special + bonus;
          var deductSalary = pf + advance + tax + life + health;
          var netSalary = grossSalary - deductSalary;
          
          $employee.find(".gross").val(grossSalary.toFixed(2));
          $employee.find(".deduct").val(deductSalary.toFixed(2));
          $employee.find(".net").val(netSalary.toFixed(2));

      });
  });
</script>
@endsection