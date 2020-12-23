<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Create Category
            </div>
            <div class="card-body">
                <form @submit.prevent="onSubmit" class="col-lg-6">
                    <div class="form-group">
                        <label for="cName">Name:</label>
                        <el-input
                            size="medium"
                            placeholder="Name"
                            v-model="form.name"
                            clearable>
                        </el-input>
                        <div v-if="errors.name" style="color: red;">
                            <small>{{ errors.name[0] }}</small>
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

export default {
    name: "Create",
    layout: Layout,
    props: {
        errors: Object,
    },
    data() {
        return {
            form: {
                name: ""
            }
        }
    },
    methods: {
        onSubmit() {
            this.$inertia.post("/categories", this.form);
        },

        resetForm() {
            this.form.name = "";
        }
    }
}
</script>