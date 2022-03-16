<template>
    <div class="container my-3">
        <div class="row py-3">
            <h1 class="fs-2 text">Contatti</h1>
            <ul class="list-unstyled">
                <li class="d-flex align-items-center p-4 bg-primary rounded my-1">
                    <i class="fa-solid fa-mobile text-light fs-1"></i>
                    <h4 class="text-light m-0 ps-2">123 45678912</h4>
                </li>
                <li class="d-flex align-items-center p-4 bg-primary rounded my-1">
                    <i class="fa-solid fa-house text-light fs-1"></i>
                    <h4 class="text-light m-0 ps-2">Via AAAA</h4>
                </li>
                <li class="d-flex align-items-center p-4 bg-primary rounded my-1">
                    <i class="fa-solid fa-envelope text-light fs-1"></i>
                    <h4 class="text-light m-0 ps-2">valerio@gmail.com</h4>
                </li>
            </ul> 
        </div>
    <div>
        <h3 class="my-3">Vuoi chiedere qualcosa in particolare? Compila il form qui sotto!</h3>
    </div>
    <div v-if="success" class="alert alert-success" role="alert">
        Mail inviata con successo!
    </div>
    <form @submit.prevent="sendForm">
        <div class="form-group">
            <label for="name">Nome</label>
            <input v-model="name" type="text" class="form-control" id="name" name="name">
            <p class="alert alert-danger" v-for="(error, index) in errors.name" :key="index">
                {{ error }}
            </p>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input v-model="email" type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <p class="alert alert-danger" v-for="(error, index) in errors.email" :key="index">
                {{ error }}
            </p>
        </div>
        <div class="form-group">
            <label for="message">Messaggio</label>
            <textarea v-model="message" class="form-control" id="message" name="message" rows="3"></textarea>
            <p class="alert alert-danger" v-for="(error, index) in errors.message" :key="index">
                {{ error }}
            </p>
        </div>
        <button type="submit" class="btn btn-primary my-3">{{ sending ? "Sto inviando..." : "Invia" }}</button>
    </form>
    </div>
</template>

<script>
export default {
    name:"contacts",
    data(){
        return {
            name: null,
            email: null,
            message: null,
            success: false,
            sending: false,
            errors: {}
        }
    },
    methods:{
        sendForm(){
            this.sending = true;
            this.success = false;
            axios.post('/api/contacts',
            {
                'name': this.name,
                'email': this.email,
                'message': this.message
            })
            .then(response=>{
                console.log(response.data);
                if(!response.data.success){
                    this.success = false;
                    this.errors = response.data.errors;
                }
                else{
                    this.success = true;
                    this.errors = {};
                    this.name="";
                    this.email="";
                    this.message="";
                }
                this.sending = false;
            })
            .catch(error=>{
                console.log(error.response.data);
                this.sending = false;
            })
        }
    }
}
</script>

<style>
</style>