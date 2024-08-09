<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Create;

use App\Application\User\Create\CreatePlaceCommand;
use Illuminate\Foundation\Http\FormRequest;

class CreatePlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'password' => 'required',
        ];
    }

    public function toCommand(): CreatePlaceCommand
    {
        return new CreatePlaceCommand(
            ...$this->safe()->all()
        );
    }
}
