<template>
<div class="card">
    <div class="card-header">Retailer Application</div>
    <div class="card-body">
    <input v-model="searchQuery" type="text" class="form-control" id="usr" placeholder="Search By Name">
    <table class="table">
        <tr>
            <th>Company</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th></th>
        </tr>
        <tr v-for="$ret in retailers">
              <td>{{$ret.company_name }}</td>
              <td>{{$ret.name }} </td>
              <td>{{$ret.phone_number }} </td>
              <td>{{$ret.email }} </td>
              <td><a class="pointer OpenPop" title="View Retailer" :data-id="$ret.id"  data-type="retailer" ><i class="fa fa-eye"></i></a></td>

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
              <a style="cursor:pointer" class="page-link" :class="{disabled: next_page}"  @click="paginate(next_page)" >Next</a>
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
              retailers: '',
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
              this.getRetailerInfo()
            }

           },next_page:function(p){
            if(p == null){

            }
           }
        },
        mounted() {
          this.getRetailerInfo()
        },
        methods: {
           getRetailerInfo() {
               axios.get('/public/api/retailers', {
                    params: {
                        name: this.searchQuery,
                        page: this.page,
                    }
                })
                   .then(response => {
                       this.retailers = response.data.data;
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
              this.getRetailerInfo()
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
