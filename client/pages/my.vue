<template>
    <div>
        <h4 class="font-semibold text-xl">Seu Perfil</h4>
        <div class="flex -mx-4 mt-8">
            <div class="w-3/12 px-4">
                <ul>
                    <li>
                        <a
                            href="javascript:void(0)"
                            class="text-primary hover:text-primary"
                        >
                            Autentica&ccedil;&atilde;o e
                            Informa&ccedil;&atilde;o pessoal
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="javascript:void(0)" class="hover:text-primary">
                            API
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-3/12 px-4">
                <NuxtChild />
            </div>
        </div>
    </div>
</template>
