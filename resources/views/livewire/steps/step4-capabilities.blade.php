<div class="row">
                    <div class="col-lg-12 col-sm-12" style="text-align: center;">
                        <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
                        <p style="margin-top: -15px; margin-bottom: 30px;">New Subcontractor Submission</p>
                    </div>
                </div>
                <div class="row">
                    <span class="login100-form-title p-b-53" style="color: #0B1E2C;">
                        Vendor Capabilities
                    </span>


                     <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
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
                        <p class="btn-face m-b-20" style="width: 100%;background-color: white;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Vendor Capabilities
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
                            Fee Information
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
<div class="container mt-4">
    <div class="row">

        <!-- Left Column -->
        <div class="col-md-6">

            <!-- Geographic Service Area -->
            <div class="mb-4">
                <label for="geographic_service_area_miles" class="block text-sm font-medium text-gray-700">Geographic Service Area (miles)</label>
                <input wire:model="geographic_service_area_miles" type="text" id="geographic_service_area_miles" name="geographic_service_area_miles" class="mt-1 p-2 w-full border rounded-md">
                @error('geographic_service_area_miles') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="no_mileage_charge_area_miles" class="block text-sm font-medium text-gray-700">Area without Mileage Charges (miles)</label>
                <input wire:model="no_mileage_charge_area_miles" type="text" id="no_mileage_charge_area_miles" name="no_mileage_charge_area_miles" class="mt-1 p-2 w-full border rounded-md">
                @error('no_mileage_charge_area_miles') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Service Response Times -->
            <div class="mb-4">
                <label for="service_response_time_in_service_area" class="block text-sm font-medium text-gray-700">Response Time in Service Area</label>
                <input wire:model="service_response_time_in_service_area" type="text" id="service_response_time_in_service_area" name="service_response_time_in_service_area" class="mt-1 p-2 w-full border rounded-md" placeholder="e.g., 3 hours">
                @error('service_response_time_in_service_area') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="service_response_time_in_no_charge_area" class="block text-sm font-medium text-gray-700">Response Time in No Charge Area</label>
                <input wire:model="service_response_time_in_no_charge_area" type="text" id="service_response_time_in_no_charge_area" name="service_response_time_in_no_charge_area" class="mt-1 p-2 w-full border rounded-md" placeholder="e.g., 1 day">
                @error('service_response_time_in_no_charge_area') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

        </div>

        <!-- Right Column -->
        <div class="col-md-6">

            <!-- Warranty Limits -->
            <div class="mb-4">
                <label for="workmanship_warranty" class="block text-sm font-medium text-gray-700">Workmanship Warranty</label>
                <input wire:model="workmanship_warranty" type="text" id="workmanship_warranty" name="workmanship_warranty" class="mt-1 p-2 w-full border rounded-md" placeholder="e.g., 1 year">
                @error('workmanship_warranty') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="supplies_materials_warranty" class="block text-sm font-medium text-gray-700">Supplies/Materials Warranty</label>
                <input wire:model="supplies_materials_warranty" type="text" id="supplies_materials_warranty" name="supplies_materials_warranty" class="mt-1 p-2 w-full border rounded-md" placeholder="e.g., 6 months">
                @error('supplies_materials_warranty') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Service Markup and Vehicles -->
            <div class="mb-4">
                <label for="standard_markup_percentage" class="block text-sm font-medium text-gray-700">Standard Markup Percentage (%)</label>
                <input wire:model="standard_markup_percentage" type="text" id="standard_markup_percentage" name="standard_markup_percentage" class="mt-1 p-2 w-full border rounded-md">
                @error('standard_markup_percentage') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="vehicles_fully_equipped"class="block text-sm font-medium text-gray-700">Are vehicles fully equipped?</label>
                <input wire:model="vehicles_fully_equipped" type="checkbox" id="vehicles_fully_equipped" name="vehicles_fully_equipped" class="mt-1">
                @error('vehicles_fully_equipped') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Special Notes -->
            <div class="mb-4">
                <label for="special_notes" class="block text-sm font-medium text-gray-700">Special Notes</label>
                <textarea wire:model="special_notes" id="special_notes" name="special_notes" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
                @error('special_notes') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

        </div>
    </div>


</div>
