<template>
<table class="table">
    <tr>
        <th>Full Name</th>
        <th>Order Date</th>
        <th>Type</th>
        <th></th>
    </tr>
        <tr>
          <td></td>
          <td> </td>
          <td></td>
          <td><a class="pointer" title="View Review"  onclick="ViewPop('complain',{{$complain->id}},this)"><i class="fa fa-search"></i></a></td>

      </tr>


</table>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
