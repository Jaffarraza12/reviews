@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app" class="row justify-content-center">
    <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>


            </div>
    <br/>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Recent Reviews</div>
            <div class="card-body">

            </div>
            <template>
                <div>
                    <b-table striped hover :items="items" :fields="fields"></b-table>
                </div>
            </template>
            <script>
                export default {
                    data() {
                        return {
                            // Note `isActive` is left out and will not appear in the rendered table
                            fields: ['first_name', 'last_name', 'age'],
                            items: [
                                { isActive: true, age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
                                { isActive: false, age: 21, first_name: 'Larsen', last_name: 'Shaw' },
                                { isActive: false, age: 89, first_name: 'Geneva', last_name: 'Wilson' },
                                { isActive: true, age: 38, first_name: 'Jami', last_name: 'Carney' }
                            ]
                        }
                    }
                }
            </script>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Recent Questions</div>
            <div class="card-body">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Question</th>
                        <th>Vote</th>
                        <th>Date </th>
                        <th>Publish </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>


</div>
@endsection

