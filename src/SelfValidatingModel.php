<?php

namespace MinuteOfLaravel\Validation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class SelfValidatingModel extends Model {
    public $rules = [];

    public static function bootSelfValidatingModel()
    {
        static::saving(function ($model) {
            Validator::make($model->toArray(), $this->selfValidateRules())->validate();
        });
    }

    public function selfValidateRules(): array
    {
        return $this->rules;
    }
}