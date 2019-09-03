var app = new Vue({
    el: '#app',
    data: {
        reviews : null,
        review_limit : 5
    },
    methods: {
        GetReviews : function(){
            axios
                .get('/public/api/review' , {
                    params: {
                        limit: this.product,
                        time: Date.now(),
                        limit: this.review_limit

                    }
                }).then(function (response) {
                    this.reviews = response.data
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