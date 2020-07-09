<template>
  <div class="home">
    <div class="search-bar">

      <h1>
        Rezerviraj
      </h1>

      <div class="search-bar-date">
        <p>Dolazak</p>
        <input type="date" v-model="arrivalDate">
      </div>

      <div class="search-bar-date">
        <p>Dolazak</p>
        <input type="date" v-model="departureDate">
      </div>

      <nuxt-link :to="{ name: 'pretrazivanje', query: { arrivalDate: arrivalDate,departureDate: departureDate }}">Pretrazi smjestaj</nuxt-link>

    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      arrivalDate:'',
      departureDate:'',
    }
  }

}
</script>

<style scoped>

.home{
  height: 100vh;
  width: 100%;
  background-image: url('~assets/img/background.jpg');
  display: flex;
  align-items: center;
  justify-content: center;
}

.search-bar{
  display: flex;
  background-color:white;
  padding: 20px;
}

</style>
