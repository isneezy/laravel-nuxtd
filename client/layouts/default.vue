<template>
    <div
        class="bg-gray-200 h-full min-h-screen antialiased text-sm font-sans text-secondary-dark"
    >
        <div class="bg-white shadow">
            <div class="container mx-auto">
                <div class="md:px-8">
                    <nav
                        class="relative flex flex-wrap items-center justify-between md:py-4"
                    >
                        <div
                            class="relative z-10 flex-shrink-0 pl-4 py-4 md:p-0"
                        >
                            <nuxt-link to="/">
                                <h1 class="font-medium">
                                    Dockerlify.io
                                </h1>
                            </nuxt-link>
                        </div>
                        <div class="ml-10 relative flex items-baseline">
                            <a
                                href="#"
                                class="text-sm font-medium text-gray-900 hover:text-gray-700"
                                >Servers</a
                            >
                            <a
                                href="#"
                                class="ml-8 text-sm font-medium text-gray-900 hover:text-gray-700"
                                >Clusters</a
                            >
                            <a
                                href="#"
                                class="ml-8 text-sm font-medium text-gray-900 hover:text-gray-700"
                                >Apps</a
                            >
                            <nuxt-link
                                to="/auth/login"
                                class="ml-8 text-sm font-medium text-gray-900 hover:text-gray-700"
                            >
                                Login
                            </nuxt-link>
                            <nuxt-link
                                to="/auth/register"
                                class="ml-8 px-3 py-2 font-medium text-sm rounded bg-gray-300 text-gray-900 hover:bg-gray-400 focus:outline-none focus:bg-gray-400"
                            >
                                Create account
                            </nuxt-link>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container mx-auto mt-8 md:px-8">
            <nuxt />
        </div>
    </div>
</template>
