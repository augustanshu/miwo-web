<?php

namespace App\Http\Requests\Goods;

use App\Http\Requests\Request;
use Gate;

class GoodsClassAdminRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		$goodsclass=$this->route('goodsclass');
		 // Determine if the user is authorized to access page module,
        if (is_null($goodsclass)) {
            return $request->user()->canDo('page.page.view');
        }

        // Determine if the user is authorized to create an entry,
        if ($request->isMethod('POST') || $request->is('*/create')) {
            return Gate::allows('create', $goodsclass);
        }

        // Determine if the user is authorized to update an entry,
        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/edit')) {
            return Gate::allows('update', $goodsclass);
        }

        // Determine if the user is authorized to delete an entry,
        if ($request->isMethod('DELETE')) {
            return Gate::allows('delete', $goodsclass);
        }

        // Determine if the user is authorized to view the module.
        return Gate::allows('view', $goodsclass);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // validation rule for create request.
        if ($request->isMethod('POST')) {
            return [
                'name'    => 'required',
                
            ];
        }

        // Validation rule for update request.
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            return [
                'name' => 'required',
            ];
        }

        // Default validation rule.
        return [

        ];
    }
}
