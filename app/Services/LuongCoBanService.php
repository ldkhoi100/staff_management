<?php

namespace App\Services;

interface LuongCoBanService
{
    public function get();

    public function update($request, $id);
}
