<template>
  <form enctype="multipart/form-data" class="ContentX">
    <v-container>
      <v-row>
        <v-col cols="6">
          <v-select
            v-model="l.category"
            :items="categories"
            item-text="title"
            item-value="id"
            label="Categories"
            return-object
            single-line
          ></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="6">
          <v-select
            v-model="l.country"
            :items="countries"
            item-text="title"
            item-value="id"
            label="Countries"
            return-object
            single-line
          ></v-select>
        </v-col>
      </v-row>
      <div style="height:20px;"></div>

      <v-row>
        <v-card>
          <editor-content :editor="editor" />
        </v-card>
      </v-row>
      <div style="height:20px;"></div>
      <v-row>
        <input type="file" @change="uploadFile" />
      </v-row>
      <div style="height:20px;"></div>

      <v-row>
        <v-btn @click="store"> Store </v-btn>
      </v-row>
    </v-container>
  </form>
</template>
<script>
import { Editor, EditorContent } from "tiptap";

export default {
  data() {
    return {
      categories: [],
      countries: [],
      l: {
        category: "",
        country: "",
        file: "",
      },
      editor: null,
    };
  },
  methods: {
    store() {
      let vm = this;
      // console.log(this.editor.getHTML())
      const data = new FormData();
      data.append("countries_id", vm.l.country.id);
      data.append("categories_id", vm.l.category.id);
      data.append("file", vm.l.file);
      data.append("message", vm.editor.getHTML());
      axios
        .post('/api/adminapis/files/store',data)
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    beforeDestroy() {
      this.editor.destroy();
    },
    uploadFile(event) {
      let vm = this;
      let file = event.target.files[0];
      vm.l.file = file;
    },
  },
  created() {
    let vm = this;
    axios
      .get("/numbers/index")
      .then((res) => {
        vm.categories = res.data.categories;
        vm.countries = res.data.countries;
      })
      .catch((err) => {
        console.log(err);
      });
  },
  components: {
    EditorContent,
  },
  mounted() {
    this.editor = new Editor({
      content: "<p>This is just a boring paragraph</p>",
    });
  },
};
</script>