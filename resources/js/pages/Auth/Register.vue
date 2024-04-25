<script setup>
import { useAuthStore } from '@/stores/AuthStore';
import AuthService from "@/services/AuthService";
import {ref} from 'vue';
import {useRouter} from 'vue-router';
// import BlogHeader from '../components/BlogHeader.vue';  
// import Navbar from '@/components/Navbar.vue';

import axios from 'axios';

const router = useRouter();
const store = useAuthStore();

const user = ref({
    firstName : '',
    lastName : '',
    email : '',
    password : '',
    password_confirmation : ''
});
function registerUser(){
    // console.log(user.value)
    AuthService.registerUser(user.value)
        .then(() => router.push("/dashboard"))
        .catch((error) => (console.log(error)));
}


</script>

<template>
    <Navbar><BlogHeader/></Navbar>
    <!-- Form for registration -->
    <div class="form-container">
        <form @submit.prevent="registerUser" class="register-form">
        <!-- Name, email, and password inputs -->
        <input name="name" type="text" v-model="user.firstName" placeholder="First name" required />
        <input name="name" type="text" v-model="user.lastName" placeholder="Last name" required />
        <input name="email" type="email" v-model="user.email" placeholder="Email" required />
        <input name="password" type="password" v-model="user.password" placeholder="Password" required />
        <input name="password_confirmation"  type="password"  v-model="user.password_confirmation" placeholder="Password confirmation" required />


        <button type="submit">Register</button>


        <button>
            <router-link to="/" class="link">Already on LinkedIn? Sign in</router-link>
        </button>

        </form>
    </div>

</template>

<style scoped>
.form-container {
display: flex;
justify-content: center;
align-items: center;
}


.register-form {
display: flex;
flex-direction: column;
gap: 20px;
width: 300px;
padding: 20px;
border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.register-form input, .register-form button {
padding: 10px;
border-radius: 5px;
border: 1px solid #ccc;
font-size: 16px;
}


.register-form button {
background-color: #007BFF;
color: white;
cursor: pointer;
}

button .link{
background-color: #007BFF;
color: white;
cursor: pointer;
text-decoration: none;
opacity: 70%;
}
.link:hover {
    opacity: 100%;
}
</style>