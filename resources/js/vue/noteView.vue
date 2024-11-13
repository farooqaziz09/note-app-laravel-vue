<template>
  <div>
    <div v-for="(note, index) in notes" :key="index">
      <list-note-vue
        :note="note"
        class="single-item"
        v-on:itemChanged="$emit('reloadList')"
      />
    </div>
  </div>
</template>

<script>
import listNoteVue from "./listNote.vue";
export default {
  props: ["notes"],
  components: {
    listNoteVue,
  },
  methods: {
    receiveEmit() {},
  },
};
</script>
<style scoped>
.single-item {
  background: #c6c6c6;
  padding: 5px;
  display: block;
}
</style>
