<?php

namespace JoffreyC22\FrenchDatetimepicker;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;
use Exception;
use Carbon\Carbon;
use DateTime;
use DateTimeInterface;

class FrenchDateTime extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'french-datetime';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback ?? function ($value) {
            if (! $value instanceof DateTimeInterface) {
                throw new Exception("Datetime field must cast to 'datetime' in Eloquent model.");
            }

            return $value->format('d-m-Y H:i:s');
        });
    }

    /**
     * Indicate that the date field is nullable.
     *
     * @return $this
     */
    public function nullable()
    {
        return $this->withMeta(['nullable' => true]);
    }

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $requestAttribute
     * @param  object  $model
     * @param  string  $attribute
     * @return void
     */
    protected function fillAttributeFromRequest(NovaRequest $request,
                                                $requestAttribute,
                                                $model,
                                                $attribute)
    {
        if ($request->exists($requestAttribute) && $request[$requestAttribute]) {
            $sentData = $request[$requestAttribute];
            if (DateTime::createFromFormat('d-m-Y H:i:s', $sentData) === FALSE) {
              throw new Exception("Le champ datetime doit être un datetime valide.");
            }
            $newDate = Carbon::createFromFormat('d-m-Y H:i:s', $request[$requestAttribute])->format('Y-m-d H:i:s');
            $model->{$attribute} = $newDate;
        }
    }
}
