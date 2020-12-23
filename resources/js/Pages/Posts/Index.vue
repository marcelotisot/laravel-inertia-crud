<template>
        <div class="container mt-5">
        
        <div v-if="$page.props.flash.message" class="alert alert-success">
            {{ $page.props.flash.message }}
        </div>

        <div class="card">
            <div class="card-header">
                Posts
            </div>

            <div class="card-body">
                <inertia-link href="/posts/create" class="text-light">
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
                                <th>Title</th>
                                <th>Published At</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="post in posts.data" :key="post.id">
                                <td v-text="post.id"></td>
                                <td v-text="post.title"></td>
                                <td>{{ post.published_at | formatDate }}</td>
                                <td v-text="post.category.name"></td>
                                <td>
                                    <el-button-group>
                                        <el-button 
                                            size="small" 
                                            type="primary" 
                                            icon="el-icon-zoom-in">
                                        </el-button>
                                        <el-button 
                                            size="small" 
                                            type="warning" 
                                            icon="el-icon-edit">
                                        </el-button>
                                        <el-button 
                                            size="small" 
                                            type="danger" 
                                            icon="el-icon-delete"
                                            @click="deletePost(post.id)">
                                        </el-button>
                                    </el-button-group>
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

// Moment
import moment from "moment";

export default {
    name: "Index",

    layout: Layout,

    props: {
        posts: {
            type: Object,
            required: true
        }
    },

    filters: {
        formatDate(value) {
            return moment(value).format("L");
        }
    },

    methods: {
        deletePost(id) {
            alert("Delete post: " + id);
        }
    }
}
</script>