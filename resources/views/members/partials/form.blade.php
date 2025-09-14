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
        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender', optional($member)->gender) === 'Male' ? 'selected' : '' }}>Male
            </option>
            <option value="Female" {{ old('gender', optional($member)->gender) === 'Female' ? 'selected' : '' }}>Female
            </option>
        </select>
        @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Group -->
    <div class="col-md-4">
        <label class="form-label">Group</label>
        <input type="text" name="group" class="form-control @error('group') is-invalid @enderror"
            value="{{ old('group', optional($member)->group) }}">
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
                <option value="{{ $i }}" {{ old('dob_day', optional($member)->dob_day) == $i ? 'selected' : '' }}>{{ $i }}</option>
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
            <option value="January" {{ old('dob_month', optional($member)->dob_month) === 'January' ? 'selected' : '' }}>January</option>
            <option value="February" {{ old('dob_month', optional($member)->dob_month) === 'February' ? 'selected' : '' }}>February</option>
            <option value="March" {{ old('dob_month', optional($member)->dob_month) === 'March' ? 'selected' : '' }}>March</option>
            <option value="April" {{ old('dob_month', optional($member)->dob_month) === 'April' ? 'selected' : '' }}>April</option>
            <option value="May" {{ old('dob_month', optional($member)->dob_month) === 'May' ? 'selected' : '' }}>May</option>
            <option value="June" {{ old('dob_month', optional($member)->dob_month) === 'June' ? 'selected' : '' }}>June</option>
            <option value="July" {{ old('dob_month', optional($member)->dob_month) === 'July' ? 'selected' : '' }}>July</option>
            <option value="August" {{ old('dob_month', optional($member)->dob_month) === 'August' ? 'selected' : '' }}>August</option>
            <option value="September" {{ old('dob_month', optional($member)->dob_month) === 'September' ? 'selected' : '' }}>September</option>
            <option value="October" {{ old('dob_month', optional($member)->dob_month) === 'October' ? 'selected' : '' }}>October</option>
            <option value="November" {{ old('dob_month', optional($member)->dob_month) === 'November' ? 'selected' : '' }}>November</option>
            <option value="December" {{ old('dob_month', optional($member)->dob_month) === 'December' ? 'selected' : '' }}>December</option>
        </select>
        @error('dob_month')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-1">
        <label class="form-label">Year of Birth</label>
        <input type="number" name="dob_year" class="form-control @error('dob_year') is-invalid @enderror"
            value="{{ old('dob_year', optional($member)->dob_year) }}" min="1900" max="{{ date('Y') }}">
        @error('dob_year')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Departments -->
    <div class="col-md-12">
        <label class="form-label">Departments</label>
        <textarea name="department" class="form-control @error('department') is-invalid @enderror"
            rows="3">{{ old('department', optional($member)->department) }}</textarea>
        @error('department')
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
