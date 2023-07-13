<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Table Kelas</h4>
                        <router-link to="/grades/create" class="btn btn-success"
                            >ADD</router-link
                        >
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>WaliKelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(grade, index) in grades"
                                        :key="grade.index"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ grade.kelas }}</td>
                                        <td>{{ grade.walikelas }}</td>
                                        <td>
                                            <div class="group d-flex gap-2">
                                                <router-link
                                                    :to="`/grades/${grade.id}`"
                                                    class="btn btn-info"
                                                    >View</router-link
                                                >
                                                <router-link
                                                    :to="`/grades/${grade.id}/edit`"
                                                    class="btn btn-secondary"
                                                    >Edit</router-link
                                                >
                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                    @click="
                                                        deleteGrade(grade.id)
                                                    "
                                                >
                                                    Remove
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            grades: [],
        };
    },
    async created() {
        try {
            const response = await axios.get(
                "http://localhost:8000/api/grades",
                this.grades
            );
            this.grades = response.data;
        } catch (error) {
            console.error(error);
        }
    },
    methods: {
        async deleteGrade(id) {
            try {
                await axios.delete(`http://localhost:8000/api/grades/${id}`);
                this.grades = this.grades.filter((grade) => grade.id !== id);
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
