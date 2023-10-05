@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Thêm mới nhân viên') }}
@endsection

@section('header')
@endsection

@section('content')
  <section class="row">
    <div class="col-12">
      <form method="POST" action="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.store') : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.store') : route('hr.employee.store') ) }}">
        @csrf
        <div class="row g-3">
          <div class="col-6">
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ ('Cá nhân') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="firstname">{{ __('Tên') }}</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="John" />
                  </div>
                  <div class="col-6">
                    <label for="lastname">{{ __('Họ') }}</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Doe" required />
                  </div>
                  <div class="col-12">
                    <label for="email">{{ __('Địa chỉ Email') }}</label>
                    <select name="email" class="form-control" id="religion">
                    @foreach ($user as $item)
                   
                      <option value="">{{$item->email}}</option>
                      
                    
                    @endforeach
                  </select>
                   
                  </div>
                  <div class="col-6">
                    <label for="phone">{{ __('Số điện thoại') }}</label>
                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="{{ __('+88 (01X) XX-XXXXXX') }}" required oninput="formatPhoneNumber(this)" maxlength="19" />
                  </div>
                  <div class="col-6">
                    <label for="dob">{{ __('ngày sinh') }}</label>
                    <input type="date" name="dob" class="form-control" id="dob" />
                  </div>
                  <div class="col-12">
                    <label for="address">{{ __('địa chỉ') }}</label>
                    <textarea name="address" class="form-control" id="address" cols="30" rows="6" placeholder="Type address here"></textarea>
                  </div>
                  <div class="col-4">
                    <label for="gender">{{ __('Giới tính') }}</label>
                    <select name="gender" class="form-control" id="gender">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Nam') }}</option>
                      <option value="2">{{ __('Nữ') }}</option>
                      <option value="3">{{ __('Khác') }}</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label for="religion">{{ __('Tôn giáo') }}</label>
                    <select name="religion" class="form-control" id="religion">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Hồi giáo') }}</option>
                      <option value="2">{{ __('Christian') }}</option>
                      <option value="3">{{ __('Ấn độ giáo') }}</option>
                      <option value="4">{{ __('Phật giáo') }}</option>
                      <option value="5">{{ __('Khác') }}</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label for="marital">{{ __('tình trạng hôn nhân') }}</label>
                    <select name="marital" class="form-control" id="marital">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Đã kết hôn') }}</option>
                      <option value="2">{{ __('Chưa lập gia đình') }}</option>
                      <option value="3">{{ __('Ly dị') }}</option>
                      <option value="4">{{ __('Ở Góa') }}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-6 d-grid">
                    <a href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.index') : route('hr.employee.index') ) }}" class="btn btn-outline-secondary" >
                      <i class="align-middle me-1" data-feather="arrow-left"></i>
                      <span class="ps-1">{{ __('Loại bỏ') }}</span>
                    </a>
                  </div>
                  <div class="col-6 d-grid">
                    <button type="submit" class="btn btn-outline-secondary" >
                      <i class="align-middle me-1" data-feather="plus"></i>
                      <span class="ps-1">{{ __('Tạo mới') }}</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Tổ chức') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12">
                    <label for="department">{{ __('Phòng') }}</label>
                    <select name="department_id" class="form-control" id="department">
                      @forelse ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                      @empty
                        <option value="">{{ __('-- Choose One --') }}</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="designation">{{ __('Chức vụ') }}</label>
                    <select name="designation_id" class="form-control" id="designation">
                      @forelse ($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                      @empty
                        <option value="">{{ __('-- Choose One --') }}</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="employeeId">{{ __('ID nhân viên') }}</label>
                    <div class="input-group">
                      <button type="button" class="btn btn-secondary btn-sm" id="generate">
                        <i class="fas fa-arrows-rotate"></i>
                      </button>
                      <input type="text" name="unique_id" id="employeeId" class="form-control" />
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="lastname">{{ __('Lương cơ bản') }}</label>
                    <input type="number" name="basic" class="form-control" id="basic" step="0.01" required>
                  </div>
                  <div class="col-6">
                    <label for="schedule">{{ __('Lịch làm việc') }}</label>
                    <select name="schedule_id" class="form-control" id="schedule">
                      @forelse ($schedules as $schedule)
                        <option value="{{ $schedule->id }}"> {{ $schedule->title }} </option>
                      @empty
                      <option value="">{{ __('--Choose Schedule--') }}</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="status">Loại hợp đồng</label>
                    <select name="status" class="form-control" id="status">
                      <option value="">{{ __('-- Choose One --') }}</option>
                      <option value="1">{{ __('Nhân viên đang làm') }}</option>
                      <option value="2">{{ __('Nghỉ hưu') }}</option>
                      <option value="3">{{ __('Từ chức') }}</option>
                      <option value="4">{{ __('Kết thúc hợp đồng') }}</option>
                      <option value="5">{{ __('Nghỉ phép') }}</option>
                      <option value="6">{{ __('Hợp đồng hết hạn') }}</option>
                      <option value="7">{{ __('Part-Time') }}</option>
                      <option value="8">{{ __('Full-Time') }}</option>
                      <option value="9">{{ __('Freelancer') }}</option>
                      <option value="10">{{ __('Intern') }}</option>
                      <option value="11">{{ __('Transferred') }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ... Previous content ... -->

          <div class="col-6">
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Phụ cấp') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="house_rent">Tiền thuê nhà</label>
                    <input type="number" name="house_rent" class="form-control" id="rent" step="0.01" value="0" readonly />
                  </div>
                  <div class="col-6">
                    <label for="medical">Sức khỏe</label>
                    <input type="number" name="medical" class="form-control" id="medical" step="0.01" value="" readonly />
                  </div>
                  <div class="col-6">
                    <label for="transport">Di chuyển</label>
                    <input type="number" name="transport" class="form-control" id="transport" step="0.01" value="" readonly />
                  </div>
                  <div class="col-6">
                    <label for="special">Hóa đơn điện thoại</label>
                    <input type="number" name="phone_bill" class="form-control" id="special" step="0.01" value="0" />
                  </div>
                  <div class="col-6">
                    <label for="special">Hóa đơn Internet</label>
                    <input type="number" name="internet_bill" class="form-control" id="special" step="0.01" value="0" />
                  </div>
                  <div class="col-6">
                    <label for="special">Khác</label>
                    <input type="number" name="special" class="form-control" id="special" step="0.01" value="" />
                  </div>
                </div>
                {{-- <label for="overtime_pay">Overtime Pay</label>
                <input type="number" name="overtime_pay" class="form-control" id="overtime_pay" step="0.01" readonly > --}}
              </div>
            </div>
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Các khoản khấu trừ') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="provident_fund">{{ __('Quỹ dự phòng') }}</label>
                    <input type="number" name="provident_fund" class="form-control" id="providentFund" step="0.01" readonly />
                  </div>
                  <div class="col-6">
                    <label for="tax">{{ __('Thuế thu nhập') }}</label>
                    <input type="number" name="income_tax" class="form-control" id="incomeTax" step="0.01" readonly />
                  </div>
                  <div class="col-6">
                    <label for="provident_fund">{{ __('Thuế thu nhập') }}</label>
                    <input type="number" name="health_insurance" class="form-control" id="healthInsrance" step="0.01" readonly />
                  </div>
                  <div class="col-6">
                    <label for="tax">{{ __('Bảo hiểm nhân thọ') }}</label>
                    <input type="number" name="life_insurance" class="form-control" id="lifeInsurance" step="0.01" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title mb-0">{{ __('Ảnh nhân viên') }}</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">    
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light h-100" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-1">
                        <h1 class="h1 mb-0"><i class="align-middle" data-feather="upload-cloud"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>{{ __('Click to upload') }}</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>{{ __('PNG, JPG or JPEG') }}</span><br />
                          <span>{{ __('(MAX. UPLOAD 2MB)') }}</span><br/>
                          <span>{{ __('(MIN. RES. 300X300)') }}</span>
                        </p>
                      </div>
                      <input type="file" name="avatar" class="d-none" id="imageInput" accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col-6">
                    <img id="dummy" src="https://via.placeholder.com/300x300" class="w-100" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </form>
    </div>
  </section>
@endsection

@section('script')
  <script>
    var imgInp = document.getElementById("imageInput");
    var dummy = document.getElementById("dummy");
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        dummy.src = URL.createObjectURL(file)
      }
    }
  </script>
@endsection