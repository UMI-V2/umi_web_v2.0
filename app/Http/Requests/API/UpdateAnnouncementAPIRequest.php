<?php

namespace App\Http\Requests\API;

use App\Models\Announcement;
use InfyOm\Generator\Request\APIRequest;

class UpdateAnnouncementAPIRequest extends APIRequest
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
        $rules = Announcement::$rules;
        
        return $rules;
    }
}
