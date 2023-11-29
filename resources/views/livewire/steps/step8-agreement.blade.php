    <!-- Agreement Information -->
    <div class="mb-4">
        <!-- Certify Agreement -->
        <div class="mb-2">
            <label for="is_certified" class="block text-sm font-medium text-gray-700">Certify Agreement</label>
            <input wire:model="is_certified" type="checkbox" id="is_certified" name="is_certified" class="mt-1">
            @error('is_certified') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Name -->
        <div class="mb-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input wire:model="name" type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Title/Position -->
        <div class="mb-2">
            <label for="title" class="block text-sm font-medium text-gray-700">Title/Position</label>
            <input wire:model="title" type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-md">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>


