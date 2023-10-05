<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $designations = [
            [ 'title' => 'Giám đốc điều hành (CEO)', 'status' => 1 ],
           
            [ 'title' => 'Giám đốc Thông tin (CIO)', 'status' => 1 ],
            [ 'title' => 'Phó chủ tịch', 'status' => 1 ],
            [ 'title' => 'Giám đốc', 'status' => 1 ],
            [ 'title' => 'Quản lý dự án cấp cao', 'status' => 1 ],
            [ 'title' => 'Kỹ sư phần mềm cao cấp', 'status' => 1 ],
            [ 'title' => 'Chuyên viên phân tích tài chính cao cấp', 'status' => 1 ],
            [ 'title' => 'Chuyên gia hỗ trợ CNTT', 'status' => 1 ],
            [ 'title' => 'Chuyên gia nhân sự tổng quát', 'status' => 1 ],
            [ 'title' => 'Giám đốc điều hành', 'status' => 1 ],
            [ 'title' => 'Giám đốc sản phẩm', 'status' => 1 ],
            [ 'title' => 'Kỹ sư phần mềm', 'status' => 1 ],
            [ 'title' => 'Người lập kế hoạch tài chính', 'status' => 1 ],
            [ 'title' => 'Chuyên viên phân tích dữ liệu', 'status' => 1 ],
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
