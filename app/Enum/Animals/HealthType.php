<?php

namespace App\Enum\Users;

use App\Enum\Enum;

final class HealthType extends Enum
{
    public const TREATMENT = 'treatment';

    public const VACCINE = 'vaccine';

    public const OPERATION = 'operation';

    public const REVIEW = 'review';

    public const APPOINTMENT = 'appointment';

    public const TEST = 'test';

    public const DISEASE = 'disease';
}
