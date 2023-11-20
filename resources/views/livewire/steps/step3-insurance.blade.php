<div class="row">
                    <div class="col-lg-12 col-sm-12" style="text-align: center;">
                        <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
                        <p style="margin-top: -15px; margin-bottom: 30px;">New Subcontractor Submission</p>
                    </div>
                </div>
                <div class="row">
                    <span class="login100-form-title p-b-53" style="color: #0B1E2C;">
                        Insurance Requirements 
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
                        <p class="btn-face m-b-20" style="width: 100%;background-color: white;font-size: 12px;justify-content: left;">
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
<div class="container mt-4">
    <div class="row">

        <!-- Left Column -->
        <div class="col-md-6">
            <!-- Vehicle Insurance -->
            <div class="mb-4">
                <label for="vehicle_file" class="block text-sm font-medium text-gray-700">Vehicle Insurance File</label>
                <input wire:model="vehicle_file" type="file" id="vehicle_file" name="vehicle_file" class="form-control mt-1">
                @error('vehicle_file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="vehicle_effective_date" class="block text-sm font-medium text-gray-700">Vehicle Insurance Effective Date</label>
                <input wire:model="vehicle_effective_date" type="date" id="vehicle_effective_date" name="vehicle_effective_date" class="form-control mt-1">
                @error('vehicle_effective_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="vehicle_expiration_date" class="block text-sm font-medium text-gray-700">Vehicle Insurance Expiration Date</label>
                <input wire:model="vehicle_expiration_date" type="date" id="vehicle_expiration_date" name="vehicle_expiration_date" class="form-control mt-1">
                @error('vehicle_expiration_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
<hr />
            <!-- Worker Insurance -->
            <div class="mb-4">
                <label for="worker_file" class="block text-sm font-medium text-gray-700">Worker Insurance File</label>
                <input wire:model="worker_file" type="file" id="worker_file" name="worker_file" class="form-control mt-1">
                @error('worker_file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="worker_effective_date" class="block text-sm font-medium text-gray-700">Worker Effective Date</label>
                <input wire:model="worker_effective_date" type="date" id="worker_effective_date" name="worker_effective_date" class="form-control mt-1">
                @error('worker_effective_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="worker_expiry_date" class="block text-sm font-medium text-gray-700">Worker Expiry Date</label>
                <input wire:model="worker_expiry_date" type="date" id="worker_expiry_date" name="worker_expiry_date" class="form-control mt-1">
                @error('worker_expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <hr />
        <!-- Right Column -->
        <div class="col-md-6">
            <!-- General Liability Insurance -->
            <div class="mb-4">
                <label for="general_liability_file" class="block text-sm font-medium text-gray-700">General Liability Insurance File</label>
                <input wire:model="general_liability_file" type="file" id="general_liability_file" name="general_liability_file" class="form-control mt-1">
                @error('general_liability_file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="general_effective_date" class="block text-sm font-medium text-gray-700">General Liability Effective Date</label>
                <input wire:model="general_effective_date" type="date" id="general_effective_date" name="general_effective_date" class="form-control mt-1">
                @error('general_effective_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="general_expiry_date" class="block text-sm font-medium text-gray-700">General Liability Expiry Date</label>
                <input wire:model="general_expiry_date" type="date" id="general_expiry_date" name="general_expiry_date" class="form-control mt-1">
                @error('general_expiry_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>


</div>
