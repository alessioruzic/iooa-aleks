<template>

         <div  class="wrap">

            <div class="image">
              <img :src="'http://127.0.0.1:8000/app/public/' + $route.query.pitchInfo.image" alt="">
           </div>
         <div class="content">


           <div>

      <h1>{{$route.query.pitch_id}}</h1>
        <p v-for="service in $route.query.services" :key="service.service_id">{{service.name}} - {{service.quantity}}</p>

           </div>


          </div>
      </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.image{
    height: 400px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.image img{
    width: 100%;
}

</style>