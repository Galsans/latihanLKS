<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card p-3">
          <div class="group">
            <h4>Kelas :</h4>
            <p>{{ grade.kelas }}</p>
          </div>
          <div class="group">
            <h4>WaliKelas :</h4>
            <p>{{ grade.walikelas }}</p>
          </div>
          <div class="group">
            <router-link :to="`/grades/${grade.id}/edit`" class="btn btn-secondary mt-3">Edit</router-link>
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
      grade: {},
    };
  },
  async created() {
    try {
      const response = await axios.get(`http://localhost:8000/api/grades/${this.$route.params.id}`);
      this.grade = response.data;
    } catch (error) {
      console.error(error);
    }
  },
};
</script>
