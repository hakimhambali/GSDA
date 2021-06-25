<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-1" id="loginModal">{{ __('Login') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email"><strong>{{ __('E-Mail') }}</strong></label>
                        <input id="email" type="email" class="rounded form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mt-4">
                        <label for="password"><strong>{{ __('Password') }}</strong></label>
                        <input id="password" type="password" class="rounded form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="block mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="remember id="remember" {{ old('remember') ? 'checked' : '' }}">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                    </div>
                    <br>

                    <table style="border:none;width:100%">
                        <tr>
                           <td >
                               <a href="" class="table table-hover" style="cursor: pointer;text-decoration: underline;" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">{{ __('Register Here') }}</a>
                           </td>

                            <td class="text-right" style="border:none;">
                                    @if (Route::has('password.request'))
                                        <a class="btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-primary ml-4">{{ __('LOGIN') }}</button>
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

@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#loginModal').modal({
            show: true
        });
    });
    </script>
@endif
@endsection
