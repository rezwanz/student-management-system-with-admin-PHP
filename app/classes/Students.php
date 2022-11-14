<?php


namespace App\classes;


class Students
{
    public $students = [];

    public function index()
    {
        $this->students = [
            0 => [
                'first_name' => 'Md. Rejwan',
                'last_name' => 'Mahmud',
                'email' => 'rejwan@admin.com',
                'mobile' => '12345',
                'address' => 'Narayanganj'
            ],
            1 => [
                'first_name' => 'Fayyaz',
                'last_name' => 'Shan-naf',
                'email' => 'fayyaz@admin.com',
                'mobile' => '12345',
                'address' => 'Narayanganj'
            ],
            2 => [
                'first_name' => 'Mahmudul',
                'last_name' => 'Shabbir',
                'email' => 'sabbir@admin.com',
                'mobile' => '12345',
                'address' => 'Narayanganj'
            ],
        ];
        return $this->students;
    }
}