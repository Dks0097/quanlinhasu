<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [ 'title' => 'Tài chính kế toán', 'status' => 1 ],
            [ 'title' => 'Nhân sự (HR)', 'status' => 1 ],
            [ 'title' => 'Tiếp thị và Bán hàng', 'status' => 1 ],
            [ 'title' => 'Nghiên cứu và Phát triển (R&D)', 'status' => 1 ],
            [ 'title' => 'Hoạt động và chuỗi cung ứng', 'status' => 1 ],
            [ 'title' => 'Công nghệ thông tin (IT)', 'status' => 1 ],
            [ 'title' => 'Công nghệ thông tin (CNTT)', 'status' => 1 ],
            [ 'title' => 'Truyền thông doanh nghiệp', 'status' => 1 ],
            [ 'title' => 'Chiến lược và phát triển kinh doanh', 'status' => 1 ],
            [ 'title' => 'Dịch vụ khách hàng', 'status' => 1 ],
            [ 'title' => 'Môi trường, Sức khỏe và An toàn (EHS)', 'status' => 1 ],
            [ 'title' => 'Đảm bảo chất lượng', 'status' => 1 ],
            [ 'title' => 'Trách nhiệm xã hội của doanh nghiệp (CSR)', 'status' => 1 ],
            [ 'title' => 'Hoạt động quốc tế', 'status' => 1 ],
            [ 'title' => 'Quản lý rủi ro', 'status' => 1 ],
            [ 'title' => 'Quan hệ đối tác chiến lược và liên minh', 'status' => 1 ],
            [ 'title' => 'Học tập và phát triển', 'status' => 1 ],
            [ 'title' => 'Đa dạng và Hòa nhập', 'status' => 1 ],
            [ 'title' => 'Kiểm toán nội bộ', 'status' => 1 ],
            [ 'title' => 'Phân tích dữ liệu và nghiệp vụ thông minh', 'status' => 1 ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
