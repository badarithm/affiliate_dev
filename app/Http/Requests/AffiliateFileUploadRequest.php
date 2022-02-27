<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AffiliateFileUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'affiliate_file' => 'required|file|max:1000000',
        ];
    }

    public function getAffiliateFile(): UploadedFile
    {
        return $this->file('affiliate_file');
    }
}
