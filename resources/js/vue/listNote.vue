<template>
  <div class="item">
    <span>{{ note.id + "." }} {{ note.title.substring(0, 30) }}</span>
    <button @click="removeNote()" class="trashcan">
      <font-awesome-icon icon="trash" />
    </button>
    <router-link :to="{ path: '/note/' + note.id }">
      <font-awesome-icon class="edit" :icon="['fas', 'edit']" />
    </router-link>
  </div>
</template>
<script>
import { RouterLink } from 'vue-router';
export default {
  props: ["note"],
  methods: {
    removeNote() {
      axios
        .delete("/api/notes/" + this.note.id)
        .then((response) => {
          if (response.status == 200) {
            this.$emit('itemChanged')
            alert('Successfully deleted')
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.item {
  display: flex;
  align-items: center;
  position: relative;
}
.edit,
.trashcan {
  background: none;
  border: none;
  color: #9e0808;
  outline: none;
  display: inline-flex;
  float: right;
}
</style>
