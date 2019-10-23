<template>
    <div></div>
</template>

<script>
    export default {
        fetch() {
            return new Promise(resolve => {
                setTimeout(resolve, 2000)
            })
        }
    }
</script>
