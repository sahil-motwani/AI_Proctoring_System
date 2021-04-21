@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Students</h4>
                        </div>
                            <div class="card-body" id="card-body">
                                <div class="table-responsive">
                                    <table id="student_marks" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Marks</th>
                                            <th>Disqualification Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($results as $result)
                                            @if($result->is_disqualified == 1)
                                            <tr>
                                                <td>{{ $result->student_id }}</td>
                                                <td>{{ $result->name }}</td>
                                                <td>{{ $result->marks }}</td>
                                                <td>Disqualified</td>
                                            </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $result->student_id }}</td>
                                                    <td>{{ $result->name }}</td>
                                                    <td>{{ $result->marks }}</td>
                                                    <td>Not Disqualified</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>



                            </div>

                            <div class="card-action">
                            </div>
                    </div>

                </div>
            </div>
        </div>

{{--        <button onclick="printDiv('pdf','Title')">print div</button>--}}


        @endsection
        @section('extra_js')
            <script src="{{ asset("assets/js/plugin/datatables/datatables.min.js") }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/1.7.0/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js" integrity="sha512-uVSVjE7zYsGz4ag0HEzfugJ78oHCI1KhdkivjQro8ABL/PRiEO4ROwvrolYAcZnky0Fl/baWKYilQfWvESliRA==" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script>
                $('#student_marks').DataTable({

                    "createdRow": function( row, data, dataIndex ) {
                        console.log(data[3]);
                        if ( data[3] == "Disqualified" ) {
                            $(row).addClass( 'text-danger' );
                        }
                    },

                    dom: 'lBfrtip',
                    buttons: [
                        {
                            extend: 'pdfHtml5',
                            text: 'Get Result in PDF',
                            title: 'Results of {{ $quiz_name }}',

                            download: 'open',
                            orientation:'landscape',
                            exportOptions: {
                                columns: [1, 2, 3 ]
                            }
                        },
                    ]
                });


                // var doc = new jsPDF();
                //
                // function saveDiv(divId, title) {
                //     doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
                //     doc.save('div.pdf');
                // }
                //
                // function printDiv(divId,
                //                   title) {
                //
                //     let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
                //
                //     mywindow.document.write(`<html><head><title>${title}</title>`);
                //     mywindow.document.write('</head><body >');
                //     mywindow.document.write(document.getElementById("card-body").innerHTML);
                //     mywindow.document.write('</body></html>');
                //
                //     mywindow.document.close(); // necessary for IE >= 10
                //     mywindow.focus(); // necessary for IE >= 10*/
                //
                //     mywindow.print();
                //     mywindow.close();
                //
                //     return true;
                // }
            </script>
@endsection
