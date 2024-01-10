<div>
    <!-- Step Content -->
    @if($step == 1)
        @include('livewire.steps.step1-vendor')
    @elseif($step == 2)
        @include('livewire.steps.step2-address')
    @elseif($step == 3)
        @include('livewire.steps.step3-insurance')
    @elseif($step == 4)
        @include('livewire.steps.step4-capabilities')
    @elseif($step == 5)
        @include('livewire.steps.step5-equipment')
    @elseif($step == 6)
        @include('livewire.steps.step6-servicefee')
    @elseif($step == 7)
        @include('livewire.steps.step7-w9')
    @elseif($step == 8)
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
        <div class="loading-spinner">
            <!-- Updated Spinner for better visibility -->
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <!-- Inline Styles -->
    <style>
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Slightly darker background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-spinner {
            text-align: center;
        }

        .spinner-border {
            color: #fff; /* Make the spinner white for better visibility */
        }
    </style>
</div>


