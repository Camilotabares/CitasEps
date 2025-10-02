<?php

namespace App;

enum AppointmentEnum:int
{
    case SCHEDULED = 1;
    case COMPLETED = 2;
    case CANCELED = 3;
}
