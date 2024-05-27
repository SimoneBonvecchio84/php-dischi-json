const { createApp } = Vue;

createApp ({
    data() {
        return {
            dischi: [], 
            apiUrl: "http://localhost/boolean/php-dischi-json/server.php",  
        }
    },
    created() {
       this.vediTutti()
    },
    methods: {
        vediTutti() {
            axios
            .get(this.apiUrl)
            .then((resp) => {            
              this.dischi = resp.data.results;
              console.log(this.dischi)
            });
        },
        likeDisc(index) {
            console.log(index);
            this.dischi[index].disc_like = !this.dischi[index].disc_like;
            const data  = {
               index: index, 
            };
            axios
                .post(this.apiUrl, data, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((resp) => {
                    console.log(resp)  
                    // this.dischi = resp.data.results 
                });
        },
        preferiti() {
            const data  = {
                action_prefer: "like", 
             };
             axios
                 .post(this.apiUrl, data, {
                     headers: {
                         "Content-Type": "multipart/form-data",
                     },
                 })
                 .then((resp) => {
                     console.log(resp);  
                     this.dischi = resp.data.results; 
                 });
        }
    }
    

}).mount("#app");