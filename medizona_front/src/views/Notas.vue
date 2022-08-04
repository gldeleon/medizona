<template>
  <ul class="divide-y divide-gray-200">
    <li v-for="person in people" :key="person.email" class="py-4 flex">
      <img class="h-10 w-10 rounded-full" :src="person.image" alt="" />
      <div class="ml-3">
        <p class="text-sm font-medium text-gray-900">{{ person.name }}</p>
        <p class="text-sm text-gray-500">{{ person.email }}</p>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  name: 'notas',
  components: {},
  data() {
    return {
      total: 0,
      items: [],
    };
  },
  beforeCreate: function () {
    if (!this.$session.exists()) {
      this.$router.push('/');
    }
  },
  methods: {
    logout: function () {
      this.$session.destroy();
      this.$router.push('/');
    },
    async getItems() {
      var self = this;
      const headers = {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'access-control-allow-origin': '*',
        'Access-Control-Allow-Headers': 'Content-Type, Authorization',
        Authorization: `Bearer ${self.$session.get('token')}`,
      };
      //
      try {
        const response = await this.$http.get(this.$apiUrl + 'items', {
          headers,
        });
        if (!response.data.success) {
          alert('Ocurrió un error al obtener los datos!');
          return false;
        }
        return self.items.map((rep) => {
          return {
            nombre: rep.name,
            sku: rep.sku,
            precio: rep.price,
          };
        });
      } catch (err) {
        alert(`Ocurrió un error al obtener los datos.! ${err}`);
      }
    },
    async saveNota() {
      var self = this;
      const headers = {
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'access-control-allow-origin': '*',
        'Access-Control-Allow-Headers': 'Content-Type, Authorization',
        Authorization: `Bearer ${self.$session.get('token')}`,
      };
      const d = new Date();
      const params = {
        customer_id: self.$session.get('customer_id'),
        date: `${d.getFullYear()}-${d.getMonth()}-${d.getDate()}`,
        total: self.total,
      };
      try {
        const response = await this.$http.post(this.$apiUrl + 'nota', {
          headers,
          params,
        });
        if (!response.data.success) {
          alert('Ocurrió un error al obtener los datos!');
          return false;
        }
        return self.items.map((rep) => {
          return {
            nombre: rep.name,
            sku: rep.sku,
            precio: rep.price,
          };
        });
      } catch (err) {
        alert(`Ocurrió un error al obtener los datos.! ${err}`);
      }
    },
  },
};
</script>
