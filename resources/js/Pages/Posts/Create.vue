<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <inertia-link :href="$route('posts.index')">
                    <el-link size="small" icon="el-icon-back" type="primary">
                        Back
                    </el-link>
                </inertia-link>

                <h3 class="mt-3">
                    Create Post
                </h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="onSubmit" class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <el-input
                            size="medium"
                            placeholder="Title"
                            v-model="form.title"
                            clearable>
                        </el-input>
                        <div v-if="errors.title" style="color: red;">
                            <small>{{ errors.title[0] }}</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body">Body:</label>
                        <el-input
                            type="textarea"
                            :rows="2"
                            placeholder="Body"
                            v-model="form.body">
                        </el-input>
                        <div v-if="errors.body" style="color: red;">
                            <small>{{ errors.body[0] }}</small>
                        </div>
                    </div>

                    <div class="form-group d-flex flex-column">
                        <label for="title">Select category:</label>
                        <el-select v-model="form.category_id" clearable placeholder="Select Category">
                            <el-option
                                v-for="item in categories"
                                :key="item.id"
                                :label="item.name"
                                :value="item.id">
                            </el-option>
                        </el-select>
                        <div v-if="errors.category_id" style="color: red;">
                            <small>{{ errors.category_id[0] }}</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <el-button
                            type="success"
                            icon="el-icon-plus"
                            @click="onSubmit">
                                Save
                        </el-button>
                        <el-button
                            icon="el-icon-close"
                            @click="resetForm">
                                Reset
                        </el-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
// Shared Layout
import Layout from "../Layout/App";

// Axios HTTP Library
import axios from "axios";

export default {
    name: "Create",

    layout: Layout,

    props: {
        errors: Object,
    },

    data() {
        return {
            categories: [],

            form: {
                title: "",
                body: "",
                category_id: null
            }
        }
    },

    created() {
        this.getCategories();
    },

    methods: {

        getCategories() {
            axios.get("/posts/getCategories")
                .then(res => {
                    this.categories = res.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        onSubmit() {
            this.$inertia.post("/posts", {
                title       : this.form.title,
                body        : this.form.body,
                category_id : this.form.category_id
            });
        },

        resetForm() {
            this.form.title        =  "";
            this.form.body         =  "";
            this.form.category_id  =  null;
        }

    }
}
</script>