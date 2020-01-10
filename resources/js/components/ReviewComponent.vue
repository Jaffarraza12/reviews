<template>
<div class="card">
    <div class="card-header">Review</div>
    <div class="card-body">
    <input v-model="searchQuery" type="text" class="form-control" id="usr" placeholder="Search By Name">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Product</th>
            <th>Vote</th>
            <th>Date </th>
            <th>Publish </th>
            <th> </th>

        </tr>
        <tr v-for="$rev in reviews" >
            <td>{{$rev.name}}</td>
            <td>{{$rev.product}}</td>
            <td>{{$rev.vote}} <i class="fa fa-star"></i></td>
            <td>{{$rev.created_at}}</td>
            <td><label class="switch">
                <input type="checkbox" data-type="review" :data-id="$rev.id" class="checker"  :checked="$rev.status== 1"/>
                <span class="slider round"></span>
              </label></td>
            <td><a class="pointer OpenPop" title="View Review"  :data-id="$rev.id"  data-type="review" ><i class="fa fa-eye"></i></a></td>
        </tr>
    </table>
      <div class="pull-left">
        Showing {{from}} - {{to}} from {{total}} records.
      </div>
      <div class="pull-right">
              <nav aria-label="...">
          <ul class="pagination">
            <li class="page-item" :class="{disabled: prev_page == null}" >
              <a style="cursor:pointer" class="page-link "  @click="paginate(prev_page)" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">{{page}} <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item" :class="{disabled: next_page == null}">
              <a style="cursor:pointer" class="page-link"  @click="paginate(next_page)" >Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        data() {
          return {
              reviews: '',
              searchQuery:'',
              prev_page:'',
              next_page:'',
              page:1 ,
              to:1 ,
              from:1 ,
              total:1 ,
          }
        },
        watch:{
          searchQuery: function (val) {
          this.searchQuery = val
            if(val.length > 3)
            {
              this.getReviewInfo()
            }

           },next_page:function(p){

           }
        },
        mounted() {
          this.getReviewInfo()
        },
        methods: {
           getReviewInfo() {
               axios.get('/public/api/reviews', {
                    params: {
                        name: this.searchQuery,
                        page: this.page,
                    }
                })
                   .then(response => {
                       this.reviews = response.data.data;
                       this.next_page = (response.data.next_page_url == null) ? null : this.page + 1;
                       this.prev_page = (response.data.prev_page_url == null) ? null : this.page - 1;
                       this.from = response.data.from;
                       this.to = response.data.to;
                       this.total = response.data.total;
                   })
                   .catch(error => {
                       console.log(error);
                   });
           },paginate(page){
              this.page  = page
              this.getReviewInfo()
           }
       },computed:{
          filteredResources(){
                //this.complains.filter((complains)=>{
                //  return complains.name.startsWith(this.searchQuery);
                //}
                // )
        }
    }
    }
</script>
