<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel as FilamentPanel;
use Filament\Tables\Columns\Layout\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User implements FilamentUser
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function canAccessPanel(FilamentPanel $panel): bool
    {
        return true;
    }
}
