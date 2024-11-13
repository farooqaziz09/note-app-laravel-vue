<template>
  <div class="addList">
    <input
      type="text"
      v-model="note.title"
      placeholder="please write a title"
    />
    <textarea
      rows="4"
      v-model="note.content"
      placeholder="please write some content"
    ></textarea>
    <button
      :class="[note.title ? 'actve btn' : 'inactive btn']"
      @click="addNote()"
    >
      Add Note
    </button>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      note: {
        title: "",
        content: "",
      },
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
            this.$emit('itemChanged')
            this.note.title = "";
            this.note.content = "";
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