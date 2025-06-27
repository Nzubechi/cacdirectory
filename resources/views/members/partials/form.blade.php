<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
               value="{{ old('first_name', optional($member)->first_name) }}">
        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Surname</label>
        <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror"
               value="{{ old('surname', optional($member)->surname) }}">
        @error('surname') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
               value="{{ old('phone', optional($member)->phone) }}">
        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', optional($member)->email) }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
               value="{{ old('address', optional($member)->address) }}">
        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Home Address</label>
        <input type="text" name="home_address" class="form-control @error('home_address') is-invalid @enderror"
               value="{{ old('home_address', optional($member)->home_address) }}">
        @error('home_address') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Profession / Business</label>
        <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror"
               value="{{ old('profession', optional($member)->profession) }}">
        @error('profession') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control @error('age') is-invalid @enderror"
               value="{{ old('age', optional($member)->age) }}">
        @error('age') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label class="form-label">Group</label>
        <input type="text" name="group" class="form-control @error('group') is-invalid @enderror"
               value="{{ old('group', optional($member)->group) }}">
        @error('group') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
