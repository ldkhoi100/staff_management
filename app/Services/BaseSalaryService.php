<?php

namespace App\Services;

interface BaseSalaryService
{
    public function get();

    public function update($request);
}
