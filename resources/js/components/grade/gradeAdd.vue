<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Input Grade</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="submitForm">
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="grade.kelas"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="">WaliKelas</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="grade.walikelas"
                                    required
                                />
                            </div>
                            <div class="group mt-3">
                                <button
                                    type="submit"
                                    v-if="isNewGrade"
                                    class="btn btn-primary"
                                >
                                    Send
                                </button>
                                <button
                                    type="submit"
                                    v-else
                                    class="btn btn-secondary"
                                >
                                    Update
                                </button>
                            </div>
                        </form>
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
            grade: {
                kelas: "",
                walikelas: "",
            },
        };
    },
    computed: {
        isNewGrade() {
            return !this.$route.path.includes("edit");
        },
    },
    async created() {
        try {
            if (!this.isNewGrade) {
                const response = await axios.get(
                    `http://localhost:8000/api/grades/${this.$route.params.id}`
                );
                this.grade = response.data;
            }
        } catch (error) {
            console.error(error);
        }
    },
    methods: {
        async submitForm() {
            try {
                if (this.isNewGrade) {
                    await axios.post(
                        "http://localhost:8000/api/grades",
                        this.grade
                    );
                } else {
                    await axios.put(
                        `http://localhost:8000/api/grades/${this.$route.params.id}`,
                        this.grade
                    );
                }
                this.$router.push("/grades");
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
