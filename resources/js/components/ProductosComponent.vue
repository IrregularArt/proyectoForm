<template>
    <div>
        <modalproc-component 
        ref="modal"
        @nuevo="cargarProductos"
        @actualizar="cargarProductos"
        ></modalproc-component>
        <hr>
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        <div class="row" v-if="productos[0]">
            
            <galeria-component
                v-for="producto in this.productos"
                :key="producto.id"
                :producto="producto"
                @borrar="cargarProductos"
                @editar="editarProducto(...arguments)"
             ></galeria-component>
        </div>
        <div v-else>
               <span>Aun no tienes ningun producto registrado.</span>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";
import ModalprodComponent from './ModalprodComponent.vue';
import GaleriaComponent from './GaleriaComponent.vue';
export default {
    components:{
        ModalprodComponent,
        GaleriaComponent
        },
        
        data(){
            return {
                productos:[],
                idLocal: $("#idLocal").val()
            }
        },
        methods:{
            cargarProductos(event){
                $("#contenedorGaleria").addClass("cargando");
                $(".lds-roller").addClass("visible");
                axios.get('/obtenerGaleria/'+this.idLocal)
                .then(response => (
                  this.productos = [],
                  response.data.forEach(element => {
                    this.productos.push(element);
                  }),
                  
                  console.log("//////////////"),
                  console.log(this.productos),
                  console.log("///////////////"),
                  // console.log(this.productos),
                  $(".lds-roller").removeClass("visible")
                ))
                .catch(function (error) {
                    // handle error
                    //this.productos = null
                    console.log("error");
                });
            },
            
            editarProducto(producto){
              this.$refs.modal.abrirEditar(producto);
              
            }
        },
        mounted(){
            this.cargarProductos();
        }
        
    
}
</script>

<style scoped>
    #prueba{
        background-color: black;
        
    }

    .visible{
        position: absolute !important;
        z-index: 4;
        right: 50%;
        display: inline-block !important;
    }
    .lds-roller {
        
  display: none;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #000;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>