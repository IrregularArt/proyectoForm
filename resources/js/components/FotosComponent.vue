
<template>
    <div >
        <!-- aqui ira el cropper-->
        
        <span>{{ mensaje }}</span>
        <button v-on:click="cambiarMensaje" class="btn btn-primary">click</button>
        <li v-for="usuario in usuarios" :key="usuario">
            {{ usuario }}
        </li>
        
    </div> 
</template>

<script>

export default {
    
    data() {
        return {mensaje: 'hola vue!',
        usuarios: null
        }
    },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            cambiarMensaje() {
                //this.mensaje = "cambio el mensaje el dia : "+new Date().toLocaleString()
                axios.get('obtenerUsuarios')
                .then(response => (
                    this.usuarios = response.data
                ))
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            }
        }
    }
 
</script>