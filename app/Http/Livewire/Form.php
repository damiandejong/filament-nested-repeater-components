<?php

namespace App\Http\Livewire;

use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Form extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function mount()
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Repeater::make('repeater')
                ->defaultItems(2)
                ->schema([
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('first_name'),
                            Forms\Components\TextInput::make('last_name')
                                ->suffixAction(fn ($set) =>
                                    Forms\Components\Actions\Action::make('action')
                                        ->icon('heroicon-s-chevron-left')
                                        ->action(fn () => $set('last_name', 'Bar'))
                                )
                        ])
                ])
        ];
    }

    public function render(): View
    {
        return view('livewire.form');
    }
}
