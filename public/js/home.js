var app = new Vue({
    el: '#app',
    data: {},
    methods: {
        GetReviews : function(){
            axios
                .get('/public/api/review' , {
                    params: {
                        limit: this.product,
                        time: Date.now()
                    }
                }).then(function (response) {
                    alert('vue')
                    console.log(response)
                  })
                  .catch(function (error) {
                        // handle error
                        console.log(error);
                  }).finally(function () {
                    // always executed
                   });

        }

    },
    mounted: function() {
        this.GetReviews();
    }
})