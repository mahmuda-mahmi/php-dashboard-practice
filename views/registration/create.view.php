<?php require base_path("views/partials/head.php"); ?>

<?php require base_path("views/partials/nav.php"); ?>

<main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" class="mx-auto h-10 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register for a new account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/register" method="POST" class="space-y-6">
                
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        required 
                        autocomplete="email" 
                        placeholder="email@example.com"
                        class="block w-full rounded-md bg-white px-3 py-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                    />
                </div>


                <div>
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">
                        Password
                    </label>

                    <div class="relative mt-2">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 pr-16 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        >

                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 px-3 text-sm font-medium text-gray-600 hover:text-gray-900"
                        >
                            <!-- eye off -->
                             <svg id="eye-off-icon" width="24" height="24"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="eyeClosedIconTitle" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000" overflow="visible"><title id="eyeClosedIconTitle">Hidden (closed eye)</title><path d="M20 9S19.6797 9.66735 19 10.5144M12 14c-1.608.0-2.95214-.4122-4.05139-1M12 14c1.608.0 2.9521-.4122 4.0514-1M12 14v3.5M4 9s.35367.73682 1.10628 1.6448M7.94861 13 5 16m2.94861-3C6.6892 12.3266 5.75124 11.4228 5.10628 10.6448M16.0514 13 18.5 16m-2.4486-3c1.3304-.7113 2.3021-1.6798 2.9486-2.4856m-13.89372.1304L2 12m17-1.4856L22 12"/>
                            </svg>

                            <!-- eye on -->
                            <svg id="eye-icon" class="hidden" width="24" height="24"  viewBox="0 -6 36 36" xmlns="http://www.w3.org/2000/svg" overflow="visible">
                                <g id="Lager_83" data-name="Lager 83" transform="translate(2 -4)"><g id="Path_90" data-name="Path 90" fill="none" stroke-miterlimit="10"><path d="M34 19V16C23.1 32 8.9 32-2 16v3h0V16C8.9.0 23.1.0 34 16v3z" stroke="none"/><path d="M16 24c2.36101341247559.0 4.75251388549805-.787214279174801 7.10807228088379-2.33979988098145C25.15364265441895 20.31193733215332 27.14412689208984 18.41371917724609 29.04653358459473 16c-1.90240669250489-2.41371917724609-3.89289093017578-4.311936378479-5.93846130371094-5.66020011901855C20.75251388549805 8.787214279174805 18.36101341247559 8 16 8c-2.3610143661499.0-4.75251388549805.787214279174805-7.10807132720947 2.33979988098145C6.846356391906738 11.688063621521 4.855872631072998 13.58628082275391 2.953466176986694 16c1.9024064540863 2.41371917724609 3.89289021492004 4.31193733215332 5.93846249580383 5.66020011901855C11.24748611450195 23.2127857208252 13.6389856338501 24 16 24m0 4c-6.27499961853027.0-12.5499999523163-4-18-12C3.450000047683716 8 9.725000381469727 4 16 4c6.27499961853027.0 12.5499992370606 4 18 12-5.45000076293945 8-11.7250003814697 12-18 12zm18-9V16v3zM-2 19V16v3z" stroke="none" fill="#0F172A"/></g><circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4" transform="translate(12 12)" fill="#0F172A"/></g>
                            </svg>                      
                        </button>
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                </div>

                <ul>
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
            </form>
        </div>
    </div>

</main>

<?php require base_path("views/partials/footer.php"); ?>


<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        const eyeOffIcon = document.getElementById('eye-off-icon');
        // const button = event.target;

        if (password.type === 'password') {
            password.type = 'text';

            eyeIcon.classList.remove('hidden');
            eyeOffIcon.classList.add('hidden');
        } else {
            password.type = 'password';

            eyeIcon.classList.add('hidden');
            eyeOffIcon.classList.remove('hidden');
        }
    }
</script>