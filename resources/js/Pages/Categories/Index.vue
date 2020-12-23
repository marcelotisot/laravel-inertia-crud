<template>
    <div class="container mt-5">
        
        <div v-if="$page.props.flash.message" class="alert alert-success">
            {{ $page.props.flash.message }}
        </div>

        <div class="card">
            <div class="card-header">
                Categories
            </div>

            <div class="card-body">
                <inertia-link href="/categories/create" class="text-light">
                    <el-button type="success" icon="el-icon-plus"> 
                        Create new
                    </el-button>
                </inertia-link>
            </div>

            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="categorie in categories.data" :key="categorie.id">
                                <td v-text="categorie.id"></td>
                                <td v-text="categorie.name"></td>
                                <td>
                                    <inertia-link 
                                        href="/categories/edit"
                                        :data="{category: categorie}"
                                        class="text-light">
                                        <el-button 
                                            size="small" 
                                            type="warning" 
                                            icon="el-icon-edit">
                                        </el-button>
                                    </inertia-link>
                                    <el-button 
                                        size="small" 
                                        type="danger" 
                                        icon="el-icon-delete">
                                    </el-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
</template>

<script>
    // Shared Layout
    import Layout from "../Layout/App";
    
    export default {
        name: "Index",
        layout: Layout,
        props: {
            categories: {
                type: Object,
                required: true
            }
        }
    }
</script>