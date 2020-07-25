<template>
    <div class="col-8">
        <div class="row justify-content-center">
            <input
                type="text"
                id="nombreLocal"
                class="form-control"
                ref="nombreLocal"
                v-model="datosLocal[0].local_name"
                disabled
            />
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label>Telefono</label>
                <input
                    type="text"
                    id="telefono"
                    v-model="datosLocal[0].phone"
                    ref="telefono"
                    class="form-control"
                    disabled
                />
            </div>
            <div class="form-group col-6">
                <label>Whatsapp</label>
                <input
                    type="text"
                    id="whatsapp"
                    v-model="datosLocal[0].whatsapp"
                    ref="whatsapp"
                    class="form-control"
                    disabled
                />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label>Direccion:</label>
                <input
                    type="text"
                    id="direccion"
                    v-model="datosLocal[0].address"
                    ref="direccion"
                    class="form-control"
                    disabled
                />
            </div>
            <div class="form-group col-4">
                <label>Otros datos</label>
                <textarea
                    class="form-control"
                    v-model="datosLocal[0].other"
                    id="otros"
                    style="min-width: 200px"
                    ref="otros"
                    disabled
                >
                </textarea>
            </div>
        </div>
        <div class="row justify-content-end">
            <button
                class="btn btn-warning m-2"
                v-if="ver"
                ref="botonEdit"
                v-on:click="mostrarBoton"
            >
                editar información
            </button>
            <button
                class="btn btn-danger m-2"
                v-if="ver1"
                ref="botonCan"
                v-on:click="guarCanCambios(0)"
            >
                cancelar
            </button>
            <button
                class="btn btn-success m-2"
                v-if="ver2"
                ref="botonGuar"
                v-on:click="guarCanCambios(1)"
            >
                guardar
            </button>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";
export default {
    props: {
        datosLocal: Array
    },
    data() {
        return { ver: true, ver1: false, ver2: false };
    },
    methods: {
        mostrarBoton(event) {
            this.ver = false;
            this.ver1 = true;
            this.ver2 = true;
            this.$refs.nombreLocal.removeAttribute("disabled");
            this.$refs.telefono.removeAttribute("disabled");
            this.$refs.whatsapp.removeAttribute("disabled");
            this.$refs.direccion.removeAttribute("disabled");
            this.$refs.otros.removeAttribute("disabled");
        },
        guarCanCambios(e) {
            if (e === 1) {
                axios
                    .post("actualizarDatos", {
                        datos: this.datosLocal[0]
                    })
                    .then(function(response) {
                        Swal.fire({
                            icon: "success",
                            title:
                                "Los datos de su local han sido actualizados",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(function(error) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Algo salío mal al actualizar tus datos"
                        });
                    });
                // console.log(this.datosLocal);
            }
            this.ver = true;
            this.ver1 = false;
            this.ver2 = false;
            this.$refs.nombreLocal.setAttribute("disabled", "true");
            this.$refs.telefono.setAttribute("disabled", "true");
            this.$refs.whatsapp.setAttribute("disabled", "true");
            this.$refs.direccion.setAttribute("disabled", "true");
            this.$refs.otros.setAttribute("disabled", "true");
        }
    },
    mounted() {
        // console.log( {{datosLocal}} );
    }
};
</script>
<style scoped>
#nombreLocal {
    width: 50%;
    text-align: center;
}
#otros {
    width: 100% !important;
}
</style>
