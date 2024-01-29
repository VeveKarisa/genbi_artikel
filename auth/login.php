<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="login-container">
        <div class="flex h-full flex-wrap items-center justify-center gap-10">
            <div class="md:w-8/12 lg:ml-6 lg:w-5/12 p-4 border shadow-2xl">
                <div class="w-full items-center">
                    <img src="../assets/img/Genbi komsat batam bulat.png" class="w-40 mx-auto" alt="Logo Bank Indonesia" />
                </div>
                <form action="cek_login.php" method="post">
                    <!-- Username input -->
                    <div class="relative mb-6">
                        <label for="username" class="text-neutral-500">Username</label>
                        <input type="text" name="username" id="username" class="border min-h-[auto] w-full rounded px-3 py-[0.32rem] leading-[2.15] outline-none  dark:text-neutral-200 dark:placeholder:text-neutral-200" placeholder="Masukkan Username" />
                    </div>

                    <!-- Password input -->
                    <div class="relative mb-6">
                        <label for="password" class="text-neutral-500">Password
                        </label>
                        <input type="password" name="password" id="password" class="border min-h-[auto] w-full rounded px-3 py-[0.32rem] leading-[2.15] outline-none  dark:text-neutral-200 dark:placeholder:text-neutral-200" placeholder="Masukkan Password" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="w-full rounded bg-blue-700 px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] hover:bg-blue-600 ">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        width: 100%;
        height: 100%;
    }
</style>