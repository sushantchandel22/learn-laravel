<?php

namespace App\Livewire;
use Carbon\Carbon;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
                Column::make("Created at", "created_at")
                ->sortable()
                ->format(function($value, $row) {
                    return Carbon::parse($value)->diffForHumans();
                }),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
