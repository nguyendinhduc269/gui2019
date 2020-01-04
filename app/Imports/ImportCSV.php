<?php

namespace App\Imports;

use App\Information;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\Importable;
use Carbon\Carbon; 

class ImportCSV implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        return new Information([

            'location_infor'         => $row[0],
            'date'                  => Carbon::parse($row[1]),
            'company_name'          => $row[2],     
            'infor'                 => $row[3],
            'written_test'          => $row[4],
            'written_test_content'  => $row[5],
            'interview'             => $row[6],
            'industry'              => $row[7],
            'country'               => $row[8],
            'recruited_occupation'  => $row[9],
            'qualification'         => $row[10],
            'age_limit'             => $row[11],
            'grade'                 => $row[12],
            'graduate'              => $row[13],
            'condidate'             => $row[14],
            'job_vote'              => $row[15],
            'part_time_job'         => $row[16],
            'intership'             => $row[17],
            'url'                   => $row[19],
            'logo'                  => '',

            // 'company_name'          => $row['company_name'],
            // 'locationInfo'          => $row['locationInfo'],
            // 'date'                  => $row['date'],
            // 'info'                  => $row['info'],
            // 'recruited_occupation'  => $row['recruited_occupation'],
            // 'written_test'          => $row['written_test'],
            // 'written_test_content'  => $row['written_test_content'],
            // 'interview'             => $row['interview'],
            // 'industry'              => $row['industry'],
            // 'qualification'         => $row['qualification'],
            // 'country'               => $row['country'],
            // 'age_limit'             => $row['age_limit'],
            // 'grade'                 => $row['grade'],
            // 'graduate'              => $row['graduate'],
            // 'part_time_job'         => $row['part_time_job'],
            // 'intership'             => $row['intership'],
            // 'condidate'             => $row['condidate'],
            // 'url'                   => $row['url'],
        ]);
    }
    // public function headingRow(): int
    // {
    //     return 3;
    // }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'SHIFT_JIS'
        ];
    }
    public function rules(): array
    {
        return [
            'company_name'  =>  'required',
            'locationInfo'  =>  'required',
            'date'          =>  'required'
        ];
    }

}
