 @php
     $months = [
         'January',
         'February',
         'March',
         'April',
         'May',
         'June',
         'July',
         'August',
         'September',
         'October',
         'November',
         'December',
     ];
 @endphp


 <div class="row g-3">
     <!-- First Name -->
     <div class="col-md-6">
         <label class="form-label">First Name</label>
         <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
             value="{{ old('first_name', optional($member)->first_name) }}">
         @error('first_name')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Surname -->
     <div class="col-md-6">
         <label class="form-label">Surname</label>
         <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror"
             value="{{ old('surname', optional($member)->surname) }}">
         @error('surname')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Phone -->
     <div class="col-md-6">
         <label class="form-label">Phone</label>
         <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
             value="{{ old('phone', optional($member)->phone) }}">
         @error('phone')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Email -->
     <div class="col-md-6">
         <label class="form-label">Email</label>
         <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
             value="{{ old('email', optional($member)->email) }}">
         @error('email')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Home Address -->
     <div class="col-md-12">
         <label class="form-label">Home Address</label>
         <input type="text" name="home_address" class="form-control @error('home_address') is-invalid @enderror"
             value="{{ old('home_address', optional($member)->home_address) }}">
         @error('home_address')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Profession / Business -->
     <div class="col-md-8">
         <label class="form-label">Profession / Business</label>
         <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror"
             value="{{ old('profession', optional($member)->profession) }}">
         @error('profession')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Class -->
     <div class="col-md-4">
         <label class="form-label">Class</label>
         <input type="text" name="class" class="form-control @error('class') is-invalid @enderror"
             value="{{ old('class', optional($member)->class) }}">
         @error('class')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Gender -->
     <div class="col-md-4">
         <label class="form-label">Gender</label>
         <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
             <option value="">Select Gender</option>
             <option value="Male" {{ old('gender', optional($member)->gender) === 'Male' ? 'selected' : '' }}>Male
             </option>
             <option value="Female" {{ old('gender', optional($member)->gender) === 'Female' ? 'selected' : '' }}>
                 Female
             </option>
         </select>
         @error('gender')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Group (Initially hidden) -->
     <div class="col-md-4" id="group-container" style="display: none;">
         <label class="form-label">Group</label>
         <select name="group" id="group" class="form-select @error('group') is-invalid @enderror">
             <!-- Options will be populated by JavaScript -->
         </select>
         @error('group')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <!-- Date of Birth (Day, Month, Year) -->
     <div class="col-md-1">
         <label class="form-label">Day of Birth</label>
         <select name="dob_day" class="form-select @error('dob_day') is-invalid @enderror">
             <option value="">Day</option>
             @for ($i = 1; $i <= 31; $i++)
                 <option value="{{ $i }}"
                     {{ old('dob_day', optional($member)->dob_day) == $i ? 'selected' : '' }}>{{ $i }}
                 </option>
             @endfor
         </select>
         @error('dob_day')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <div class="col-md-2">
         <label class="form-label">Month of Birth</label>
         <select name="dob_month" class="form-select @error('dob_month') is-invalid @enderror">
             <option value="">Month</option>
             @foreach ($months as $i => $month)
                 <option value="{{ $month }}"
                     {{ old('dob_month', optional($member)->dob_month) === $i + 1 ? 'selected' : '' }}>
                     {{ $month }}
                 </option>
             @endforeach
         </select>

         @error('dob_month')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>

     <div class="col-md-1">
         <label class="form-label">Year of Birth</label>
         <select name="dob_year" class="form-control @error('dob_year') is-invalid @enderror"
             style="max-height: 200px; overflow-y: auto;">
             <option value="">Choose Year</option>
             @for ($year = date('Y'); $year >= 1900; $year--)
                 <option value="{{ $year }}"
                     {{ old('dob_year', optional($member)->dob_year) == $year ? 'selected' : '' }}>
                     {{ $year }}
                 </option>
             @endfor
         </select>
         @error('dob_year')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>


     <div class="col-md-12">
         <label class="form-label">Departments</label>
         <div class="form-check-container">
             @foreach ($departments as $department)
                 <div class="form-check form-check-inline">
                     <input type="checkbox" name="departments[]" value="{{ $department->id }}" class="form-check-input"
                         @if (in_array($department->id, explode(',', old('departments', optional($member)->department ?? '')))) checked @endif>
                     <label class="form-check-label">{{ $department->name }}</label>
                 </div>
             @endforeach
         </div>
         @error('departments')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>



     <!-- Remark -->
     <div class="col-12">
         <label class="form-label">Remark</label>
         <textarea class="form-control @error('remark') is-invalid @enderror" name="remark" rows="3">{{ old('remark', optional($member)->remark) }}</textarea>
         @error('remark')
             <div class="invalid-feedback">{{ $message }}</div>
         @enderror
     </div>
 </div>

 <style>
     .form-check-container {
         display: flex;
         flex-wrap: wrap;
         /* Allow checkboxes to wrap */
         gap: 15px;
         /* Adds space between each checkbox */
     }

     .form-check-inline {
         display: flex;
         align-items: center;
         /* Vertically center the label with checkbox */
     }
 </style>


 <script>
     // Function to populate group options
     function updateGroupOptions(gender) {
         const groupSelect = document.getElementById('group');
         const groupContainer = document.getElementById('group-container');

         // Clear any previous options
         groupSelect.innerHTML = '';

         // Show the group input field
         groupContainer.style.display = 'block';

         if (gender === 'Male') {
             // Group A to Group O for Male
             for (let i = 65; i <= 79; i++) {
                 let option = document.createElement('option');
                 option.value = String.fromCharCode(i); // Convert ASCII to letter (A to O)
                 option.textContent = `Group ${String.fromCharCode(i)}`; // Group A to Group O
                 groupSelect.appendChild(option);
             }
         } else if (gender === 'Female') {
             // Group A to Group O + Young Ladies for Female
             for (let i = 65; i <= 79; i++) {
                 let option = document.createElement('option');
                 option.value = String.fromCharCode(i); // Convert ASCII to letter (A to O)
                 option.textContent = `Group ${String.fromCharCode(i)}`; // Group A to Group O
                 groupSelect.appendChild(option);
             }

             // Add Young Ladies option for Female
             let youngLadiesOption = document.createElement('option');
             youngLadiesOption.value = 'Young Ladies';
             youngLadiesOption.textContent = 'Young Ladies';
             groupSelect.appendChild(youngLadiesOption);
         }
     }

     // Listen for changes in the gender dropdown
     document.getElementById('gender').addEventListener('change', function() {
         const gender = this.value;
         updateGroupOptions(gender); // Update the group options based on gender

         // If no gender is selected, hide the group dropdown
         if (!gender) {
             document.getElementById('group-container').style.display = 'none';
         }
     });

     // Initial check to load the options if the form is already populated
     document.addEventListener('DOMContentLoaded', function() {
         const selectedGender = document.getElementById('gender').value;
         if (selectedGender) {
             updateGroupOptions(selectedGender);
         }
     });
 </script>
