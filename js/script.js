const { createApp } = Vue;

createApp ({
    data() {
        return {
            dischi: [],
            message: "ciao"
        }
    },
    created() {
        axios
          .get("http://localhost/boolean/php-dischi-json/server.php")
          .then((resp) => {
            console.log(resp)
          });
    }

}).mount("#app");