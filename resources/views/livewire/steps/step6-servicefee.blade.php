<div class="col-lg-12 col-sm-12" style="text-align: center;">
    <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
    <p style="margin-top: -15px; margin-bottom: 30px;">New Subcontractor Submission</p>
</div>
                <div class="row">


                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" style="width: 100%;background-color: white;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Vendor Information
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                           Address Information
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Insurance Requirements & Certificates of Insurance
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Vendor Capabilities
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Fee Information
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Equipment Information
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            W9 Form Submission
                        </p>
                    </div>
                                        <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>

                            Sign And Submit
                        </p>
                    </div>
                </div>

    <!-- Service Fee Information -->
    <div class="mb-4 grid grid-cols-2 gap-4">
        <!-- Concrete (per yard) -->
        <div>
            <label for="concrete_per_yard" class="block text-sm font-medium text-gray-700">Concrete (per yard)</label>
            <input wire:model="concrete_per_yard" type="number" step="0.01" id="concrete_per_yard" name="concrete_per_yard" class="mt-1 p-2 w-full border rounded-md">
            @error('concrete_per_yard') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Rebar -->
        <div>
            <label for="rebar" class="block text-sm font-medium text-gray-700">Rebar</label>
            <input wire:model="rebar" type="number" step="0.01" id="rebar" name="rebar" class="mt-1 p-2 w-full border rounded-md">
            @error('rebar') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Survey -->
        <div>
            <label for="survey" class="block text-sm font-medium text-gray-700">Survey</label>
            <input wire:model="survey" type="number" step="0.01" id="survey" name="survey" class="mt-1 p-2 w-full border rounded-md">
            @error('survey') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Permit Staff (per hour) -->
        <div>
            <label for="permit_staff_per_hour" class="block text-sm font-medium text-gray-700">Permit Staff (per hour)</label>
            <input wire:model="permit_staff_per_hour" type="number" step="0.01" id="permit_staff_per_hour" name="permit_staff_per_hour" class="mt-1 p-2 w-full border rounded-md">
            @error('permit_staff_per_hour') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Neon (per unit - general) -->
        <div>
            <label for="neon_per_unit_general" class="block text-sm font-medium text-gray-700">Neon (per unit - general)</label>
            <input wire:model="neon_per_unit_general" type="number" step="0.01" id="neon_per_unit_general" name="neon_per_unit_general" class="mt-1 p-2 w-full border rounded-md">
            @error('neon_per_unit_general') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Backhoe (minimum) -->
        <div>
            <label for="backhoe_minimum" class="block text-sm font-medium text-gray-700">Backhoe (minimum)</label>
            <input wire:model="backhoe_minimum" type="number" step="0.01" id="backhoe_minimum" name="backhoe_minimum" class="mt-1 p-2 w-full border rounded-md">
            @error('backhoe_minimum') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Auger (minimum) -->
        <div>
            <label for="auger_minimum" class="block text-sm font-medium text-gray-700">Auger (minimum)</label>
            <input wire:model="auger_minimum" type="number" step="0.01" id="auger_minimum" name="auger_minimum" class="mt-1 p-2 w-full border rounded-md">
            @error('auger_minimum') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Industrial Crane (minimum) -->
        <div>
            <label for="industrial_crane_minimum" class="block text-sm font-medium text-gray-700">Industrial Crane (minimum)</label>
            <input wire:model="industrial_crane_minimum" type="number" step="0.01" id="industrial_crane_minimum" name="industrial_crane_minimum" class="mt-1 p-2 w-full border rounded-md">
            @error('industrial_crane_minimum') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- High Risk Staging -->
        <div>
            <label for="high_risk_staging" class="block text-sm font-medium text-gray-700">High Risk Staging</label>
            <input wire:model="high_risk_staging" type="number" step="0.01" id="high_risk_staging" name="high_risk_staging" class="mt-1 p-2 w-full border rounded-md">
            @error('high_risk_staging') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Truck 1 Technician (per hour) -->
        <div>
            <label for="truck_1_technician_per_hour" class="block text-sm font-medium text-gray-700">Truck 1 Technician (per hour)</label>
            <input wire:model="truck_1_technician_per_hour" type="number" step="0.01" id="truck_1_technician_per_hour" name="truck_1_technician_per_hour" class="mt-1 p-2 w-full border rounded-md">
            @error('truck_1_technician_per_hour') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Truck 2 Technician (per hour) -->
        <div>
            <label for="truck_2_technician_per_hour" class="block text-sm font-medium text-gray-700">Truck 2 Technician (per hour)</label>
            <input wire:model="truck_2_technician_per_hour" type="number" step="0.01" id="truck_2_technician_per_hour" name="truck_2_technician_per_hour" class="mt-1 p-2 w-full border rounded-md">
            @error('truck_2_technician_per_hour') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>

