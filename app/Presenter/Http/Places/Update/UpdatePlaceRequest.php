<?php

declare(strict_types=1);

namespace App\Presenter\Http\Places\Update;

use App\Application\place\Create\CreatePlaceCommand;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePlaceRequest extends FormRequest
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
           'name' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|max:255|unique:places,slug,' . request()->id,
            'city' => 'sometimes|required|string|max:255',
            'state' => 'sometimes|required|string|max:255',
        ];
    }

    public function toCommand(): CreatePlaceCommand
    {
        return new CreatePlaceCommand(
            ...$this->safe()->all()
        );
    }
}
