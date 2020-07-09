<template>
  <div>
      <div class="wrap"  v-if="isLoading">
          <h1>LOADING</h1>
      </div>

       <div  class="wrap" v-else>

            <div class="image">
              <img :src="'http://127.0.0.1:8000/app/public/' + pitchInfo.image" alt="">
           </div>
         <div class="content">


           <div>

            <h1>Par{{pitchInfo.brojParcela}}</h1>

            <p>Veličina: {{pitchInfo.velicinaParcela}}</p>
            <p>Opis: {{pitchInfo.opis.opis}}</p>
            <p>Vrsta: {{pitchInfo.tip.naziv}}</p>
            <p>Cijena: {{pitchInfo.tip.cijena}}</p>

           </div>

            <div class="services">
                <div class="service-item" v-for="service in services" :key="service.id"> 
                    <p>{{service.naziv}}</p>
                    <input type="number" min="0" max="5" class="service-item-num"  @input="selectService($event ,service)">
                </div>
            </div>

            <button class="button" @click="makeReservation">Rezerviraj</button>

          </div>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            pitchInfo:{},
            services:[],
            isLoading:true,
            selectedServices:{}
            
        }
    },
    methods:{
        selectService(e,service){
            this.selectedServices[service.id] = Object.assign({}, this.selectedServices[service.id], {
                service:service,
                quantity:parseInt(e.target.value)
            })                 
        },
        makeReservation(){
            const services= Object.values(this.selectedServices).map(s => {                
                return{
                    service_id:s.service.id,
                    name:s.service.naziv,
                    quantity:s.quantity,
                    pitchInfo:this.pitchInfo
                }
            })
            
            // this.$axios.post('make-raservation', {params:{
            //     pitch_id:this.pitchInfo.id,
            //     services:Array.from(services)
            // }})


            this.$router.push({ name: 'check-in', query: {
                pitch_id:this.pitchInfo.id,
                services:Array.from(services),
                 pitchInfo:this.pitchInfo
            } })


        }
    },
    created(){
      
        
        this.$axios.get(`/pretrazivanje/parcela/?id=${this.$route.params.id}`,        

        ).then(res => {
            
            
            this.pitchInfo= res.data.parcela[0]
            this.services = res.data.usluge
            this.isLoading = false
        })
    }
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



.service-item{
    display: flex;
    margin-top: 10px;
}

.service-item p{
    width:150px;
}

.service-item-num{
    width: 35px;
}

.content{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>