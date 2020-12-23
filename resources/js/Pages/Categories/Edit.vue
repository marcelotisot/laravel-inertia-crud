<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Update Category
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
                        <inertia-link href="/categories" class="text-light">
                            <el-button
                                icon="el-icon-close">
                                    Cancel
                            </el-button>
                        </inertia-link>
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
    name: "Edit",

    layout: Layout,

    props: {
        errors: Object,

        category: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            form: {
                id: this.category.id,
                name: this.category.name
            }
        }
    },

    methods: {
        onSubmit() {
            let id = this.form.id;

            this.$inertia.put(`/categories/${id}`, {
                name: this.form.name
            });
        }
    }

}
</script>