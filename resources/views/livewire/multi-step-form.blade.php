<div>
    <!-- Step Content -->
    @if($step === 1)
        @include('livewire.steps.step1-vendor')
    @elseif($step === 2)
        @include('livewire.steps.step2-address')
    @elseif($step === 3)
        @include('livewire.steps.step3-insurance')
    @elseif($step === 4)
        @include('livewire.steps.step4-capabilities')
    @elseif($step === 5)
        @include('livewire.steps.step5-equipment')
    @elseif($step === 6)
        @include('livewire.steps.step6-servicefee')
    @elseif($step === 7)
        @include('livewire.steps.step7-w9')
    @elseif($step === 8)
        @include('livewire.steps.step8-agreement')
    @endif

    <!-- Navigation Buttons -->
    <div class="mt-4 flex justify-between">
        @if($step > 1)
            <button wire:click="previousStep" class="btn btn-secondary">Previous</button>
        @endif

        @if($step < 8)
            <button wire:click="nextStep" class="btn btn-primary">Next</button>
        @endif

        @if($step == 8)
            <button wire:click="submitForm" wire:loading.attr="disabled" class="btn btn-success mx-2">Submit</button>
        @endif
    </div>

    <div>You are on Step: {{ $step }}/8</div>

    <!-- Loading Overlay (controlled by wire:loading) -->
    <div wire:loading.flex wire:target="submitForm" class="loading-overlay" style="display:none;">

    </div>
