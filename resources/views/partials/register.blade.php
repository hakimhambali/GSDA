<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModal">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="registerForm">
                    @csrf

                    <div>
                        <label for="nameInput" class="ml-1"><strong>{{ __('Name') }}</strong></label>
                        <input id="nameInput" type="text" class="form-control rounded" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>


                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>

                    </div>

                    <div class="mt-2">
                        <label for="emailInput" class="ml-1"><strong>{{ __('E-Mail') }}</strong></label>
                        <input id="emailInput" type="email" class="form-control rounded" name="email" value="{{ old('email') }}" required autocomplete="email">


                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>

                    </div>

                    <div class="mt-2">
                        <label for="passwordInput" class="ml-1"><strong>{{ __('Password') }}</strong></label>
                        <input id="passwordInput" type="password" class="form-control rounded" name="password" required autocomplete="new-password">

                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                    </div>

                    <div class="mt-2">
                        <label for="password-confirm" class="ml-1"><strong>{{('Confirm Password')}}</strong></label>
                        <input id="password-confirm" type="password" class="form-control rounded" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="roleInput"><strong>{{ __('Role') }}</strong></label>
                                <select name="role" id="roleInput" class="form-control custom-select rounded" data-placeholder="Choose Class Owner" style="box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;" tabindex="1">
                                    <option value="">-- Choose Role --</option>
                                    <option value="student">Student</option>
                                    <option value="lecturer">Lecturer</option>
                                </select>

                                <span class="invalid-feedback" role="alert" id="roleError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <table style="border:none;width:100%" class="mt-3">
                        <tr>
                            <td >
                                <a href="" class="table table-hover text-right" style="cursor: pointer;text-decoration: underline;" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">{{ __('Already registered?') }}</a>
                            </td>

                             <td class="text-right" style="border:none;">
                                <button type="submit" class="btn btn-primary ml-4">{{ __('REGISTER') }}</button>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
@parent

<script>
$(function () {
    $('#registerForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('register') }}",
            data: formData,
            success: () => window.location.assign("{{ url('/dashboard') }}"),
            error: (response) => {
                if(response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error").children("strong").text(errors[key][0]);
                    });
                } else {
                    window.location.reload();
                }
            }
        })
    });
})
</script>
@endsection
