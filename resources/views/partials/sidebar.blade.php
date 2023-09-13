<aside id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">HRMS</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('super.dashboard') : 
        ( Auth::user()->role->slug === 'administrator' ? route('admin.dashboard')  : 
        ( Auth::user()->role->slug === 'moderator' ? route('moderator.dashboard')  : 
        ( Auth::user()->role->slug === 'hr' ? route('hr.dashboard')  : route('payroll.dashboard')))) }}">
          <i class="align-middle" data-feather="sliders"></i>
          <span class="align-middle">{{ __('Trang chủ') }}</span>
        </a>
      </li>
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator'))
        <li class="sidebar-header">{{ __('Quản lí người dùng') }}</li>
      {{-- @endif
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('user.index') : route('admin.users.index') }}">
          <i class="fas fa-user align-middle"></i>
          <span class="align-middle">{{ __('Quản lí người dùng') }}</span>
        </a>
        </li>
      @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin'))
       <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('roles.index') }}">
            <i class="fas fa-user-shield align-middle"></i> <span class="align-middle">{{ __('Cài đặt người dùng') }}</span>
          </a>
        </li> 
      @endif
        
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager'))
        <li class="sidebar-header">{{ __('Quản lý nhân viên') }}</li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('employee.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.employee.index') : route('hr.employee.index') ) }}">
          <i class="fa-solid fa-users-viewfinder"></i>
          <span class="align-middle">{{ __('Quản lý nhân viên') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('department.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.department.index') : route('hr.department.index') ) }}">
          <i class="fa-solid fa-users-gear"></i>
          <span class="align-middle">{{ __('Quản lý các phòng ban') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('designation.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.designation.index') : route('hr.designation.index') ) }}">
          <i class="fa-solid fa-file-lines"></i>
          <span class="align-middle">{{ __('Quản lý chỉ định') }}</span>
        </a>
        </li>
      @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator'))
        <li class="sidebar-header">{{ __('Quản lí chấm công') }}</li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('schedule.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.schedule.index') : route('moderator.schedule.index') ) }}">
          <i class="fa-solid fa-clock"></i>
          <span class="align-middle">{{ __('Lịch') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('attendance.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.attendance.index') : route('moderator.attendance.index') ) }}">
          <i class="fa-solid fa-calendar-days"></i>
          <span class="align-middle">{{ __('Chấm công hàng ngày') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('sheet.report') : (Auth::user()->role->slug === 'administrator' ? route('admin.sheet.report') : route('moderator.sheet.report') ) }}">
          <i class="fa-solid fa-book"></i>
          <span class="align-middle">{{ __('Báo cáo chấm công') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('late.time') }}">
          <i class="fa-solid fa-triangle-exclamation"></i>
          <span class="align-middle">{{ __('Late Time') }}</span>
        </a>
        </li> --}}
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'moderator')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('over.time') }}">
          <i class="fa-solid fa-stopwatch"></i>
          <span class="align-middle">{{ __('Over Time') }}</span>
        </a>
        </li> --}}
      @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager'))
        <li class="sidebar-header">{{ __('Quản lý nghỉ phép') }}</li>  
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('leaves.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.leaves.index') : route('hr.leaves.index') ) }}">
          <i class="fa-solid fa-person-walking-arrow-right"></i>
          <span class="align-middle">{{ __('Quản lý nghỉ phép') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'hr-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('leaves.create') : (Auth::user()->role->slug === 'administrator' ? route('admin.leaves.create') : route('hr.leaves.create') ) }}">
          <i class="fa-solid fa-file-pen"></i>
          <span class="align-middle">{{ __('Đăng kí nghỉ') }}</span>
        </a>
        </li>
      @endif
          
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager'))
        <li class="sidebar-header">{{ __('Hệ thống tính lương') }}</li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ Auth::user()->role->slug === 'super-admin' ? route('payroll.index') : (Auth::user()->role->slug === 'administrator' ? route('admin.payroll.index') : route('manager.payroll.index') ) }}">
          <i class="fa-solid fa-file"></i>
          <span class="align-middle">{{ __('Quản lý tiền lương') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('payroll.create') }}">
          <i class="fa-solid fa-file-export"></i>
          <span class="align-middle">{{ __('Tạo bảng lương') }}</span>
        </a>
        </li>
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('payroll.report') }}">
          <i class="fa-solid fa-file-export"></i>
          <span class="align-middle">{{ __('Bảng lương') }}</span>
        </a>
        </li>
      {{-- @endif
      
      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void(0)">
          
          <i class="fa-solid fa-wallet"></i>
          <span class="align-middle">{{ __('Gross Salary') }}</span>
        </a>
        </li> --}}
      {{-- @endif

      @if (Auth::check() && (Auth::user()->role->slug === 'super-admin' || Auth::user()->role->slug === 'administrator' || Auth::user()->role->slug === 'payroll-manager')) --}}
        {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void(0)">
          <i class="fa-solid fa-clipboard"></i>
          <span class="align-middle">{{ __('Deductions') }}</span>
        </a>
        </li> --}}
      @endif
      
      
      {{-- <li class="sidebar-item">
        <a class="sidebar-link" href="javascript:void(0)">
          <i class="fa-solid fa-file-export"></i>
          <span class="align-middle">{{ __('Generate Payroll') }}</span>
        </a>
      </li> --}}
      
    </ul>
  </div>
</aside>