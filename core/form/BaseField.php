<?php

namespace app\core\form;

use app\core\Model;

abstract class BaseField
{
    public $model;
    public $attribute;

    public function __construct(Model $model, $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf('
            <div class="mb-3 row">
                <label>%s</label>
                <div>
                    %s
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>
            </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}
