<?php

namespace App\Livewire;

use App\Models\Guest;
use Illuminate\Database\Query\Builder;

use Illuminate\Support\Facades\DB;

use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;

use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use App\Models\Event;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

final class GuestTable extends PowerGridComponent
{
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
        return DB::table('Guests');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('salutations')
            ->add('name')
            ->add('organization')
            ->add('address')
            ->add('contactNumber')
            ->add('email')
            ->add('guesttype')
            ->add('bringrep')
            ->add('attendance')
            ->add('checkedin')
            ->add('deleted_at')
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Salutations', 'salutations')
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Organization', 'organization')
                ->sortable()
                ->searchable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),

            Column::make('Contact Number', 'contactNumber')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Guest Type', 'guesttype')
                ->sortable()
                ->searchable(),

            Column::make('Bring Representative', 'bringrep')
                ->sortable()
                ->searchable(),

            Column::make('Attendance', 'attendance')
                ->sortable()
                ->searchable(),

            Column::make('Checked In', 'checkedin')
                ->sortable()
                ->searchable(),

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
        $guest = Guest::findOrFail($rowId);
        return redirect()->route('guest.edit', ['id' => $guest->id]);
    }

    #[\Livewire\Attributes\On('QR')]
    public function QR($rowId): Redirector
    {
        $guest = Guest::findOrFail($rowId);
        return redirect()->route('guest.qrcode', ['id' => $guest->id]);
    }

    #[\Livewire\Attributes\On('email')]
    public function email($rowId): Redirector
    {
        $guest = Guest::findOrFail($rowId);
        return redirect()->route('guest.representativeform', ['id' => $guest->id]);
    }


    public function actions($row): array
    {

        return [

            Button::add('edit')
                ->id('edit')
                ->class('fas fa-edit text-secondary')
                ->tooltip('Edit')
                ->dispatch('edit', ['rowId' => $row->id]),

            Button::add('QR')
                ->id('QR')
                ->class('fas fa-qrcode text-secondary')
                ->tooltip('View QR Code')
                ->dispatch('QR', ['rowId' => $row->id]),    

            Button::add('email')
                ->id('email')
                ->class('fas fa-envelope text-secondary')
                ->tooltip('Send Email')
                ->dispatch('email', ['rowId' => $row->id]),  
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
