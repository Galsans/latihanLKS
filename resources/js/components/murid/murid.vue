<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card p-3">
          <div class="d-flex gap-2">
            <h5>Nama :</h5>
            <p>{{ murid.nama }}</p>
          </div>
          <div class="d-flex gap-2">
            <h5>Kelas :</h5>
            <p>{{ murid.grade["kelas"] }}</p>
          </div>
          <div class="group">
            <router-link :to="`/murids/${this.$route.params.id}/edit`" class="btn btn-secondary">Edit</router-link>
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
      murid: {},
      grade: {},
    };
  },
  async created() {
    try {
      const response = await axios.get(`http://localhost:8000/api/murids/${this.$route.params.id}`);
      this.murid = response.data;
    } catch (error) {
      console.error(error);
    }
  },
};
</script>
