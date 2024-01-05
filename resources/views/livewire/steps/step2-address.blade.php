<div class="row">
                    <div class="col-lg-12 col-sm-12" style="text-align: center;">
                        <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
                        <p style="margin-top: -15px; margin-bottom: 30px;">New Subcontractor Submission</p>
                    </div>
                </div>
                <div class="row">
                    <span class="login100-form-title p-b-53" style="color: #0B1E2C;">
                        Address Information
                    </span>


                     <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Vendor Information
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" style="width: 100%;background-color: white;font-size: 12px;justify-content: left;">
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
                <div class="container">
                    @foreach ($addresses as $index => $address)
                    <?php $countcontact = $index + 1 ?>
                        <div class="mb-4">
                            <h3 class="text-lg font-bold">Address Number  @numbertowords($countcontact)</h3>

                            <div class="row">
                                <!-- Address Line 1 -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="address_{{ $index }}">Address</label>
                                        <input wire:model="addresses.{{ $index }}.address" type="text" id="address_{{ $index }}" class="form-control @error('addresses.'.$index.'.address') is-invalid @enderror" placeholder="Address">
                                        @error('addresses.'.$index.'.address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address Line 2 -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="address2_{{ $index }}">Address Line 2</label>
                                        <input wire:model="addresses.{{ $index }}.address2" type="text" id="address2_{{ $index }}" class="form-control @error('addresses.'.$index.'.address2') is-invalid @enderror" placeholder="Address Line 2 (Optional)">
                                        @error('addresses.'.$index.'.address2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="city_{{ $index }}">City</label>
                                        <input wire:model="addresses.{{ $index }}.city" type="text" id="city_{{ $index }}" class="form-control @error('addresses.'.$index.'.city') is-invalid @enderror" placeholder="City">
                                        @error('addresses.'.$index.'.city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- State -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="state_{{ $index }}">State</label>
                                        <input wire:model="addresses.{{ $index }}.state" type="text" id="state_{{ $index }}" class="form-control @error('addresses.'.$index.'.state') is-invalid @enderror" placeholder="State">
                                        @error('addresses.'.$index.'.state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Postal Code -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="postal_{{ $index }}">Postal Code</label>
                                        <input wire:model="addresses.{{ $index }}.postal" type="text" id="postal_{{ $index }}" class="form-control @error('addresses.'.$index.'.postal') is-invalid @enderror" placeholder="Postal Code">
                                        @error('addresses.'.$index.'.postal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="country_{{ $index }}">Country</label>
                                        <input wire:model="addresses.{{ $index }}.country" type="text" id="country_{{ $index }}" class="form-control @error('addresses.'.$index.'.country') is-invalid @enderror" placeholder="Country">
                                        @error('addresses.'.$index.'.country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address Type -->
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="address_type_{{ $index }}">Address Type</label>
                                        <select wire:model="addresses.{{ $index }}.address_type" id="address_type_{{ $index }}" class="form-control @error('addresses.'.$index.'.address_type') is-invalid @enderror">
                                            <option value="billing">Billing</option>
                                            <option value="shipping">Shipping</option>
                                            <!-- ... add more types as needed -->
                                        </select>
                                        @error('addresses.'.$index.'.address_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Remove Address Button -->
                            @if (count($addresses) > 1)
                                <button wire:click="removeAddress({{ $index }})" class="btn btn-danger mt-2">Remove Address</button>
                            @endif
                        </div>
                    @endforeach

                    <button wire:click="addAddress" class="btn btn-primary mt-2">Add Another Address</button>
                </div>
