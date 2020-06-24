<template>
  <div>
    <form @submit.prevent="addRole">
      <div class="form-group">
          <input type="text" class="form-control" placeholder="Title" v-model="role.name">
      </div>
      <button type="submit" class="btn btn-success">Save</button>
      <button @click.prevent="clearForm()" class="btn btn-warning">Clear Form</button>
    </form>
    <nav>
      <ul class="pagination justify-content-center">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="getRoles(pagination.prev_page_url)">Previous</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">{{ pagination.current_page }} of {{ pagination.last_page }}</a>
        </li>
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="getRoles(pagination.next_page_url)">Next</a>
        </li>
      </ul>
    </nav>
    <div class="card mb-2" v-for="role in roles" v-bind:key="role.id">
      <div class="card-body ">
        <h4 class="card-title">{{ role.name }}</h4>
        <button type="button" @click="deleteRole(role.id)" class="btn btn-secondary">Delete</button>
        <button type="button" @click="updateRole(role)" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        data() {
            return {
                roles: [],
                pagination: {},
                role: {
                    id: '',
                    name: ''
                },
                update: false,
                role_id: ''
            };
        },

        created() {
            this.getRoles();
        },

        methods: {
            getRoles(api_url) {
              let vm = this;
              api_url = api_url || '/roles';
              fetch(api_url)
                  .then(response => response.json())
                  .then(response => {
                      this.roles = response.data;
                      vm.paginator(response.meta,response.links);
                  })
                  .catch(err => console.log(err));
            },

            paginator(meta, links) {
                this.pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
            },

            addRole() {
               if (this.update === false) {
                   fetch('api/role', {
                       method: 'post',
                       body: JSON.stringify(this.role),
                       headers: {
                           'content-type': 'application/json'
                       }
                   })
                       .then(response => response.json())
                       .then(data => {
                           this.clearForm();
                           this.getRoles();
                       })
                       .catch(err => console.log(err));
               } else {
                   fetch('api/role', {
                       method: 'put',
                       body: JSON.stringify(this.role),
                       headers: {
                           'content-type': 'application/json'
                       }
                   })
                       .then(response => response.json())
                       .then(data => {
                           this.clearForm();
                           this.getRoles();
                       })
                       .catch(err => console.log(err));
               }
           },

            deleteRole(id) {
                fetch('api/role/' + id, {
                    method: 'delete'
                })
                    .then(response => response.json())
                    .then(data => {
                        this.getRoles();
                    })
                    .catch(err => console.log(err));
            },

            updateRole(role) {
               this.update = true;
               this.role.id = role.id;
               this.role.role_id = role.id;
               this.role.name = role.name;
           },

           clearForm() {
               this.update = false;
               this.role.id = null;
               this.role.role_id = null;
               this.role.name = '';
           }
        }
    };
</script>
