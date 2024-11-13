<template >
  <div class="listContainer">
    <router-view></router-view>
  </div>
</template>
<script>
import addNoteFormVue from "./addNoteForm.vue";
import editNoteFormVue from './editNoteForm.vue';
import noteViewVue from "./noteView.vue";

export default {
  components: {
    addNoteFormVue,
    noteViewVue,
    editNoteFormVue
  },
  data: function () {
    return {
      notes: [],
    };
  },

};
</script>
<style scoped>
.listContainer {
  width: 350px;
  margin: auto;
}
.heading {
  background: #e6e6e6;
  padding: 10px;
}
#title {
  text-align: center;
}
</style>