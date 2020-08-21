
<template>
    <div>
        <div class="card m-2 p-1 border-success bg-info" style="max-width: 22.72rem;">
            <img class="card-img-top rounded" :src=img alt="Card image cap">
        
            <div class="card-body">
                <h5 class="card-title">{{this.producto.product_name}}</h5>
                
                <!-- --------------------------------------------------------------------------- -->
                <p class="card-text">{{this.producto.product_description}}</p>
                
                <!-- ----------------------------------------------------------------------------- -->
            
                <div  v-for="tag in etiquetas" :key="tag">
                     <span class="label label-info p-1" style="color: #FFF;">{{ tag }}</span>
                </div>
                <!-- ----------------------------------------------------------------------------- -->
                <a href="#" class=" btn btn-warning" v-on:click.prevent="editar()">editar</a>
                
                <!-- ------------------------------------------------------------------------------ -->
                <a href="#" class=" btn btn-danger" v-on:click.prevent="eliminar(producto.id)">eliminar</a>
            </div>
        </div>
    </div>
</template> 

<script>
import Swal from "sweetalert2";

export default {
    props:['producto'],
    data(){
        return{
            img: "productosImg/"+this.producto.product_image,
            editando: true,
            etiquetas: []
            }
    },
    mounted() {
        //console.log(producto.product_name);
        console.log("galeria montada");
        this.producto.tags.forEach(tag => {
            this.etiquetas.push(tag.name);
        });
        this.producto.tags = this.etiquetas;
        //console.log(this.producto);
    },
    methods:{
            editar(){
                //this.editando = false;
                this.$emit('editar', this.producto);
            },
            guardar(){
                this.editando = true;
            },
            eliminar(id){
                 axios.post('/eliminarProducto', {
                     idProducto: id
                })
                .then(response => {
                    
                    Swal.fire({
                                icon: "success",
                                title:
                                    "El producto ha sido eliminado.",
                                showConfirmButton: true,
                                timer: 1500
                            });
                    this.$emit('borrar');
                })
                .catch(function (error) {
                
                    console.log(error);
                });

            }
            
        }
    }

</script>

<style>

</style>