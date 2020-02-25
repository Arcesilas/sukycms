<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    public function getAttribute($key)
    {
        if ($this->hasCast($key)) {
            if ($this->getCastType($key) === 'date') {
                try {
                    $value = $this->getAttributeValue($key);

                    if (! $value) {
                        return $value;
                    }

                    return (new Carbon($value))->format(option('date_format'));
                } catch (\Exception $e) {
                }
            }

            if ($this->getCastType($key) === 'datetime') {
                try {
                    $value = $this->getAttributeValue($key);

                    if (! $value) {
                        return $value;
                    }

                    return (new Carbon($value))->format(option('date_format'));
                } catch (\Exception $e) {
                }
            }
        }

        return parent::getAttribute($key);
    }
}
