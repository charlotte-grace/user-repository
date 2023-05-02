<!-- Create User Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="create-modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name"
                            class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                            value="{{ old('first_name') }}" required autofocus>

                        @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                            class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                            value="{{ old('last_name') }}" required>

                        @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email_address">Email Address</label>
                        <input type="email" name="email_address" id="email_address"
                            class="form-control{{ $errors->has('email_address') ? ' is-invalid' : '' }}"
                            value="{{ old('email_address') }}" required>

                        @if ($errors->has('email_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email_address') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password"
                            class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" required>

                        @if ($errors->has('confirm_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" name="position" id="position"
                            class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"
                            value="{{ old('position') }}" required>

                        @if ($errors->has('position'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('position') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
