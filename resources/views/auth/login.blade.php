<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            {{-- <a href="../index.html"><img src="../assets/images/brand/logo/logo-primary.svg" class="mb-2"
                                    alt=""></a> --}}
                            <h2 class="mb-6 text-primary text-center">Sistem Pengarsipan Surat Online UICI</p>
                        </div>
                        <!-- Form -->
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3">
                                <x-input type="email" id="email" :value="old('email')" label="Email"
                                    class="form-control" name="email" placeholder="Email" required autofocus />
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <x-input type="password" id="password" value="" label="Password" class="form-control"
                                    name="password" placeholder="Password" required autocomplete="current-password" />
                            </div>
                            <!-- Checkbox -->
                            <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                <div class="form-check custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="rememberme" name="remember" />
                                    <label class="form-check-label" for="rememberme">{{ __('Remember me') }}</label>
                                </div>
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
