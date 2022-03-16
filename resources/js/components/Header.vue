<template>
    <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item"  
                    v-for="(item, index) in menuItems"
                    :key="index"
                    >
                    <router-link class="nav-link text-light uppercase" :to="{name: item.page}">
                        {{ item.label }}

                    </router-link>
                </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
        
        menuItems: [
                    {
                        label: 'Home',
                        page: 'home',
                    },
                    {
                        label: 'Posts',
                        page: 'posts',
                    },
                    {
                        label: 'About',
                        page: 'about',
                    },
                    {
                        label: 'Contacts',
                        page: 'contacts',
                    },
                ],
    }
    },
}
</script>

<style lang="scss">
</style>