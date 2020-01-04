<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadCSV extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fileCSV' => 'required|file|max:5120|mimes:xls,xlsx,csv',
        ];
    }
    //

    public function messages(){

        return[
            'fileCSV.required' => 'ファイルを選択してください',
            'fileCSV.file' => 'ファイルを選択してください',
            'fileCSV.max' => '５Mb以下のファイルを選択してください',
            'fileCSV.mimes' => 'CSVのファイルを選択してください',
        ];

    }
}
