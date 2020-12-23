<template>
    <div class="container mt-5">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <inertia-link :href="$route('posts.index')">
                        <el-link size="small" icon="el-icon-back" type="primary">
                            Back
                        </el-link>
                    </inertia-link>

                    <h1 class="mt-3">{{ post[0].title }}</h1>

                    <div class="meta">
                        <small>Date: {{ post[0].published_at | formatDate }}</small>
                        <br>
                        <small>
                            <div class="badge badge-primary">
                                {{ post[0].category.name }}
                            </div>
                        </small>
                    </div>

                    <div class="content mt-3">
                        <p>
                            {{ post[0].body }}
                        </p>
                    </div>
                    
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
    name: "PostShow",
    layout: Layout,
    props: {
        post: {
            type: Array,
            required: true
        }
    },
    filters: {
        formatDate(value) {
            return moment(value).format("L");
        }
    }
}
</script>

<style>

</style>