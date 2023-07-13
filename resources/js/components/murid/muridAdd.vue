<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="submitForm">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="murid.nama"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select
                                    name="grade_id"
                                    id="grade_id"
                                    v-model="murid.grade_id"
                                    class="form-control"
                                    required
                                >
                                    <option selected disable>
                                        --PILIH KELAS--
                                    </option>
                                    <option
                                        v-for="grade in grades"
                                        :key="grade.id"
                                        v-bind:value="grade.id"
                                    >
                                        {{ grade.kelas }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    v-if="isNewMurid"
                                >
                                    Send
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-secondary"
                                    v-else
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
            murid: {
                nama: "",
                grade_id: "",
            },
            grade: "",
            grades: [],
        };
    },
    computed: {
        isNewMurid() {
            return !this.$route.path.includes("edit");
        },
    },
    async created() {
        if (!this.isNewMurid) {
            const response = await axios.get(
                `http://localhost:8000/api/murids/${this.$route.params.id}`
            );
            this.murid = response.data;
        }
    },
    mounted() {
        this.getKelas();
    },
    methods: {
        getKelas() {
            axios
                .get("http://localhost:8000/api/grades")
                .then((response) => {
                    this.grades = response.data;
                })
                .catch(() => {
                    console.log.error;
                });
        },
        async submitForm() {
            try {
                if (this.isNewMurid) {
                    await axios.post(
                        "http://localhost:8000/api/murids",
                        this.murid
                    );
                } else {
                    await axios.put(
                        `http://localhost:8000/api/murids/${this.$route.params.id}`,
                        this.murid
                    );
                }
                this.$router.push("/murids");
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
