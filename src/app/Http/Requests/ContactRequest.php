<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'first_tel' => ['required', 'max:5', 'regex:/^[0-9]+$/'],
            'second_tel' => ['required', 'max:5', 'regex:/^[0-9]+$/'],
            'third_tel' => ['required', 'max:5', 'regex:/^[0-9]+$/'],
            'address' => ['required', 'string'],
            'category_id' => ['required'],
            'detail' => ['required', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'first_tel.required' => '電話番号を入力してください',
            'second_tel.required' => '電話番号を入力してください',
            'third_tel.required' => '電話番号を入力してください',
            'first_tel.max' => '電話番号は5桁までの数字で入力してください',
            'second_tel.max' => '電話番号は5桁までの数字で入力してください',
            'third_tel.max' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}