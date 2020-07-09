<template>
  <div class="pitchItem">
    <div class="pitch-img">
        <img :src="'http://127.0.0.1:8000/app/public/' + pitchInfo.image" alt="">
    </div>
    <div class="pitch-info">
        <p>Broj parcele:{{pitchInfo.brojParcela}} </p>
        <p>Veličina: {{pitchInfo.velicinaParcela}}</p>
        <p>Opis: {{pitchInfo.opis.opis}}</p>
        <p>Vrsta: {{pitchInfo.tip.naziv}}</p>
        <p>Cijena: {{pitchInfo.tip.cijena}}</p>

        <nuxt-link :to="'pretrazivanje/' + pitchInfo.id" class="button">Odaberi</nuxt-link>
    </div>
  </div>
</template>

<script>
export default {
    props:['pitchInfo']
}
</script>

<style >
.pitchItem{
       height: 150px;
    display: flex;
    align-items: center;
    border: 1px solid black;
    
}

.pitch-img{
    width: 200px;
    height: 100%;
    overflow: hidden;    
}
.pitch-img img{
    height: 100%;
}
.pitch-info{
    padding: 15px;
}

</style>