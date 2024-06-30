<?php

namespace App\Livewire;

use App\Models\GuestCategory;
//use Illuminate\Database\Eloquent\Builder; //if want to join using eloquent builder
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Illuminate\Routing\Redirector;

final class CategoryTable extends PowerGridComponent
{
    public string  $eventid;
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('guest_categories as gc')
            ->where('event_id', '=', $this->eventid);

        //if want to join table using eloquent table
        // return GuestCategory::query()
        //     ->where('event_id', '=', $this->eventid)
        //     ->join('events as e', function ($event) {
        //         $event->on('guest_categories.event_id', '=', 'e.id');
        //     })
        //     ->select('guest_categories.*', 'e.name as eventname');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            // ->add('eventname', fn ($guest_categories) => e($guest_categories->event->name)) //if want to join table using eloquent table
            ->add('event_id')
            ->add('deleted_at')
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->hidden(),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),
            // Column::make('Event', 'eventname', 'e.name')//if want to join table using eloquent table
            //     ->searchable()
            //     ->sortable(),
            // Column::make('Event id', 'event_id'),
            // Column::make('Deleted at', 'deleted_at_formatted', 'deleted_at')
            //     ->sortable(),

            Column::action('Action'),

        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): Redirector
    {
        return redirect(route('guestcategory.edit', $rowId));
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->id('edit')
                ->class('fas fa-edit text-secondary')
                ->tooltip('Edit Guest Category')
                ->dispatch('edit', ['rowId' => $row->id]),

        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
