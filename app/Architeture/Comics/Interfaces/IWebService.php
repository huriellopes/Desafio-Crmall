<?php

namespace App\Architeture\Comics\Interfaces;

use stdClass;

interface IWebService
{
    public function Consult(?int $comicID);
}
