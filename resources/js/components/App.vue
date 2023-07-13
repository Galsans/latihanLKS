<template>
    <nav class="navbar navbar-expand-lg bg-dark mb-3" data-bs-theme="dark">
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand">Navbars</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <router-link to="/grades" class="nav-link active">Kelas</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/murids" class="nav-link active">Murid</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </template>

  <script>
  export default {
    name: "App",
  };
  </script>

  <!-- <style>
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
  </style> -->
