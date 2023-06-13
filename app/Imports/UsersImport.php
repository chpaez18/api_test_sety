<?php

namespace App\Imports;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        return User::updateOrCreate(
            [
                'email' => $row['email']
            ],
            [
                'name' => $row['name'],
                'age' => $row['age']
            ]
        );
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required|max:255|string',
            'age' => 'required|integer'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'email.email' => 'The email field must be a valid email',
            'name.required' => 'The name field is required',
            'age.integer' => 'The age field must be a integer',
        ];
    }

}