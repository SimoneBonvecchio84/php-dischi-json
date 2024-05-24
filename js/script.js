const { createApp } = Vue;

createApp ({
    data() {
        return {
            dischi: [],   
        }
    },
    created() {
        axios
          .get("http://localhost/boolean/php-dischi-json/server.php")
          .then((resp) => {
            console.log(resp)
            this.dischi = resp.data.results;
            console.log(this.dischi)
          });
    }
}).mount("#app");