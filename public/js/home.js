var app = new Vue({
    el: '#app',
    delimiters: ['[[', ']]'],
    data: {
        review: null,
        data: null,
        fields: [
            {
                key: 'name',
                label: 'Name',
            },{
                key: 'product',
                label: 'Product',
            },{
                key: 'title',
                label: 'Title',
            }
        ],
        items: [
            { isActive: true, title: 40, name: 'Dickerson', product: 'Macdonald' },
            { isActive: false, title: 21, name: 'Larsen', product: 'Shaw' },
            { isActive: false, title: 89, name: 'Geneva', product: 'Wilson' },
            { isActive: true, title: 38, name: 'Jami', product: 'Carney' }
        ],
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
                    this.data = response.data.reviews

                        console.log(response.data.reviews)

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