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
                <div class="row" x-data="{ formatPhoneNumber }">
                    <div class="col-lg-12 col-sm-12" style="text-align: center;">
                        <h3 style="color: #101e2b;">Vendor Information</h3>
                        <br>
                    </div>

                    <div class="col-12">

                    </div>

                    <!-- Vendor Name -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="vendor_name">Vendor Name</label>
                            <input type="text" class="form-control" id="vendor_name" wire:model="vendor_name" placeholder="Vendor Name">
                            @error('vendor_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Owner Name -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="owner_name">Owner Name</label>
                            <input type="text" class="form-control" id="owner_name" wire:model="owner_name" placeholder="Owner Name">
                            @error('owner_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Owner Phone -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="owner_phone">Owner Phone</label>
                            <input type="tel" class="form-control" id="owner_phone" wire:model.lazy="owner_phone" x-ref="owner_phone" @blur="formatPhoneNumber($refs.owner_phone)" placeholder="xxx-xxx-xxxx">
                            @error('owner_phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Vendor Type -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="vendor_type">Vendor Type</label>
                            <select class="form-control" id="vendor_type" wire:model="vendor_type">
                                    <option value="Signage Installation" selected>Signage Installation</option>
                                    <option value="Signage Fabrication">Signage Fabrication</option>
                                    <option value="Wallpaper Installation">Wallpaper Installation</option>
                                    <option value="Paint and Restoration">Paint and Restoration</option>
                                    <option value="Solar">Solar</option>
                                    <option value="Landscape">Landscape</option>
                                    <option value="Masonry">Masonry</option>
                                    <option value="Electrical">Electrical</option>
                                    <option value="Plumbing">Plumbing</option>
                                    <option value="Drywall">Drywall</option>
                                    <option value="EIFS">EIFS</option>
                                    <option value="Flooring">Flooring</option>
                                    <option value="Other">Other</option>
                                </select>
                            </select>
                        </div>
                    </div>

                    <!-- Vendor Phone -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="vendor_phone">Vendor Phone</label>
                            <input type="tel" class="form-control" id="vendor_phone" wire:model.lazy="vendor_phone" x-ref="vendorPhone" @blur="formatPhoneNumber($refs.vendorPhone)" placeholder="xxx-xxx-xxxx">
                            @error('vendor_phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Vendor Email -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="vendor_email">Vendor Email</label>
                            <input type="email" class="form-control" id="vendor_email" wire:model="vendor_email" placeholder="Vendor Email">
                            @error('vendor_email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Vendor Fax -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="vendor_fax">Vendor Fax</label>
                            <input type="text" class="form-control" id="vendor_fax" wire:model="vendor_fax" placeholder="Vendor Fax (Optional)">
                        </div>
                    </div>

                    <!-- Vendor Website -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="vendor_website">Vendor Website</label>
                            <input type="text" class="form-control" id="vendor_website" wire:model="vendor_website" placeholder="Vendor Website (Optional)">
                        </div>
                    </div>
                </div>
                <div>

                    @foreach ($contacts as $index => $contact)
                        <?php $countcontact = $index + 1 ?>
                    <h3 style="color: #101e2b;">Additional Contacts Number @numbertowords($countcontact)</h3>
                        <div class="contact-group" x-data="{ formatPhoneNumber }">
                            <input wire:model="contacts.{{$index}}.contact_name" type="text" placeholder="Contact Name" class="contactadditional" id="contact_name" name="contact_name">
                            @error('contact_name') <span class="text-danger">{{ $message }}</span> @enderror
                            <input wire:model="contacts.{{$index}}.contact_email" type="email" placeholder="Contact Email" class="contactadditional" id="contact_email" name="contact_email">
                            @error('contact_email') <span class="text-danger">{{ $message }}</span> @enderror
                            <input wire:model="contacts.{{$index}}.contact_phone" type="text" wire:model.lazy="contact_phone" x-ref="contact_phone" @blur="formatPhoneNumber($refs.contact_phone)" placeholder="xxx-xxx-xxxx" class="contactadditional" id="contact_phone" name="contact_phone">
                            @error('contact_phone') <span class="text-danger">{{ $message }}</span> @enderror
                            <select wire:model="contacts.{{$index}}.contact_position" type="text" placeholder="Contact Position" class="contactadditional" id="contact_position" name="contact_position">
                                <option value="Owner" selected>Owner</option>
                                <option value="Project Manager" selected>Project Manager</option>
                                <option value="Designer">Designer</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Architect">Architect</option>
                                <option value="Superintendent">Superintendent</option>
                                <option value="Estimator">Estimator</option>
                                <option value="Permit Expeditor">Permit Expeditor</option>
                                <option value="Admin">Admin</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Other">OTHER</option>
                            </select>
                            @error('contact_position') <span class="text-danger">{{ $message }}</span> @enderror
                            @if (count($contacts) > 1)
                            <button wire:click.prevent="removeContact({{$index}})" class="btn btn-danger">Remove</button>
                            @endif
                        </div>
                    @endforeach
                    <button wire:click.prevent="addContact" class="btn btn-primary">Add Another Contact</button>
                </div>

               <script>
                    function formatPhoneNumber(input) {

                        let formattedNumber = input.value.replace(/\D/g, '');
                        if (formattedNumber.length == 10) {
                            formattedNumber = formattedNumber.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
                        }
                        input.value = formattedNumber;

                    }
                </script>
