<template>
  <div class="login">
    <c_login />
  </div>
</template>

<script>
// @ is an alias to /src
import c_login from '@/components/C_Login.vue';
export default {
  name: 'Login',
  components: {
    c_login,
  },
};
</script>
<style scoped>
/* .login {
  background: url('https://landing.totalcheck.mx/img/bg-splash.b8899cb6.png')
    no-repeat;
  height: 100%;
} */
</style>
