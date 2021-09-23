<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithUpserts, WithBatchInserts, WithChunkReading, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures, RemembersRowNumber;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        $currentRowNumber = $this->getRowNumber();
        $created_at = Carbon::create($row['joined_year'],$row['joined_month'],$row['joined_day'],$row['joined_hour'],$row['joined_minute'],$row['joined_second']);
        $role_id = match($row['usertype']){
            'admin' => 1,
            'editor' => 2,
            'user' => 3,
        };
        $name = (empty($row['name_honourific']) ? "" : $row['name_honourific']) . (empty($row['name_given']) ? "" : $row['name_given']);
        return new User([
            'old_id' => $row['userid'],
            'username' => $row['username'],
            'username' => $row['username'],
            'email' => $row['email'],
            'name' => $name,
            'last_name' => $row['name_family'],
            'organization' => $row['org'],
            'country' => $row['country'],
            'website' => $row['url'],
            'password' => Hash::make('prueba'),
            'role_id' => $role_id,
            'lang' => 1,
            'created_at' => $created_at,
            'updated_at' => now()
        ]);
    }
    public function rules(): array
    {
        return [
            'name_family' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email:dns'
            ]
        ];
    }
    public function uniqueBy()
    {
        return ['email','username'];
    }
    public function batchSize(): int
    {
        return 100;
    }
    public function chunkSize(): int
    {
        return 100;
    }
}
