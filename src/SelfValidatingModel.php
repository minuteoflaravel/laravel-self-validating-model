<?php

namespace MinuteOfLaravel\Validation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class SelfValidatingModel extends Model {
    public $rules = [];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            Validator::make($model->toArray(), $model->rules)->validate();
        });
    }
}