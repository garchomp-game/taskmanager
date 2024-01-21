<script setup>
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <div class="container mx-auto">
        <header
            class="flex justify-between items-center bg-gray-100 px-6 py-4 shadow"
        >
            <h1 class="text-2xl font-semibold">ToDoList</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li>
                        <a
                            class="text-gray-700 hover:text-gray-900"
                            href="login"
                        >
                            Login
                        </a>
                    </li>
                    <li>
                        <a
                            class="text-gray-700 hover:text-gray-900"
                            href="register"
                        >
                            Register
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="main-content mt-8 text-center">
            <h2 class="text-3xl font-bold mb-2">ToDoListにようこそ！</h2>
            <p class="text-gray-700 mb-4">あなたのタスクを管理しましょう</p>
        </div>
    </div>
    <footer class="mt-8 py-4 text-center border-t">
        <span class="text-sm text-gray-500">
            Laravel + Vue3 のToDoリストアプリケーション
        </span>
    </footer>
</template>
