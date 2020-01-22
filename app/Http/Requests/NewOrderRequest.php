<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewOrderRequest extends FormRequest
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
          'amount' => 'required',
          'cart' => 'required|string',
          'customer' => 'required|email',
          'accept_cgu' => 'required',
        ];
    }

    public function messages(){
      return [
        "amount.required" => '',
        "cart.required" => 'Votre panier est vide!',
        "customer.required" => 'Merci de renseigner une adresse email dans votre espace client!',
        "accept_cgu.required" => 'Vous devez accepter les conditions générales de vente.',
      ];
    }
}
