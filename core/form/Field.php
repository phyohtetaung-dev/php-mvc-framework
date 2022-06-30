<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_NUMBER = 'number';
    public const TYPE_PASSWORD = 'password';

    public $model;
    public $attribute;
    public $type;

    public function __construct(Model $model, $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;
    }

    public function __toString()
    {
        return sprintf('
            <div class="mb-3 row">
                <label>%s</label>
                <div>
                    <input type="%s" name="%s" value="%s" class="form-control %s">
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>
            </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError('firstname') ? 'is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }
    
    public function passwordField() {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}
