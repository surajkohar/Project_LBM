<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form id="myForm" method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <div class="error" id="name-error" style="color: red;"></div>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <div class="error" id="email-error"></div>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <div class="error" id="password-error"></div>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <div class="error" id="confirmPassword-error"></div>
            </div>

            <div class="mt-4">
                <x-label for="referal_person" value="{{ __('Referal Person') }}" />
                <x-input id="referal_person" class="block mt-1 w-full" type="text" name="referal_person" required
                    autocomplete="referal_person" />
                <div class="error" id="referalPerson-error"></div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button id="btn" class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $("input[name='name']").on('input', function() {
            var name = $(this).val().trim();
            var namePattern = /^[a-zA-Z\s]+$/;
            if (name === "") {
                $("#name-error").text("Name is required");
            } else if (!namePattern.test(name)) {
                $("#name-error").text("Name should not contain numbers or special characters");
            } else {
                $("#name-error").text("");
            }
        });

        $("input[name='email']").on('input', function() {
            var email = $(this).val().trim();
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (email === "") {
                $("#email-error").text("Email is required").css("color", "red");
            } else if (!emailPattern.test(email)) {
                $("#email-error").text("Invalid email format").css("color", "red");
            } else {
                $("#email-error").text("");
            }
        });

        $("input[name='password']").on('input', function() {
            var password = $(this).val().trim();
            var passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[0-9]).{8,}$/;

            if (password === "") {
                $("#password-error").text("Password is required").css("color", "red");
            } else if (!passwordPattern.test(password)) {
                $("#password-error").text(
                    "Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a number, and a special character"
                    ).css("color", "red");
            } else {
                $("#password-error").text("");
            }
            validateConfirmPassword();
        });


        $("input[name='password_confirmation']").on('input', function() {
            validateConfirmPassword();
        });

        function validateConfirmPassword() {
            var password = $("input[name='password']").val().trim();
            var confirmPassword = $("input[name='password_confirmation']").val().trim();

            if (confirmPassword === "") {
                $("#confirmPassword-error").text("Confirm Password is required").css("color",
                    "red");
            } else if (password !== confirmPassword) {
                $("#confirmPassword-error").text("Passwords do not match").css("color", "red");
            } else {
                $("#confirmPassword-error").text("");
            }
        };

        $("input[name='referal_person']").on('input', function() {

            var referalName = $(this).val().trim();
            var namePattern = /^[a-zA-Z\s]+$/;
            if (referalName === "") {
                $("#referalPerson-error").text("Referal Person is required").css("color", "red");;
            } else if (!namePattern.test(referalName)) {
                $("#referalPerson-error").text("Referal Person should not contain numbers or special characters").css("color", "red");;
            } else {
                $("#referalPerson-error").text("");
            }
        });
     


        $("#btn").click(function(e) {
            e.preventDefault();
            var isValid = true;

            $("input[name='name']").trigger('input');
            $("input[name='email']").trigger('input');
            $("input[name='password']").trigger('input');
             $("input[name='password_confirmation']").trigger('input');
             $("input[name='referal_person']").trigger('input');
             

            $(".error").each(function() {
                if ($(this).text() !== "") {
                    isValid = false;
                }
            });

            if (isValid) {
                $("#myForm").submit();
                // alert("submitted");
            }
        });
    });
</script>
