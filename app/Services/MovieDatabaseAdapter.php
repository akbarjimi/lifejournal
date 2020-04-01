<?php

namespace App\Services;

interface MovieDatabaseAdapter
{    
    public function getById(string $id);

    public function getByTitle(string $title, string $type = null);
}