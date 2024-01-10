    <!-- Agreement Information -->
<div class="mb-4">
        <!-- Certify Agreement -->
    <div class="section scrollable-section">

        <div class="section">
            <div class="col-lg-12 col-sm-12" style="text-align: center;">
                <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
                <p style="margin-top: -15px; margin-bottom: 30px; text-align: center;">Vendor Agreement</p>
            </div>
            <p>TYSGlobal has certain secret, confidential information relating to sign construction, manufacturing processes and techniques to be disclosed to: <b>{{ $vendor_name }}</b>. For the purpose of your study preliminary to your decision as to whether or not you will provide a proposal to fabricate product and/or provide service to TYSGlobal. TYSGlobal consequently requests that from the date of disclosure to you by TYSGlobal, any information be kept secret and confidential by <b>{{ $vendor_name }}</b> and its employees and not be disclosed to others or used for any purpose other than that set forth in the Agreement without TYSGlobal's prior written consent. It is understood that the above commient to secrecy, confidentiality and non-use shall not extend to any matter:</p>
         <br />
            <div>
            <p>    Already in <b>{{ $vendor_name }}'s</b> possession prior to disclosure by TYSGlobal, or which is now or hereafter generally available to the public on a non-confidential basis through no act on the part of <b>{{ $vendor_name }}</b>, or
                Which is disclosed to <b>{{ $vendor_name }}</b> by a third party having no obligation to TYSGlobal to refrain from so doing, which you have called to TYSGlobal 's attention, in writing, or that you have such knowledge
                Vendors shall not contact, pursue, or promote direct work with any of our clients. Vendors shall notify us if our client has reached out.
            </p>
            </div>
              <p>It is understood that no license, either expressed or implied, is hereby granted by TYSGlobal under any of this information disclosed pursuant to this Agreement.</p>

        </div>

        <div class="section">
            <br />
            <h2>HOLD HARMLESS AGREEMENT</h2>
            <br />
            <p>
                Whereas, <b>{{ $vendor_name }}</b>  (hereinafter "Your Company"), agrees that as an independent contractor who installs, services and maintains signs manufactured, sold and/or leased by TYS Global. Your company will: Indemnify and hold harmless TYS Global for any claims, including attorney's fees, incurred, demands or expenses because of bodily injury, personal injury, emotional distress, wrongful death, property damage, loss of use of property, or other related expenses arising out of or in any way performed by Your Company for TYS Global except those claims due to the sole negligence or willful misconduct of TYS Global. Maintain in force at all relevant times worker's compensation (or employee accident insurance if allowed by your state in place of worker's compensation insurance) and employer's liability insurance covering all of Your Company's employees, agents, officers and directors who work on, install or maintain TYS Global signs and furnish to TYS Global insurance certificates as proof of insurance. This agreement shall be effective immediately upon execution.
            </p>
            <br />
            <h2>SAFETY AGREEMENT</h2>
            <br />
            <p>
                As an installation subcontractor for TYS Global, you are required to maintain an ongoing safety program. This agreement is for the minimum safety requirements as required by TYS Global. You are completely responsible for safety on site. Prior to beginning any TYS Global project, all contractors will hold a safety meeting between management and the workers assigned. The agenda will address all OSHA requirements for workplace safety. Sign Installers & Contractors should especially give emphasis to the following requirements (The scope of your work will vary, items pertain where applicable):
            </p>
            <br />
            <div>
               <p> Any hydraulic equipment shall be checked daily for hydraulic leaks, defective valves and bent cylinder tubes. Any items noted shall be repaired prior to use. All outriggers will be inspected for proper function and will be deployed prior to beginning any lift.
                All lifting cables, slings, chokers and webs shall be inspected for broken strands, kinks, corrosion and loose bindings prior to use. Sheaves, blocks and pulleys will be inspected for worn shafts, hooks and cracked or chipped sheave grooves. Any item displaying one of these characteristics will be discarded. All hooks will require a functional safety latch.
                All tools, cords and ladders must be in good repair. Broken housing, frayed cords, broken insulation or unsafe ladders are not allowed on the job-site at any time.
                Safety harnesses and lines will be inspected for defects prior to use and replaced if found defective. These devices must be worn and properly rigged prior to beginning any personnel lifts or work above six (6) feet.
                All staging will be set up, tied off and inspected by a qualified staging rigger prior to beginning any lifts.
                Proper eye protection will be worn as necessary at all times. The type of protection is dictated by the work being performed (i.e. Welding glasses or hoods when welding or clear shields when grinding, etc.)
                Public access areas underneath overhead work areas will be cordoned off, safety netting will be installed overhead and site access limited to those necessary for execution of the work. Hard hats are required whenever the local ordinances warrant or whenever there is work being performed overhead.
                Safety steel toe shoes are required on any job-site. Open toe shoes, sandals or canvas type shoes are not allowed while on the job-site at any time.
                Proper attire shall be worn at all times. No loose, torn or oversized clothing is allowed at the job-site. No short pants, sleeveless shirts or tank tops are allowed on the job-site.
               Any personnel or visitors to the site will be given thorough safety instructions prior to admission to the site. OSHA guidelines will be your primary requirement. Additionally, there may be safety requirements instituted by our mutual customer.
            </p>
            </div>
            <br />
              <p>If at any time the requirements of TYSGlobal, the customer or OSHA are not consistent, the most stringent requirement will prevail. Safety for your workers, as well as the general public, is the most important aspect of the work. All requirements must be adhered to without exception. Filled in data below includes acceptance of all forms required by TYSGlobal including Confidentiality Agreement, Hold Harmless Agreement, Safety Agreement, terms and conditions herein.</p>

        </div>
    </div>

        <div class="mb-2">
            <label for="is_certified" class="block text-sm font-medium text-gray-700">Certify Agreement</label>
            <input wire:model="is_certified" type="checkbox" id="is_certified" name="is_certified" class="mt-1" checked>
            @error('is_certified') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Name -->
        <div class="mb-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input wire:model="name" type="text" id="name" name="name" autocomplete="name" class="mt-1 p-2 w-full border rounded-md">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Title/Position -->
        <div class="mb-2">
            <label for="title" class="block text-sm font-medium text-gray-700">Title/Position</label>
            <input wire:model="title" type="text" id="title" name="title" autocomplete="title" class="mt-1 p-2 w-full border rounded-md">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>


