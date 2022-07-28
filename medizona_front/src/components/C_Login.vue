<template>
  <div class="container">
    <div
      class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
      <div class="max-w-md w-full space-y-8">
        <div>
          <img
            class="mx-auto h-12 w-auto"
            src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
            alt="Workflow"
          />
          <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Sign in to your account
          </h2>
          <p class="mt-2 text-center text-sm text-gray-600">
            Or
            <a
              href="#"
              class="font-medium text-indigo-600 hover:text-indigo-500"
            >
              start your 14-day free trial
            </a>
          </p>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST">
          <input type="hidden" name="remember" value="true" />
          <div class="rounded-md shadow-sm -space-y-px">
            <div>
              <label for="email-address" class="sr-only">Email address</label>
              <input
                id="email-address"
                name="email"
                type="email"
                autocomplete="email"
                required
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                placeholder="Email address"
              />
            </div>
            <div>
              <label for="password" class="sr-only">Password</label>
              <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                required
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                placeholder="Password"
              />
            </div>
          </div>

          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input
                id="remember-me"
                name="remember-me"
                type="checkbox"
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
              />
              <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                Remember me
              </label>
            </div>

            <div class="text-sm">
              <a
                href="#"
                class="font-medium text-indigo-600 hover:text-indigo-500"
              >
                Forgot your password?
              </a>
            </div>
          </div>

          <div>
            <button
              type="submit"
              class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
              <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <!-- Heroicon name: solid/lock-closed -->
                <svg
                  class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                    clip-rule="evenodd"
                  />
                </svg>
              </span>
              Sign in
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'login',
  data() {
    return {
      showpwd: 'password',
      show: false,
      input: {
        usr: '',
        pwd: '',
      },
    };
  },
  methods: {
    login: async function () {
      var self = this;
      var headers = {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'access-control-allow-origin': '*',
        'Access-Control-Allow-Headers': 'Content-Type, Authorization',
      };
      this.show = true;

      try {
        const response = await this.$http.post(
          this.$apiUrl + 'v3/auth/login',
          {
            email: this.input.usr,
            password: this.input.pwd,
          },
          { headers }
        );

        if (!response.data.success) {
          self.$swal({
            icon: 'error',
            title: 'Oops...',
            text: 'Usuario y/o contraseña incorrectos. Por favor revisa tus credenciales.!',
          });

          self.show = false;
        }

        self.$session.start();
        const user = {
          ...response.data.data.user,
        };
        self.$session.set('token', response.data.data.access_token);
        self.$session.set('user', user);

        self.show = false;
        self.$router.push({ name: 'Reportes' });
      } catch (error) {
        if (error.response) {
          // console.log('err', error.response)
        }

        self.$swal({
          icon: 'error',
          title: 'Oops...',
          text: 'Usuario y/o contraseña incorrectos. Por favor revisa tus credenciales.!',
        });
        self.show = false;
      }
    },
    switchVisibility: function () {
      if (this.showpwd === 'password') {
        this.showpwd = 'text';
      } else {
        this.showpwd = 'password';
      }
    },
  },
};
</script>
<style scoped>
.logo {
  padding-bottom: 15%;
}
.showpwd {
  margin-bottom: 4%;
}
.container,
.container-fluid,
.container-sm,
.container-md,
.container-lg,
.container-xl {
  padding-left: 1.5rem;
  padding-right: 1.5rem;
  padding-top: 6% !important;
}
</style>
