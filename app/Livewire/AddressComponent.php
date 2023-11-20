<?php
namespace App\Http\Livewire;

use Livewire\Component;

class AddressComponent extends Component
{
    public $addresses = [
        [
            'address' => '',
            'address2' => '',
            'city' => '',
            'state' => '',
            'postal' => '',
            'country' => '',
            'address_type' => '',
        ]
    ];

    public function render()
    {
        return view('livewire.step1-address');
    }

    public function addAddress()
    {
        $this->addresses[] = [
            'address' => '',
            'address2' => '',
            'city' => '',
            'state' => '',
            'postal' => '',
            'country' => '',
            'address_type' => '',
        ];
    }

    public function removeAddress($index)
    {
        unset($this->addresses[$index]);
        $this->addresses = array_values($this->addresses); // Re-index array keys
    }
}
