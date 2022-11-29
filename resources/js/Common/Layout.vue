<template>
    <div class="h-32 md:h-64 bg-[conic-gradient(at_bottom_left,_var(--tw-gradient-stops))] from-gray-300 to-gray-100">
        <Logo />
       <div class="max-w-7xl mx-4 lg:mx-8 pb-8 xl:mx-auto bg-white rounded-md md:rounded-lg shadow p-4 md:px-8">
            <slot />
        </div>
        <Footer />
    </div>
</template>

<script setup lang="ts">
    import Logo from "@/Common/Logo"
    import Footer from "@/Common/Footer"
</script>
