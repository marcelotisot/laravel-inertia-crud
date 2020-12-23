<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <inertia-link class="navbar-brand" href="/">
                    Laravel Inertia Crud
                </inertia-link>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <inertia-link class="nav-link" href="/">
                                Home
                            </inertia-link>
                        </li>

                        <li class="nav-item">
                            <inertia-link class="nav-link" href="/categories">
                                Categories
                            </inertia-link>
                        </li>

                        <li class="nav-item">
                            <inertia-link class="nav-link" href="/posts">
                                Posts
                            </inertia-link>
                        </li>
                    </ul>
                </div>
            </div> <!-- /.container -->
        </nav>

        <main>
            <slot></slot>
        </main>
        
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style>

</style>