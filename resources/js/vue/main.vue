<template>
  <div class="heading">
    <h2 id="title">Todo List</h2>
    <add-note-form-vue v-on:itemChanged="getNotes()" />
  </div>
  <note-view-vue :notes="notes" v-on:reloadList="getNotes()" />
</template>

<script>
import addNoteFormVue from "./addNoteForm.vue";
import noteViewVue from "./noteView.vue";
export default {
  components: {
    addNoteFormVue,
    noteViewVue,
  },
  data: function () {
    return {
      notes: [],
    };
  },
  methods: {
    addNote() {
      console.log(this.note);
      if (this.note.title == "" || this.note.content == "") {
        alert("please provide both fields");
      }
      axios
        .post("api/notes", {
          note: this.note,
        })
        .then((response) => {
          if (response.status == 201) {
            this.$emit("itemChanged");
            this.note.title = "";
            this.note.content = "";
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getNotes() {
      axios
        .get("api/notes")
        .then((response) => {
          this.notes = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getNotes();
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
.addItem {
  display: flex;
  justify-content: center;
  align-items: center;
}
input {
  background: #f7f7f7;
  border: 0px;
  outline: none;
  padding: 5px;
  margin-right: 10px;
  width: 98%;
}
textarea {
  background: #f7f7f7;
  border: 0px;
  outline: none;
  width: 100%;
  margin: 5px 0;
}
.btn {
  width: 100%;
}
</style>