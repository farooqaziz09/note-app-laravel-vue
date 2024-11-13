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
      @click="editNote()"
    >
      Edit Note
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
      id: this.$route.params.id,
    };
  },
  methods: {
    editNote() {
      if (this.note.title == "" || this.note.contetn == "") {
        alert("please provide both fields");
      }
      axios
        .put("/api/notes/" + this.id, {
          note: this.note,
        })
        .then((response) => {
          if (response.status == 200) {
            alert("Record Updated Successfully");
            this.$router.push('/');
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    axios
      .get("/api/notes/" + this.id, {
        note: this.note,
      })
      .then((response) => {
        console.log(response.data);
        this.note.title = response.data.title;
        this.note.content = response.data.content;
      });
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