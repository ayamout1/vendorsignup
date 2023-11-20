<div class="row">
                    <div class="col-lg-12 col-sm-12" style="text-align: center;">
                        <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
                        <p style="margin-top: -15px; margin-bottom: 30px;">New Subcontractor Submission</p>
                    </div>
                </div>
                <div class="row">
                    <span class="login100-form-title p-b-53" style="color: #0B1E2C;">
                       Vendor Information 
                    </span>
                    
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
<div class="row">
    <div class="col-12">
        <h3 style="color: #0064ff;">Vendor Information</h3>
        <br>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="vendor_name">Vendor Name</label>
            <input type="text" class="form-control" id="vendor_name" wire:model="vendor_name" placeholder="Vendor Name" class="@error('vendor_name') is-invalid @enderror">
            @error('vendor_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="owner_name">Owner Name</label>
            <input type="text" class="form-control" id="owner_name" wire:model="owner_name" placeholder="Owner Name" class="@error('owner_name') is-invalid @enderror">
            @error('owner_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="owner_phone">Owner Phone</label>
            <input type="tel" class="form-control" id="owner_phone" wire:model="owner_phone" placeholder="Owner Phone" class=" @error('owner_phone') is-invalid @enderror">
            @error('owner_phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="vendor_type">Vendor Type</label>
            <select class="form-control" id="vendor_type" wire:model="vendor_type">
                <option value="SignageInstallation">Signage Installation</option>
                <option value="SignageFabrication">Signage Fabrication</option>
                <option value="WallpaperInstallation">Wallpaper Installation</option>
                <option value="PaintandRestoration">Paint and Restoration</option>
                <option value="Solar">Solar</option>
                <option value="Electrical">Electrical</option>
                <option value="Plumbing">Plumbing</option>
                <option value="Drywall">Drywall</option>
                <option value="EIFS">EIFS</option>
                <option value="Flooring">Flooring</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="vendor_phone">Vendor Phone</label>
            <input type="text" class="form-control" id="vendor_phone" wire:model="vendor_phone" placeholder="Vendor Phone" class="@error('vendor_phone') is-invalid @enderror">
            @error('vendor_phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror

        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="vendor_email">Vendor Email</label>
        <input type="email" class="form-control" id="vendor_email" wire:model="vendor_email" placeholder="Vendor Email"  class="@error('vendor_email') is-invalid @enderror">
         
            @error('vendor_email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
   
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="vendor_fax">Vendor Fax</label>
            <input type="text" class="form-control" id="vendor_fax" wire:model="vendor_fax" placeholder="Vendor Fax (Optional)">
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            <label for="vendor_website">Vendor Website</label>
            <input type="text" class="form-control" id="vendor_website" wire:model="vendor_website" placeholder="Vendor Website (Optional)">
        </div>
    </div>
</div>
