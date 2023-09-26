@extends('layouts.admin')

@section('title')
  {{ __('Thêm Nghỉ phép') }}
@endsection

@section('header')
  <h1 class="h3 mb-3">Nghỉ phép</h1>
@endsection

@section('content')
  <section class="row">
    <div class="col-8">
      <form method="POST" action="{{ Auth::user()->role->slug === 'super-admin' ? route('leaves.store') : (Auth::user()->role->slug === 'administrator' ? route('admin.leaves.store') : route('hr.leaves.store') ) }}">
        @csrf
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Add Leave</h5>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12">
                <label for="start_date">tiêu đề</label>
                <input type="text" name="title" id="start_date" class="form-control" required>
              </div>
              <div class="col-12">
                <label for="employee_id">Nhân viên</label>
                <select name="employee_id" id="employee_id" class="form-control" required>
                  @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label for="start_date">Ngày bắt đầu</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
              </div>
              <div class="col-6">
                <label for="end_date">Ngày kết thúc</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
              </div>
              <div class="col-6">
                <label for="leave_type">Loại nghỉ</label>
                <select name="leave_type" id="leave_type" class="form-control" required>
                  <option value="1">Nghỉ</option>
                  <option value="2">Nghỉ ốm</option>
                  <option value="3">Nghỉ phép khẩn cấp</option>
                  <option value="4">Nghỉ không lí do</option>
                  <option value="5">nghỉ có giấy bệnh viện</option>
                  <option value="6">Nghỉ thông thường</option>
                  <option value="7">Nghỉ kết hôn</option>
                </select>
              </div>
              <div class="col-6">
                <label for="status">Loại chấp thuận</label>
                <select name="status" id="status" class="form-control" required>
                  <option value="1">Chấp thuận</option>
                  <option value="0">Không chấp thuận</option>
                </select>
              </div>
              <div>
                <label for="leave_reason">Lý do nghỉ</label>
                <textarea name="leave_reason" class="form-control" id=""></textarea>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Apply</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
@endsection