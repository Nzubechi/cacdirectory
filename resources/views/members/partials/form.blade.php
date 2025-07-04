<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
            value="{{ old('first_name', optional($member)->first_name) }}">
        @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Surname</label>
        <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror"
            value="{{ old('surname', optional($member)->surname) }}">
        @error('surname')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', optional($member)->phone) }}">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', optional($member)->email) }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <label class="form-label">Home Address</label>
        <input type="text" name="home_address" class="form-control @error('home_address') is-invalid @enderror"
            value="{{ old('home_address', optional($member)->home_address) }}">
        @error('home_address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Profession / Business</label>
        <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror"
            value="{{ old('profession', optional($member)->profession) }}">
        @error('profession')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
            value="{{ old('dob', optional($member)->dob ? optional($member->dob)->format('Y-m-d') : '') }}">
        @error('dob')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
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

    <div class="col-md-4">
        <label class="form-label">Group</label>
        <input type="text" name="group" class="form-control @error('group') is-invalid @enderror"
            value="{{ old('group', optional($member)->group) }}">
        @error('group')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Department</label>
        <input type="text" name="department" class="form-control @error('department') is-invalid @enderror"
            value="{{ old('department', optional($member)->department) }}">
        @error('department')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Class</label>
        <input type="text" name="class" class="form-control @error('class') is-invalid @enderror"
            value="{{ old('class', optional($member)->class) }}">
        @error('class')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Remark</label>
        <textarea class="form-control @error('remark') is-invalid @enderror" name="remark" rows="3">{{ old('remark', optional($member)->remark) }}</textarea>
        @error('remark')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
