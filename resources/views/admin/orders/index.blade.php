@extends('layouts.adminlay')
@section('content')
<!-- table1 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Orders Table</h4>
                    <div class="form-group">
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Order items..">
                    </div>
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Order id</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                                
                                <th scope="col">View Order</th>
                          
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->status}}</td>
                                
                                <td><a href="/parent/{{$item->id}}"><button class="btn btn-success">View Order</button></a></td>
                               
                            </tr>
                            @endforeach
                            
                        </tbody>

                       

                       
                    </table>
                </div>
                <!--// table1 -->
<script>
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>

@endsection