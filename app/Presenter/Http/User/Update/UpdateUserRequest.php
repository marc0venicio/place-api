<?php

declare(strict_types=1);

namespace App\Presenter\Http\User\Update;

use App\Application\User\Create\CreatePlaceCommand;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        // dd(request()->id);
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.request()->id,
            'cpf' => 'required|string|max:11|unique:users,cpf,'.request()->id,
            'password' => 'nullable|string|min:8',
        ];
    }

    public function toCommand(): CreatePlaceCommand
    {
        return new CreatePlaceCommand(
            ...$this->safe()->all()
        );
    }
}
