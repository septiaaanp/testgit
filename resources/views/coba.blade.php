<table id="dtHorizontalVerticalExample" class="table table-bordered table-striped" cellspacing="0" 
              width="100%">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul</th>
                  <th>Content Category</th>
                  <th>Content Type</th>
                  <th>Duration</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $s) 
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->judul }}</td>
                        
                        <td>{{ $s->nama_category }}</td>
                      
                        <td>{{ $s->nama }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Judul</th>
                  <th>Content Category</th>
                  <th>Content Type</th>
                  <th>Duration</th>
                </tr>
                </tfoot>
              </table>