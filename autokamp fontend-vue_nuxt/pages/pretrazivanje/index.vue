<template>
<div class="wrap">
    
    <nuxt-link to="/" class="button" >Početna</nuxt-link>
  <div class="pitchList ">   
    

    <pitchItem v-for="pitch in pitchList" :key="pitch.id" :pitchInfo="pitch" />
</div>
  </div>
</template>

<script>
import pitchItem from '~/components/pitchItem'
export default {
    data(){
        return{
            pitchList:[]
        }
    },

    created(){

        this.$axios.get(`pretrazivanje?datumpocetak=${this.$route.query.arrivalDate}&datumkraj=${this.$route.query.departureDate}`,        
        // {params:{
        //     datumpocetak:this.$route.query.arrivalDate,
        //     datumkraj:this.$route.query.departureDate
        // }}
        ).then(res => {
            this.pitchList = res.data.parcele
        })

    },
    components:{
        pitchItem
    }

}
</script>

<style>
.pitchList {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap:15px;
}


</style>